
$(function () {
    $('.category-action').change(function () {
        var href = $(this).val();
        var catName = $(this).closest('tr').find('td').eq(1).text();
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
                        $('#saveCatForm').submit();
                    },
                    cancel: function(){
                        selectBox.prop('selectedIndex',0);
                    }
                });
            } else {
                var selectBox =  $(this);
                $.confirm({
                    title: 'Confirm!',
                    content: 'Are you sure to delete <b>' + catName + '</b>!',
                    confirm: function(){
                        location.href = href;
                    },
                    cancel: function(){
                       selectBox.prop('selectedIndex',0);
                    }
                });
            }
        }
    });

});
