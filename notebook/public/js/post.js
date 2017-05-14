$('#saveContent').on('click',function()
{
	var txt = $('#diary').val();
	$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	$.ajax({
		method:'post',
		url: '/updatepost',
		data:{content : txt}
	}).done (function(data)
	{
		window.location.href = '/welcome';
	}).fail(function(xhr, textStatus, errorThrown) {
        alert(xhr.status);
        });
});