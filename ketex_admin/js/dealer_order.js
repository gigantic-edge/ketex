/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {

    $("form[name='vehicle-registration']").validate({
// Specify validation rules
        errorClass: "celex-error-class",
        ignore: ".ignore",
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            regnno: {
                required: true,
                checkallowedchars: true,
                maxlength: 10
            },
            engineno: {
                required:{
                    depends: function(){
                        return $('#modelnm').val() === "";
                }
                },
                checkEngine: true
                
            },
            chesisno: {
                required: true,
                //checkallowedchars: true
            },
            modelnm: {
                required: true,
                
            },
            type: {
                required: true,
            },
            fuel_type: {
                required: true,
            },
            date_of_regn: {
                required: true,
                futureDate: true,
            },
            sdmslno: {
                checkgst: true
            }
        },
        // Specify validation error messages
        messages: {
            regnno: {
                required: "This field is required",
                checkallowedchars: "Special characters not allowed",
                maxlength: "Maximum character length(10) exceeded",
            },
            engineno: {
                required: "This field is required",
                checkEngine: "Engine Number is mandatory for this type of vehicle"
                //checkallowedchars: "Special characters not allowed",
            },
            chesisno: {
                required: "This field is required",
                //checkallowedchars: "Special characters not allowed",
            },
            modelnm: {
                required: "This field is required",
                checkEngine: "Engine Number is required"
            },
            type: {
                required: "This field is required",
            },
            fuel_type: {
                required: "This field is required",
            },
            date_of_regn: {
                required: "This field is required",
                futureDate: "Future date is not allowed"
            },
            sdmslno: {
                checkgst: "Please Update Your GSTIN"
            }
        },
//        highlight: function (element) {
//            $(element).parent().addClass('error')
//        },
//        unhighlight: function (element) {
//            $(element).parent().removeClass('error')
//        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            //alert('valid form submitted'); // for demo
            //return false; // for demo
            form.submit();
        }
    });
    $("form[name='old-vehicle-registration']").validate({
        // Specify validation rules
        errorClass: "celex-error-class",
        ignore: ".ignore",
        rules: {
            // The key name on the left side is the name attribute
            // of an input field. Validation rules are defined
            // on the right side
            regnno: {
                required: true,
                checkallowedchars: true,
                maxlength: 10
            },
            engineno: {
                required: true,
                //checkallowedchars: true
            },
            chesisno: {
                required: true,
                //
                //checkallowedchars: true
            },
            modelnm: {
                required: true,
                checkEngine: true
            },
            type: {
                required: true,
            },
            fuel_type: {
                required: true,
            },
            date_of_regn: {
                required: true,
                OldOrderDate: true,
            },
            sdmslno: {
                checkgst: true
            }
        },
        // Specify validation error messages
        messages: {
            regnno: {
                required: "This field is required",
                checkallowedchars: "Special characters not allowed",
                maxlength: "Maximum character length(10) exceeded",
            },
            engineno: {
                required: "This field is required",
                checkEngine: "This field is required"
                        //checkallowedchars: "Special characters not allowed",
            },
            chesisno: {
                required: "This field is required",
                //checkallowedchars: "Special characters not allowed",
            },
            modelnm: {
                required: "This field is required",
            },
            type: {
                required: "This field is required",
            },
            fuel_type: {
                required: "This field is required",
            },
            date_of_regn: {
                required: "This field is required",
                OldOrderDate: "Date should be before 1st April 2019"
            },
            sdmslno: {
                checkgst: "Please Update Your GSTIN"
            }
        },
//        highlight: function (element) {
//            $(element).parent().addClass('error')
//        },
//        unhighlight: function (element) {
//            $(element).parent().removeClass('error')
//        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function(form) {
            form.submit();
        }
    });
    $("form[name='gstin-update']").validate({
        errorClass: "celex-error-class",
        rules: {
            gstin_number: {
                required: true,
                minlength: 15,
                maxlength: 15,
            }
        },
        messages: {
            gstin_number: {
                required: "Please enter your GSTIN number to proceed",
                minlength: "Name must be at least 15 characters",
                maxlength: "Maximum number of characters - 15",
            }
        },
        submitHandler: function(form) {
            //alert('valid form submitted'); // for demo
            //return false; // for demo
            var request = $.ajax({
                type: "POST",
                cache: false,
                url: "/beta5/response.php",
                data: {gstin: $(form).serialize(), action: "updateGstinField"},
                timeout: 3000,
            });
            request.done(function(response) {

                if (response === true) {
                    //$('#gst-modal').modal('toggle'); //or  $('#IDModal').modal('hide');
                    setTimeout(function() {
                        $("#gst-modal").modal('toggle')
                    }, 300);

                }

            });
            // Called on failure.
            request.fail(function(jqXHR, textStatus, errorThrown) {
                alert('failed');
                // log the error to the console
                console.error(
                        "The following error occurred: " + textStatus, errorThrown
                        );
            });
            return false;

        }


    });
    jQuery.validator.addMethod("futureDate", function(value, element) {
        var now = new Date();
        var myDate = new Date(value);
        //console.log(now + "-" + myDate);
        //console.log(this.optional(element) || myDate <= now);
        //console.log(this.optional(element));
        //console.log(myDate > now);
        //return this.optional(element) || myDate > now;
        return myDate <= now;
        // else alert('Das passt nicht!' + mD +  '   ' + nowdate);

    });
    jQuery.validator.addMethod("OldOrderDate", function(value, element) {
        var now = new Date('2019/04/01');
        var myDate = new Date(value);
        //console.log(now + "-" + myDate);
        //console.log(this.optional(element) || myDate <= now);
        //console.log(this.optional(element));
        //console.log(myDate > now);
        //return this.optional(element) || myDate > now;
        return myDate < now;
        // else alert('Das passt nicht!' + mD +  '   ' + nowdate);

    });
    jQuery.validator.addMethod("checkallowedchars", function(value, element) {
        //console.log(/^[a-z0-9\\s]+$/i.test(value));
        return this.optional(element) || /^[a-z0-9\\s]+$/i.test(value);
        //return /^[a-z0-9\\s]+$/i.test(value);
    });
    /**
     * Custom Method for Dealer GST check
     */
    jQuery.validator.addMethod("checkgst", function(value, element) {
        var isSuccess = true;
        $.ajax({
            url: "/beta5/response.php",
            type: "POST",
            data: {dealerID: value, action: "gstStatus"},
            async: false,
            success: function(data) {

                isSuccess = (data === true) ? true : false;
                if (!isSuccess) {
                    $("#gst-modal").modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                }

            }
        });
        return isSuccess;
    });
    jQuery.validator.addMethod("updateGstin", function(value, element) {
        $.ajax({
            url: "/beta5/response.php",
            type: "POST",
            data: {gstin: value, action: "updateGstinField"},
            asnyc: false,
            success: function(data) {
                if (data === 'true') {
                    //$('#gst-modal').modal('toggle'); //or  $('#IDModal').modal('hide');
                    setTimeout(function() {
                        $("#gst-modal").modal('toggle')
                    }, 300);
                    return false;
                }
            }
        });
    });
    
    jQuery.validator.addMethod("checkEngine", function(value, element) {
        var isSuccess = true;
        $.ajax({
            url: "/beta5/response.php",
            type: "POST",
            data: {VtmID: $('#modelnm').val(), action: "checkVTM"},
            async: false,
            success: function(data) {
                
                isSuccess = (data === true) ? true : false;
                

            }
        });
        return isSuccess;
    });

    $('#regn_number').keypress(function(e) {
        var regex = new RegExp("^[a-zA-Z0-9\s]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
            e.preventDefault();
            alert('Please Enter Only alphanumeric characters');
            return false;
        }
    });
    $('#placeOrder').validate({// initialize the plugin
        errorClass: "celex-error-class",
        rules: {
            'order_id[]': {
                required: true

            },
            'terms': {
                required: true
            },
        },
        messages: {
            'order_id[]': {
                required: "You must check at least one order",
            },
            'terms': {
                required: "You must confirm",
            }
        },
        submitHandler: function(form) { // for demo
            form.submit();
        }
    });
    $("form[name='plate-allocation']").validate({// initialize the plugin
        errorClass: "celex-error-class",
        rules: {
            car_manufacturer: {
                required: true
            },
            item_name: {
                required: true
            },
            from_no: {
                required: function(element) {
                    return $('#to-no').val().length > 0;
                },
                min: 1

            },
            to_no: {
                required: function(element) {
                    return $('#from-no').val().length > 0;
                },
                min: function(element) {
                    return $('#from-no').val();
                },
                remote: {
                    url: "/beta5/response.php",
                    type: "POST",
                    async: false,
                    data: {
                        fromNO: function() {
                            return $('#from-no').val();
                        },
                        action: function() {
                            return $("#action").val();
                        }

                    },
                }
            },
            suffix: {
                required: true
            }


        },
        messages: {
            car_manufacturer: {
                required: "Please select car manufacturer"
            },
            item_name: {
                required: "Please select item name"
            },
            to_no: {
                remote: "The specified range is already taken!"
                        //remote: jQuery.validator.format("{0} is already taken.")
            },
            suffix: {
                required: "Please input suffix"
            }
        },
        submitHandler: function(form) { // for demo
            form.submit();
        }
    });
    $("#gst-modal").on('shown.bs.modal', function(event) {
        var e = $(event.relatedTarget);
        console.log(e);
        var modal = $(this);
        modal.find('.modal-body #gstin_update_sdmid').val($("#sdmslno").val());
    });
});
;;;;