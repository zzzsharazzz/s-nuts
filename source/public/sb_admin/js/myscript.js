
$(function () {
    $('.category-action').change(function () {
        var href = $(this).val();
        var catName = $(this).closest('tr').find('td').eq(0).text();
        var selectBox =  $(this);
        var myModal = $('#myModal');
        if(href != -1) {
            if(href.indexOf('delete') == -1) {
                // edit
                $.ajax({
                    url: href,
                    dataType: 'html',
                    method: 'get'
                }).done(function (response) {
                    if(response.trim() != '') {
                        myModal.find('.modal-title').text('Edit category');
                        myModal.find('.modal-body').html(response);
                        myModal.modal('show');
                        selectBox.prop('selectedIndex',0);
                        $('#saveCatForm').validate({
                            rules: {
                                category_name: 'required'
                            },
                            messages: {
                                category_name: 'Please enter your category name!'
                            },
                            submitHandler: function (form) {
                               form.submit();
                            }
                        });
                    }
                }).fail(function(){
                    alert('Sorry, something went wrong! Please try again.')
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
                                reloadPage(1.5);
                            } else {
                                $('.alert-area').html(msgContainer);
                                selectBox.prop('selectedIndex',0);
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
        $.ajax({
            url: '/manager-category/add',
            dataType: 'html',
            method: 'get'
        }).done(function (response) {
            var myModal = $('#myModal');
            myModal.find('.modal-title').text('Add new category');
            myModal.find('.modal-body').html(response);
            myModal.modal('show');
            $('#saveCatForm').validate({
                rules: {
                    category_name: 'required'
                },
                messages: {
                    category_name: 'Category name is required!'
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        }).fail(function(){
            alert('Sorry, something went wrong! Please try again.')
        });
    });

    // products
    $('a.product-delete').click(function (e) {
        e.preventDefault();
        var productName = $(this).closest('tr').find('td:first').text();
        var href = $(this).attr('href');
        $.confirm({
            title: 'Confirm!',
            content: 'Are you sure to delete <b>' + productName + '</b>!',
            confirm: function(){
               $.post(href, function (result) {
                   var msgContainer = generateMessage('warning', result.message);
                   if(result.success) {
                       msgContainer = generateMessage('success', result.message);
                       $('.alert-area').html(msgContainer);
                       reloadPage(1.5);
                   } else {
                       $('.alert-area').html(msgContainer);
                   }
               });
            },
            cancel: function(){

            }
        });
    });

    $('a.add-product').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/manager-product/add',
            dataType: 'html',
            method: 'get'
        }).done(function (response) {
            var myModal = $('#myModal');
            myModal.find('.modal-title').text('Add new product');
            myModal.find('.modal-body').html(response);
            myModal.modal('show');
            $('#saveProductForm').validate({
                rules: {
                    product_name: 'required',
                    product_sku: 'required',
                    product_price: {
                        required: true,
                        number: true
                    }
                },
                messages: {
                    product_name: 'Product name is required!',
                    product_sku: 'Product sku is required!',
                    product_price: {
                        required: 'Product price is required!',
                        number: 'Price must is an number!'
                    }
                },
                submitHandler: function (form) {
                    form.submit();
                }
            });
        }).fail(function(){
            alert('Sorry, something went wrong! Please try again.')
        });
    });

    // initialize with defaults
    $("#input-1").fileinput();

    // with plugin options
    $("#input-1").fileinput({'showUpload':false, 'previewFileType':'any'});


});

function generateMessage(className, message) {
    return $('<div>').addClass('alert ' + 'alert-' + className)
        .append($('<a>').addClass('close').attr({ 'aria-label': 'close', 'href': '#', 'data-dismiss': 'alert' }).html('&times;'))
        .append($('<span>').text(message));
}

function reloadPage(time) {
    setTimeout(function () {
        location.reload();
    }, time * 1000);
}


