$(document).ready(function () {
    $(".delete-button").on('click', (function () {
        var itemId = this.id;
        $(`#deletion-form-${itemId}`).submit();    
        $("li").remove(`.li-${itemId}`);
    }));
});

