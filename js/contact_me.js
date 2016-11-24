$(function() {

    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var vards = $("input#vards").val();
            var uzvards = $("input#uzvards").val();
            var dzimums = $("input#dzimums").val();
            var dzd = $("input#dzd").val();
            var profesija = $("input#profesija").val();
            var specialitate = $("input#specialitate").val();
            var darbavieta = $("input#darbavieta").val();
            var darbaadrese = $("input#darbaadrese").val();
            var majasadrese = $("input#majasadrese").val();
            var kliniskasintereses = $("input#kliniskasintereses").val();
            var lllprogramma = $("input#lllprogramma").val();
            var epasts = $("input#epasts").val();
            var telefons = $("input#telefons").val();

            $.ajax({
                url: "././mail/contact_me.php",
                type: "POST",
                data: {
                    vards: vards,
                    uzvards: uzvards,
                    dzimums: dzimums,
                    dzd: dzd,
                    profesija: profesija,
                    specialitate: specialitate,
                    darbavieta: darbavieta,
                    darbaadrese: darbaadrese,
                    majasadrese: majasadrese,
                    kliniskasintereses: kliniskasintereses,
                    lllprogramma: lllprogramma,
                    epasts: epasts,
                    telefons: telefons
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Jūsu pieteikums ir veiksmīgi nosūtīts!</strong>");
                    $('#success > .alert-success')
                        .append('</div>');

                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Atvainojiet, serveris šobrīd nestrādā. Lūdzu, mēģiniet vēlāk!</strong>");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            });
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

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
