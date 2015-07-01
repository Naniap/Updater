(function (window, document) {
    var console = $('.console');
    function log(someText) {
        $(console).prepend(someText + "\r\n");
    }

    $('.button').click(function() {
        log("Updating " + this.innerHTML);
        $.ajax({
                url: ('./php/ajax.php?web-id=' + this.getAttribute("data-site")),
                success: function(data) {
                    log(data);
                }
            });

    });
} (this, document));