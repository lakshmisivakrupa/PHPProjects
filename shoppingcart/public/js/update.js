
$('.quantity').on('change',function() {
var id = $(this).attr('data-id')
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    url: '/update-cart',
    dataType:'json',
    method: 'post',
    data: {'txt' : this.value,
           'id' : id}
    }).done(function (data) {
    	window.location.href = '/shopping-cart';
        }).fail(function(xhr, textStatus, errorThrown) {
        alert(xhr.status);
        });

});