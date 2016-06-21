
$(function () {
    $('.category-action').change(function () {
        var href = $(this).val();
        var catName = $(this).closest('tr').find('td').eq(1).text();
        var selectBox =  $(this);
        if(href != -1) {
            if(href.indexOf('delete') == -1) {
                $.confirm({
                    title: 'Edit <b>'+ catName +'</b>',
                    content: function () {
                        var self = this;
                        return $.ajax({
                            url: href,
                            dataType: 'html',
                            method: 'get'
                        }).done(function (response) {
                            self.setContent(response);
                        }).fail(function(){
                            self.setContent('Something went wrong.');
                        });
                    },
                    confirm: function(){
                        var formData = $('#saveCatForm').serialize();
                        var url = $('#saveCatForm').attr('action');
                        $.post(url, formData, function (result) {
                            var msgContainer = generateMessage('warning', result.message);
                            if(result.success) {
                                msgContainer = generateMessage('success', result.message);
                                $('.alert-area').html(msgContainer);
                                reloadPage(3);
                            } else {
                                $('.alert-area').html(msgContainer);
                            }
                        });
                    },
                    cancel: function(){
                        selectBox.prop('selectedIndex',0);
                    }
                });
            } else {
                $.confirm({
                    title: 'Confirm!',
                    content: 'Are you sure to delete <b>' + catName + '</b>!',
                    confirm: function(){
                        $.post(href, function (result) {
                            var msgContainer = generateMessage('warning', result.message);
                            if(result.success) {
                                msgContainer = generateMessage('success', result.message);
                                $('.alert-area').html(msgContainer);
                                reloadPage(3);
                            } else {
                                $('.alert-area').html(msgContainer);
                            }
                        });
                    },
                    cancel: function(){
                       selectBox.prop('selectedIndex',0);
                    }
                });
            }
        }
    });

    $('.add-category').click(function (e) {
        e.preventDefault();
        $.confirm({
            title: 'Enter category name',
            content: function () {
                var self = this;
                return $.ajax({
                    url: '/manager-category/add',
                    dataType: 'html',
                    method: 'get'
                }).done(function (response) {
                    self.setContent(response);
                }).fail(function(){
                    self.setContent('Something went wrong.');
                });
            },
            confirm: function(){
                var formData = $('#saveCatForm').serialize();
                var url = $('#saveCatForm').attr('action');
                $.post(url, formData, function (result) {
                    var msgContainer = generateMessage('warning', result.message);
                    if(result.success) {
                        msgContainer = generateMessage('success', result.message);
                        $('.alert-area').html(msgContainer);
                        reloadPage(3);
                    } else {
                        $('.alert-area').html(msgContainer);
                    }
                });
            },
            cancel: function(){

            }
        });
    })

});

function generateMessage(className, message) {
    return $('<div>').addClass('alert ' + 'alert-' + className)
        .append($('<a>').addClass('close').attr({ 'aria-label': 'close', 'href': '#', 'data-dismiss': 'alert' }).html('&times;'))
        .append($('<span>').text(message));
}

function reloadPage(time) {
    setTimeout(function () {
        location.reload();
    }, time * 1000)
}