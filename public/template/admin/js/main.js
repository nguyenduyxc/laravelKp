$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            type: 'DELETE',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}


// upload file
$('#upload').change(function (){
    console.log(123);
    const form = new FormData();
    form.append('file', $(this)[0].files[0] );
    // console.log(form);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        datatype: 'JSON',
        data: form,
        url: '/admin/upload/services',
        success: function (results){
            // console.log(results);

            if(results.error == false){
                $('#image_show').html('<a href="'+results.url+'" target="_blank"><img src="'+results.url+'" alt="" width="100px"></a>')
                $('#file').val(results.url)
            }else {
                alert('Upload file loi');
            }
        }
    })
});
