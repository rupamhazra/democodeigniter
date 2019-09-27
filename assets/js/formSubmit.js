var baseUrl = "http://www.shyamfuture.com";
//var baseUrl = "http://localhost/shyamfuture";
$('#formContact').on('submit', function(e) {
    e.preventDefault();
    $('#btnSave').text('Sending...');
    $('#btnSave').attr('disabled', true);
    var url = baseUrl + "/save-contact";
	//alert(url);
    $.ajax({
        url: url,
        type: "POST",
        data: $('#formContact').serialize(),
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                window.location.replace(baseUrl + '/thank-you');
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                }
                //if (data.chkerror) {
//                    $('.captchaError').html('Check above to prove yourself.');
//                    $('.captchaError').show();
//                }
            }
            $('#btnSave').text('Send Message');
            $('#btnSave').attr('disabled', false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Your session has been expired.');
            $('#btnSave').text('Send Message');
            $('#btnSave').attr('disabled', false);
        }
    });
});

//contact-us page form submit
$('#contact-form').on('submit', function(e) {
    e.preventDefault();
    $('#btnSave').text('Sending...');
    $('#btnSave').attr('disabled', true);
    var url = baseUrl + "/save-contact-from";
    $.ajax({
        url: url,
        type: "POST",
        data: $('#contact-form').serialize(),
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
                window.location.replace(baseUrl + '/thank-you');
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                }
                //if (data.chkerror) {
//                    $('.captchaError').html('Check above to prove yourself.');
//                    $('.captchaError').show();
//                }
            }
            $('#btnSave').text('Send Message');
            $('#btnSave').attr('disabled', false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Your session has been expired.');
            $('#btnSave').text('Send Message');
            $('#btnSave').attr('disabled', false);
        }
    });
});

$('#formSubs').on('submit', function(e) {
    e.preventDefault();
	
    $('#btnSave').text('Sending...');
    $('#btnSave').attr('disabled', true);
    var url = baseUrl + "/save-subs";
    $.ajax({
        url: url,
        type: "POST",
        data: $('#formSubs').serialize(),
        dataType: "JSON",
        success: function(data) {
            if (data.status) {
				//alert(data.status);
                //window.location.replace(baseUrl + '/thank-you');
				//$('.sub-sec span').html("success");
				/* $('.sub-sec span').fadeOut(800, function(){
                  $('.sub-sec span').html("success").fadeIn().delay(2000);
				 });*/
				  $('#myid').fadeIn("fast", function() { $(this).delay(1000).fadeOut("slow"); });
				 $("#formSubs")[0].reset();
				 
            } else {
                for (var i = 0; i < data.inputerror.length; i++) {
                    $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error');
                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                }
                /*if (data.chkerror) {
                    $('.captchaError').html('Check above to prove yourself.');
                    $('.captchaError').show();
                }*/
            }
            $('#btnSave').text('Send Message');
            $('#btnSave').attr('disabled', false);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Your session has been expired.');
            $('#btnSave').text('Send Message');
            $('#btnSave').attr('disabled', false);
        }
    });
});
$('.cForm').focusin(function() {
    $(this).parent('div').removeClass("has-error");
    $(this).siblings('span').text("");
});


//$('#leadCaptureForm').on('submit', function(e) {
//    e.preventDefault();
//    $('#btnSave').text('Sending...');
//    $('#btnSave').attr('disabled', true);
//    var url = baseUrl + "/save-contact-gen";
//    $.ajax({
//        url: url,
//        type: "POST",
//        data: $('#leadCaptureForm').serialize(),
//        dataType: "JSON",
//        success: function(data) {
//            if (data.status) {
//                window.location.replace(baseUrl + '/thank-you');
//            } else {
//                for (var i = 0; i < data.inputerror.length; i++) {
//                    $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error');
//                    $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
//                }
//            }
//            $('#btnSave').text('Send Message');
//            $('#btnSave').attr('disabled', false);
//        },
//        error: function(jqXHR, textStatus, errorThrown) {
//            alert('Your session has been expired.');
//            $('#btnSave').text('Send Message');
//            $('#btnSave').attr('disabled', false);
//        }
//    });
//});
//$('.cForm').focusin(function() {
//    $(this).parent('div').removeClass("has-error");
//    $(this).siblings('span').text("");
//});
//$(document.body).on('click', '.recaptcha-checkbox', function() {
//    $('.captchaError').hide();
//});