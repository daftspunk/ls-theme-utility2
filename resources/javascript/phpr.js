/**
 * Loading Panel
 */

Phpr.showLoadingIndicator = function() {
    var message = 'Processing...';
    $(document).statusbar('option', {position: 'top', context: 'info', time: 999999, message:message});
};

Phpr.hideLoadingIndicator = function() {
    $(document).statusbar('removeMessage');
};

Phpr.response.popupError = function() {
    var message = this.html.replace('@AJAX-ERROR@', '');
    $(document).statusbar('option', {position: 'top', context: 'error', time: 10000, message:message});
};

Phpr.options.extraFields = {
	flash_partial: 'site:flash_message'
};