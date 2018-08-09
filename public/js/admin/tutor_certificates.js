
(function ($, undefined) {
    $.fn.czMore = function (options) {

        //Set defauls for the control
        var defaults = {
            max: 5,
            min: 0,
            onLoad: false,
            onAdd: false,
            onDelete: false
        };
        //Update unset options with defaults if needed
        var options = $.extend(defaults, options);
        $(this).bind("onAdd", function (event, data) {
            options.onAdd.call(event, data);
        });
        $(this).bind("onLoad", function (event, data) {
            options.onLoad.call(event, data);
        });
        $(this).bind("onDelete", function (event, data) {
            options.onDelete.call(event, data);
        });
        //Executing functionality on all selected elements
        return this.each(function () {
            var obj = $(this);
            var i = obj.children(".recordset").size();
            var divPlus = '<div id="btnPlus" />';

            var count = '<input id="' + this.id + '_czMore_txtCount" name="czMore_txtCount_' + this.id + '" type="hidden" value="0" size="5" />';

            obj.before(count);
            var recordset = obj.children("#first");
            obj.after(divPlus);
            var set = recordset.children(".recordset").children().first();
            var btnPlus = obj.siblings("#btnPlus");

            btnPlus.css({
                'cursor': 'pointer'
            });
            btnPlus.html("<i class='fa fa-plus-circle' aria-hidden='true'></i>");
           
            var iParnt = '';
            if (recordset.length) {
                obj.siblings("#btnPlus").click(function () {
                    iParnt = $('.recordsetParent').length - 1;
                    var i = obj.children(".recordset").size() + iParnt;

                    var item = recordset.clone().html();
                    i++;

                    item = item.replace(/\[([0-9]\d{0})\]/g, "[" + i + "]");
                    item = item.replace(/\_([0-9]\d{0})\_/g, "_" + i + "_");
                    //$(element).html(item);
                    //item = $(item).children().first();
                    //item = $(item).parent();

                    obj.append(item);
                    loadMinus(obj.children().last());
                    minusClick(obj.children().last());
                    if (options.onAdd != null) {
                        obj.trigger("onAdd", i);
                    }

                    obj.siblings("input[name$='czMore_txtCount']").val(i);
                    return false;
                });
                recordset.remove();
                for (var j = 0; j <= i; j++) {

                    loadMinus(obj.children()[j]);
                    minusClick(obj.children()[j]);
                    if (options.onAdd != null) {
                        obj.trigger("onAdd", j);
                    }
                }

                if (options.onLoad != null) {
                    obj.trigger("onLoad", i);
                }
                //obj.bind("onAdd", function (event, data) {
                //If you had passed anything in your trigger function, you can grab it using the second parameter in the callback function.
                //});
            }

            // function resetNumbering() {
            //     $(obj).children(".recordset").each(function (index, element) {
            //         $(element).find('input:text, input:password, input:file, select, textarea').each(function () {
            //             old_name = this.name;
            //             new_name = old_name.replace(/\_([0-9]\d{0})\_/g, "_" + (index + 1) + "_");
            //             this.id = this.name = new_name;
            //
            //         });
            //         index++
            //
            //         minusClick(element);
            //     });
            // }

            function loadMinus(recordset) {
                var divMinus = '<div id="btnMinus" />';
                $(recordset).children().first().before(divMinus);
                var btnMinus = $(recordset).children("#btnMinus");
                btnMinus.css({
                    'cursor': 'poitnter'
                });
                btnMinus.html("<i class='fa fa-trash-o' aria-hidden='true'></i>");
           
            }

            function minusClick(recordset) {
                $(recordset).children("#btnMinus").click(function () {

                    var i = obj.children(".recordset").size();

                    var id = $(recordset).attr("data-id");
                    $(recordset).remove();
               //     resetNumbering();
                    ResetFieldsIndex();
                    obj.siblings("input[name$='czMore_txtCount']").val(obj.children(".recordset").size());
                    i--;
                    if (options.onDelete != null) {
                        if (id != null)
                            obj.trigger("onDelete", id);
                    }
                });

            }
        });
    };
})(jQuery);

$(".bunPare").click(function () {
    $("#" + $(this).attr("id")).remove();
    ResetFieldsIndex();
});

function ResetFieldsIndex() {

    $('.certificates_categorie').find(".length").each(function (index) {

        $(this).attr("name", "certificates_categorie[" + index + "]");
        $(this).attr("id", "certificates_"+index+"_categorie");
    });

    $('.certificates_level').find(".length").each(function (index) {
        $(this).attr("name", "education_university[" + index + "]");
        $(this).attr("id", "education_"+index+"_university");
    });

    // $('.education_complete').find(".length").each(function (index) {
    //     $(this).attr("name", "education_complete[" + index + "]");
    //     $(this).attr("id", "education_"+index+"_complete");
    // });
   index++;
}
