$(document).ready(function() {
    $('#contact-button').click(function() {
        $.ajax({
            url: 'http://localhost/portfolio/mail.php',
            data: {name: $('label.name input').html()},
            type: 'post',
            success: function(output) {
                //alert(output);
            }
        });
    });
});