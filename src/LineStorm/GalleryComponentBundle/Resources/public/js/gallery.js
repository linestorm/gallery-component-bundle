define(['jquery', 'jqueryui', 'cms_media_treebrowser', 'cms_api'], function ($, ui, mTree, api) {

    $(document).on('widget-init', '.item-galleries', function(){

        var $el = $(this);

        $el.find('input[name$="[order]"]').filter(function(){ return this.name.match(/\[galleries\]\[\d+\]\[order\]$/); }).val(contentCounts.components);

        var $galleryItemContainer = $el.find('.gallery-items-container');

        var $browserRowToggle = $el.find('.media-browser-show');
        var $browserRow = $el.find('.media-browser-row');
        var imageCount = $galleryItemContainer.children().length;
        var $tree = $el.find('.media-tree');
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
            var nodes = [], categories = [], selected = $tree.jstree('get_selected', true);

            for(var i in selected){
                switch(selected[i].type){
                    case "default":
                        categories.push(selected[i].original.id);
                        break;
                    case "file":
                        nodes.push(selected[i].original.id);
                        break;
                }
            }


            api.call($(this).data('url'), {
                data : {
                    nodes: nodes,
                    categories: categories
                },
                dataType: 'json',
                success: function(ob){
                    for(var i in ob){
                        var $template, template, node = ob[i];

                        template = $galleryItemContainer.data('prototype');
                        template = template.replace(/__name__/g, window.contentCounts.components).replace(/__img_name__/g, imageCount);

                        $template = $(template);
                        $template.find('.upload-image-thumbnail').attr('src', node.src);
                        $template.find('.upload-image-id').val(node.id);
                        $template.find('.upload-image-title').text(node.title);
                        $template.find('.upload-order').val(imageCount);

                        ++imageCount;
                        $galleryItemContainer.append($template);
                    }
                }
            });
        });

        $el.on('click', '.upload-remove', function(){
            $(this).closest('.upload-tile').remove();
        });


        $galleryItemContainer.sortable({
            items: '> .upload-tile',
            stop:function(e,ui){

                // update the order
                $galleryItemContainer.children('.upload-tile').each(function(i, li){
                    var $li = $(li);
                    var $order = $li.find('input[name*="[order]"]');
                    $order.val(i);
                });
            }
        });
        $galleryItemContainer.disableSelection();
    });


    // add ckeditor to all the pre-loaded articles
    $('.post-component-item.item-galleries').each(function(){
        $(this).trigger('widget-init');
    });
});
