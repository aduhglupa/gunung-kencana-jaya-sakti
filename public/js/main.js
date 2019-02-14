var Main = function () {
    var handleDTPicker = function () {
        if (typeof $.fn.datetimepicker === 'undefined') return false;
        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY'
        });
    };

    return {
        init: function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
                }
            });
            $.validator.setDefaults({
                errorClass: 'help-block',
                errorElement: 'span',
                errorPlacement: function ($err, $el) {
                    if ($el.parent('.input-group').length) {
                        $err.insertAfter($el.parent());
                    } else {
                        $err.insertAfter($el);
                    }
                },
                highlight: function ($el) {
                    $($el).closest('.form-group').addClass('has-error');
                },
                unhighlight: function ($el) {
                    $($el).closest('.form-group').removeClass('has-error');
                }
            });
            handleDTPicker();
        }
    };
}();

$.fn.toggleError = function (bool, msg) {
    //if($(this).val() || ($(this).val() != '' && $(this).val() != '0')) bool = false;
    var $formGroup = $(this).closest('div.form-group');
    if ($formGroup.length == 1) {
        $('.help-block', $formGroup).remove();
        $formGroup.toggleClass('has-error', Boolean(bool));
        if (msg) {
            msg = $.type(msg) == 'array' ? msg.join(', ') : msg;
            $formGroup.append('<span class="help-block">' + msg + '</span>');
        }
    } else {
        var $parent = $(this).parent().toggleClass('has-error', Boolean(bool));
        $('.help-block', $parent).remove();
        if (msg) {
            msg = $.type(msg) == 'array' ? msg.join(', ') : msg;
            $parent.append('<span class="help-block">' + msg + '</span>');
        }
    }
    if(Boolean(bool)) {
        $(this).get(0).scrollIntoView({behavior: "smooth", block: "center", inline: "start"});
    }
    // Bind event auto remove error
    $(this).on('keyup.required change.required', function () {
        if ($(this).val()) {
            $(this).toggleError(false).off('keyup.required change.required');
        }
    });
    return $(this);
};

$.fn.checkRequired = function (msg) {
    var $container = $(this),
        $requires = $(':input.required', $container), isValid = true;
    if ($requires.length > 0) {
        $requires.each(function () {
            if (!$(this).hasClass('excepted')) {
                if (!$(this).val() || $(this).val() == '0') {
                    var $tr = $(this).closest('tr');
                    var matches = $(this).attr('class').match(/required\-if\-([a-z\_\-]+)(|\-[a-z\_\-]+)/ig);
                    var $related = null;
                    var relatedValue = null;
                    var relatedName = null;
                    if(matches && $tr.length === 1){
                        var related = matches[0].replace(/(.*)required\-if\-([a-z\_\-]+)(|\-[a-z\_\-]+)((.*))/ig, '$2|$4').split('|');
                        relatedName = related[0];
                        relatedValue = related[1];
                        var regexMatchAll = /^.*(\[([a-z\_]+)\])$/ig;

                        var matchAll = regexMatchAll.exec($(this).attr('name'));
                        if($(this).attr('name').match(/^[a-z\_]+$/)){
                            $related = $('[name="' + relatedName + '"]');
                        } else if(matchAll){
                            $related = $('[name="' + $(this).attr('name').replace(new RegExp(matchAll[2], 'ig'), relatedName) + '"]');
                        }
                        // dd($related, relatedName);
                        // var $related = $('[name="' + matchesRelated +'"]');
                        // dd(requiredIf, matchesRelated);
                    }
                    // dd(matches);
                    if($related){
                        if($related.val() == relatedValue){
                            $(this).toggleError(true, msg ? 'This field is required if field "' + relatedName + '" value is ' + (relatedValue ? relatedName : 'null') : null);
                            isValid = false;
                        } else {
                            $(this).toggleError(false);
                        }
                    }else {
                        $(this).toggleError(true, msg);
                        isValid = false;
                    }
                }
                else $(this).toggleError(false);
            }
        });
    }
    return isValid;
};

$(document).ready(function () {
    Main.init();
});