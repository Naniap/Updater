(function (window, document) {
    var console = $('.console');
    function log(someText) {
        $(console).prepend(someText + "\r\n");
    }
        $('.button-website').click(function () {
            log("Updating " + this.innerHTML);
            $.ajax({
                url: ('./php/ajax.php?web-id=' + this.getAttribute("data-site")),
                success: function (data) {
                    log(data);
                }
            });

        });
    $('.button-startable').click(function () {
        log("Updating " + this.innerHTML);
        $.ajax({
            url: ('./php/ajax.php?start-id=' + this.getAttribute("data-startable")),
            success: function (data) {
                log(data);
            }
        });

    });
} (this, document));