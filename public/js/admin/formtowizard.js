/*
   Form To Wizard https://github.com/artoodetoo/formToWizard
   Free to use under MIT license.

   Originally created by Janko.
   Featured by iFadey.
   Polishing by artoodetoo.

*/

(function ($) {
    $.fn.formToWizard = function (options, cmdParam1) {
        if (typeof options !== 'string') {
            options = $.extend({
                submitButton: '',
                showProgress: true,
                showStepNo: true,
                validateBeforeNext: true,
                select: null,
                progress: null,
                nextBtnName: 'Next &gt;',
                prevBtnName: '&lt; Back',
                buttonTag: 'a',
                nextBtnClass: 'btn next',
                prevBtnClass: 'btn prev'
            }, options);
        }

        var element = this
            , steps = $(element).find("fieldset")
            , count = steps.size()
            , submmitButtonName = "#" + options.submitButton
            , commands = null;


        if (typeof options !== 'string') {
            //hide submit button initially
            //$(submmitButtonName).hide();
            setTimeout(function () {
                $(submmitButtonName).addClass('next').detach().appendTo("#step" + (steps.length - 1) + "commands");
            }, 500);


            //assign options to current/selected form (element)
            $(element).data('options', options);

            /**************** Validate Options ********************/
            if (typeof(options.validateBeforeNext) !== "function")

                options.validateBeforeNext = function () {
                    return true;
                };

            if (options.showProgress && typeof(options.progress) !== "function") {

                if (options.showStepNo)

                    $(element).before("<ul id='steps' class='steps'></ul>");
                else

                    $(element).before("<ul id='steps' class='steps breadcrumb'></ul>");
            }
            /************** End Validate Options ******************/


            steps.each(function (i) {
                $(this).wrap('<div id="step' + i + '" class="stepDetails"></div>');
                $(this).append('<p id="step' + i + 'commands" class="commands"></p>');

                if (options.showProgress && typeof(options.progress) !== "function") {
                    if (options.showStepNo)
                        $("#steps").append("<li id='stepDesc" + i + "'>Step " + (i + 1) + "<span>" + $(this).find("legend").html() + "</span></li>");
                    else
                        $("#steps").append("<li id='stepDesc" + i + "'>" + $(this).find("legend").html() + "</li>");
                }

                if (i == 0) {
                    createNextButton(i);
                    selectStep(i);
                }
                else if (i == count - 1) {
                    $("#step" + i).hide();
                    createPrevButton(i);
                }
                else {
                    $("#step" + i).hide();
                    createPrevButton(i);
                    createNextButton(i);
                }
            });

        } else if (typeof options === 'string') {
            var cmd = options;

            initCommands();

            if (typeof commands[cmd] === 'function') {
                commands[cmd](cmdParam1);
            } else {
                throw cmd + ' is invalid command!';
            }
        }


        /******************** Command Methods ********************/
        function initCommands() {
            //restore options object from form element
            options = $(element).data('options');

            commands = {
                GotoStep: function (stepNo) {
                    var stepName = "step" + (--stepNo);

                    if ($('#' + stepName)[0] === undefined) {
                        throw 'Step No ' + stepNo + ' not found!';
                    }

                    if ($('#' + stepName).css('display') === 'none') {
                        $(element).find('.stepDetails').hide();
                        $('#' + stepName).show();
                        selectStep(stepNo);
                    }
                },
                NextStep: function () {
                    $('.stepDetails:visible').find('a.next').click();
                },
                PreviousStep: function () {
                    $('.stepDetails:visible').find('a.prev').click();
                }
            };
        }

        /******************** End Command Methods ********************/


        /******************** Private Methods ********************/
        function createPrevButton(i) {
            var stepName = 'step' + i;
            $('#' + stepName + 'commands').append(
                '<' + options.buttonTag + ' href="#" id="' + stepName + 'Prev" class="' + options.prevBtnClass + '">' +
                options.prevBtnName +
                '</' + options.buttonTag + '>'
            );

            $("#" + stepName + "Prev").bind("click", function (e) {
                $("#" + stepName).hide();
                $("#step" + (i - 1)).show();
                selectStep(i - 1);
                return false;
            });
        }

        function createNextButton(i) {
            var stepName = 'step' + i;
            $('#' + stepName + 'commands').append(
                '<' + options.buttonTag + ' href="#" id="' + stepName + 'Next" class="' + options.nextBtnClass + '">' +
                options.nextBtnName +
                '</' + options.buttonTag + '>');

            $("#" + stepName + "Next").bind("click", function (e) {
                vlidateForms();

                if (options.validateBeforeNext(element, $("#" + stepName)) === true) {
                    $("#" + stepName).hide();
                    $("#step" + (i + 1)).show();
                    //if (i + 2 == count)
                    selectStep(i + 1);
                }

                return false;
            });
        }


        $("#sads").click(function () {
            vlidateForms();
        });

        function vlidateForms() {

            jQuery.validator.addMethod('phoneUK', function (phone_number, element) {
                    return this.optional(element) || phone_number.length > 9 &&
                        phone_number.match(/^(\(?(0|\+44)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/);
                }, 'Please specify a valid uk phone number'
            );

            jQuery.validator.addMethod('selectCountry', function (value) {
                return (value != '');
            }, "Please select country");
            jQuery.validator.addMethod('selectCategorie', function (value) {
                return (value != '');
            }, "Please select Categorie");

            jQuery.validator.addMethod('ProImage', function (phone_number, element) {
                    return this.optional(element) || element.files[0].size <= 5000000;
                }, 'Please upload image less then 5 MB'
            );

            jQuery.validator.addMethod('ProResume', function (phone_number, element) {
                    return this.optional(element) || element.files[0].size <= 5000000;
                }, 'Please upload resume less then 5 MB'
            );
            jQuery.validator.addMethod("postcodeUK", function (value, element) {
                return this.optional(element) || /[A-Z]{1,2}[0-9]{1,2} ?[0-9][A-Z]{2}/i.test(value);
            }, "Please specify a valid Postcode");

            var form = $("#msform");
            form.validate({

                rules: {

                    first_name: {
                        required: true,
                        minlength: 2,
                        lettersonly: true,
                        maxlength: 32
                    },
                    last_name: {
                        required: true,
                        minlength: 2,
                        lettersonly: true,
                        maxlength: 32

                    },
                    phone: {
                        required: true,
                        phoneUK: true
                    },
                    city: {
                        required: true,
                        minlength: 2,
                        maxlength: 32
                    },
                    state: {
                        required: true,
                        minlength: 2,
                        maxlength: 32
                    },
                    country: {
                        selectCountry: true
                    },
                    address: {
                        required: true,
                        minlength: 2,
                        maxlength: 500
                    },
                    about: {
                        required: false,
                        minlength: 2,
                        maxlength: 500
                    },

                    zip: {
                        postcodeUK: true,
                        required: true,
                    },
                    resume: {
                        required: false,
                        // ProResume: true,
                        accept: "image/*,application/*,pdf"
                    },
                    photo: {
                        required: false,
                        ProImage: true,
                        accept: "image/*",
                    },
                    dbs_certificate_no: {
                        required: false,
                        minlength: 2,
                        maxlength: 32
                    },
                },
                messages: {

                    first_name: {
                        required: "Please enter first name",

                    },
                    last_name: {
                        required: "Please enter last name",
                    },
                    city: {
                        required: "Please enter city",

                    },
                    state: {
                        required: "Please enter state",

                    },
                    address: {
                        required: "Please enter address",

                    },
                    zip: {
                        required: "Please enter zip",

                    },
                    resume: {
                        accept: "Please enter valid extension.(DOC,IMAGE,PDF)",

                    },
                    photo: {
                        accept: "Please enter valid extension.(IMAGE)",

                    },
                },

            });

            $("[name^=certificates_categorie]").each(function () {
                $(this).rules("add", {
                    selectCategorie: true
                  });
            });

            $("[name^=certificates_level]").each(function () {
                $(this).rules("add", {
                    required: true,
                    minlength: 2,
                    maxlength: 500

                });
            });



            $("[name^=company_name]").each(function () {
                $(this).rules("add", {
                    required: true,
                    minlength: 2,
                    maxlength: 500

                });
            });

            $("[name^=organization_registration]").each(function () {
                $(this).rules("add", {
                    required: true,
                    minlength: 2,
                    maxlength: 500

                });
            });





            if (form.valid() === true) {
                return true;
            } else {
                Stop();

            }

        }

        function selectStep(i) {

            if (typeof(options.progress) === "function") {
                options.progress(i, count);
            } else if (options.showProgress) {
                $("#steps li").removeClass("current");
                $("#stepDesc" + i).addClass("current");
            }

            if (options.select) {
                options.select(element, $('#step' + i));
            }
        }

        /******************** End Private Methods ********************/

        return $(this);

    }
})(jQuery);


$(document).ready(function () {
    //Tutor Widget Form js
    $("#msform").formToWizard({
        submitButton: 'submit',
        nextBtnName: 'Next >>',
        prevBtnName: '<< Back',
        nextBtnClass: 'btn btn-primary next',
        prevBtnClass: 'btn btn-default prev',
        buttonTag: 'button',
        progress: function (i, count) {

            $("#progress-complete").width('' + ((i + 1) / count * 100) + '%');
        }
    })

})

//Dynimic change other languages
// $('input:radio[name="speak_languages"]').change(
//     function () {
//         if ($(this).is(':checked') && $(this).val() == '1') {
//             alert('ye');
//         } else {
//             alert('no');
//         }
//     });

$(document).ready(function () {

    $('#certificate_issued').datepicker();
    $('#cert_issued').datepicker();
});


$(document).ready(function () {
    $('#language').multiselect({
        nonSelectedText: 'Select Language',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '500px'
    });

    $('#travel_location').multiselect({
        nonSelectedText: 'Select Country',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '500px'
    });

    $('#travel_location').multiselect({
        nonSelectedText: 'Select Country',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '500px'
    });
    $('.education_university').find(".length").each(function (index) {
        $('#level').multiselect({
        nonSelectedText: 'Select level',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '500px'
    });
    });
});