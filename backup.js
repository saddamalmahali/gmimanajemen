// "kartik-v/yii2-widget-select2"
        /*
        var $hasSelect2 = $(widgetOptionsRoot.widgetItem).find('[data-krajee-select2]');
        if ($hasSelect2.length > 0) {
            $hasSelect2.each(function() {
                var id = $(this).attr('id');
                var configSelect2 = eval($(this).attr('data-krajee-select2'));
                $(this).select2('destroy');
                $.when($('#' + id).select2(configSelect2)).done(initSelect2Loading(id));
                $('#' + id).on('select2-open', function() {
                    initSelect2DropStyle(id)
                });
                if ($(this).attr('data-krajee-depdrop')) {
                    $(this).on('depdrop.beforeChange', function(e,i,v) {
                        var configDepdrop = eval($(this).attr('data-krajee-depdrop'));
                        var loadingText = (configDepdrop.loadingText)? configDepdrop.loadingText : 'Loading ...';
                        $('#' + id).select2('data', {text: loadingText});
                    });
                    $(this).on('depdrop.change', function(e,i,v,c) {
                        $('#' + id).select2('val', $('#' + id).val());
                    });
                }
            });
        }*/

        var $hasSelect2 = $(widgetOptionsRoot.widgetItem).find('[data-krajee-select2]');
        if ($hasSelect2.length > 0) {
            $hasSelect2.each(function() {
                var id = $(this).attr('id');
                var configSelect2 = eval($(this).attr('data-krajee-select2'));

                if ($(this).data('select2')) {
                    $(this).select2('destroy');
                }

                var configDepdrop = $(this).data('depdrop');
                if (configDepdrop) {
                    configDepdrop = $.extend(true, {}, configDepdrop);
                    $(this).removeData().off();
                    $(this).unbind();
                    _restoreKrajeeDepdrop($(this));
                }
                var s2LoadingFunc = typeof initSelect2Loading != 'undefined' ? initSelect2Loading : initS2Loading;
                var s2OpenFunc = typeof initSelect2DropStyle != 'undefined' ? initSelect2Loading : initS2Loading;
                $.when($('#' + id).select2(configSelect2)).done(s2LoadingFunc(id, '.select2-container--krajee'));

                var kvClose = 'kv_close_' + id.replace(/\-/g, '_');

                $('#' + id).on('select2:opening', function(ev) {
                    s2OpenFunc(id, kvClose, ev);
                });

                $('#' + id).on('select2:unselect', function() {
                    window[kvClose] = true;
                });

               if (configDepdrop) {
                    var loadingText = (configDepdrop.loadingText) ? configDepdrop.loadingText : 'Loading ...';
                    initDepdropS2(id, loadingText);
                }
            });
        }