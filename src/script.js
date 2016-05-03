$(document).ready(function() {
    $('div.links a').click(function(e) {

        e.preventDefault();

        $('div.code code').html($(this).attr('href'));

        var sizes = $(this).data('sizes').replace('x', ' x ');

        $('div.code p').html(sizes);

        if (document.selection) {
            var range = document.body.createTextRange();
            range.moveToElementText(document.getElementById('url'));
            range.select();
        } else if (window.getSelection) {
            var range = document.createRange();
            range.selectNode(document.getElementById('url'));
            window.getSelection().addRange(range);
        }

    })
});
