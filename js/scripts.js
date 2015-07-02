(function (window, document) {
    var console = $('.console');
    function log(someText) {
        $(console).prepend(someText + "\r\n");
    }
    if (1 == 1) {
        $('.button').click(function () {
            log("Updating " + this.innerHTML);
            $.ajax({
                url: ('./php/ajax.php?web-id=' + this.getAttribute("data-site")),
                success: function (data) {
                    log(data);
                }
            });

        });
    }
    else {
        $('.button').click(function () {
            log("Starting... " + this.innerHTML);
            $.ajax({
                url: ('./php/ajax.php?start-id=' + this.getAttribute("starter-site")),
                success: function (data) {
                    log(data);
                }
            });

        });
    }
} (this, document));