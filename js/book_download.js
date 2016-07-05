$(function() {

    $("input").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#name").val();
            var email = $("input#email").val();
            var school = $("input#school").val();
            var role = $("input#role").val();

            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "../mail/book_download.php",
                type: "POST",
                data: {
                    name: name,
                    email: email,
                    school: school,
                    role
                    // message: message
                },
                cache: false,
                success: function() {
                    // success message
                    $("#formBook").slideUp(500, function() {
                        $("#formThanks").delay(200).slideDown(500);
                    });
                    var name = $("input#name").val();
                    $("#formThanks").prepend('<h3>Hi ' + name + ',</h3>');

                    //clear all fields
                    $('#bookDownload').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#bookDownload').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// /*When clicking on Full hide fail/success boxes */
// $('#name').focus(function() {
//     $('#success').html('');
// });
