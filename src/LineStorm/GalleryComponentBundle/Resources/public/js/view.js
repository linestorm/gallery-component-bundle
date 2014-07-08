define(['jquery', 'jqueryui', 'cms_media_treebrowser', 'cms_api', 'bttrlazyloading'], function ($, ui, mTree, api, lzy) {

    $(document).ready(function(){
        $("img.lazy-load-image").bttrlazyloading({
            container: document.body,
            animation: null,
            retina: false
        });
    });
});
