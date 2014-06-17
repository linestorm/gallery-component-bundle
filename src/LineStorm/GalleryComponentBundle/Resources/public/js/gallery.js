define(['jquery', 'jqueryui', 'cms_media_treebrowser', 'cms_api'], function ($, ui, mTree, api) {

    $(document).on('widget-init', '.item-galleries', function(){

        var $el = $(this);

        $el.find('input[name$="[order]"]').filter(function(){ return this.name.match(/\[galleries\]\[\d+\]\[order\]$/); }).val(contentCounts.components);

        var $galleryItemContainer = $el.find('.gallery-items-container');

        var $browserRowToggle = $el.find('.media-browser-show');
        var $browserRow = $el.find('.media-browser-row');
        var imageCount = $galleryItemContainer.children().length;
        var $tree = $el.find('.media-browser-window');
        var tree = mTree.mediaTree($tree, {
            multiple: true
        });

        if($galleryItemContainer.children().length){
            $browserRow.hide();
            $browserRowToggle.show();
        } else {
            $browserRowToggle.hide();
        }

        $browserRowToggle.on('click', function(){
            $browserRow.slideDown();
            $browserRowToggle.slideUp();
            return false;
        });

        $el.find('.select-media').on('click', function(){
            var categories = [], nodes = tree.getCheckedValues();

            api.call($(this).data('url'), {
                data : {
                    nodes: nodes
                },
                dataType: 'json',
                success: function(ob){
                    for(var i in ob){
                        var $template, template, node = ob[i];

                        template = $galleryItemContainer.data('prototype');
                        template = template.replace(/__name__/g, window.contentCounts.components).replace(/__img_name__/g, imageCount);

                        $template = $(template);
                        $template.find('.media-image-thumbnail').attr('src', node.src);
                        $template.find('.media-image-id').val(node.id);
                        $template.find('.media-image-title').text(node.title);
                        $template.find('.media-order').val(imageCount);

                        ++imageCount;
                        $galleryItemContainer.append($template);
                        tree.clearChecked();
                    }
                }
            });
        });

        $el.on('click', '.media-remove', function(){
            $(this).closest('.media-tile').remove();
        });


        $galleryItemContainer.sortable({
            items: '> .media-tile',
            stop:function(e,ui){

                // update the order
                $galleryItemContainer.children('.media-tile').each(function(i, li){
                    var $li = $(li);
                    var $order = $li.find('input[name*="[order]"]');
                    $order.val(i);
                });
            }
        });

        //$galleryItemContainer.disableSelection();
    });


    // add ckeditor to all the pre-loaded articles
    $('.content-component-item.item-galleries').each(function(){
        $(this).trigger('widget-init');
    });
});
