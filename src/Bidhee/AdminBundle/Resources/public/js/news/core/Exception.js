/**
 * @author Danepliz
 */
;
(function () {
    news.core.Exception = function (message) {
        this.message = message;
        this.toString = function () {
            return this.message;
        };
    }
})();
