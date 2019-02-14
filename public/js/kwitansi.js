var Kwitansi = function () {
    var handleFormKwitansi = function () {
        var $form = $('form');

        $('.btn-generate', $form).off().on('click', function (e) {
            var $btn = $(this),
                url = $btn.attr('href'),
                serialized = $form.serialize();

            if (!$form.checkRequired()) {
                e.preventDefault();
            }
            $btn.attr('href', url + '?' + serialized);
        });
    };

    var handleOrdering = function ($table) {
        var $tbody = $('tbody', $table),
            $rows = $('tr:not(#template, .hidden)', $tbody);

        $rows.each(function (iRow, row) {
            $('td', $(row)).each(function (iData, td) {
                var $td = $(td);
                if ($('span.number', $td).length == 1) {
                    $('span.number', $td).text(iRow + 1);
                }
                $(':input', $td).each(function (iInput, input) {
                    var $input = $(input),
                        name = $input.attr('name');
                    if (typeof name === 'undefined') return;
                    name = name.replace(/products\[\d*\]/, 'products[' + iRow + ']');
                    $input.attr('name', name);
                });
            });
        });
    };

    var handleButton = function () {
        var $table = $('table#table_product'),
            $templateTr = $('tr#template', $table),
            $tbody = $('tbody', $table);

        $('.btn-add-product').off().on('click', function () {
            var $clonedTr = $templateTr.clone();
            $clonedTr.removeAttr('id').removeClass('hidden');
            $(':input', $clonedTr).each(function (i, e) {
                $(e).removeClass('excepted').removeAttr('disabled');
            });
            $tbody.append($clonedTr);

            handleOrdering($table);
            handleButton();
        });

        $('.btn-delete-product').off().click(function () {
            var $btn = $(this),
                $tr = $btn.closest('tr');

            $tr.remove();
            handleOrdering($table);
        });
    };

    var handleFormInvoice = function () {
        var $form = $('form');

        $('.btn-generate', $form).off().on('click', function (e) {
            e.preventDefault();
            var $btn = $(this),
                url = $btn.attr('href'),
                serialized = $form.serialize();

            if (!$form.checkRequired()) {
                return false;
            }
            window.open(url + '?' + serialized);
        });

        handleButton();
    };

    return {
        initFormKwitansi: function () {
            handleFormKwitansi();
        },
        initFormInvoice: function () {
            handleFormInvoice();
        }
    }
}();

$(document).ready(function () {
    // Kwitansi.init();
});