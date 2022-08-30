$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function loadMore(){
    // console.log(1);
    const page = $('#page').val();
    $.ajax({
        type : 'GET',
        dataType : 'JSON',
        data : { page },
        url : '/services/load-more/',
        success : function (result) {
            // console.log(result)
            if(result.html !== ''){
                $('#loadProduct').append(result.html);
                $('#page').val(page + 1);
            }else {
                alert('da load xong san pham');
                $('#btn-loadMore').css('display', 'none');
            }
        }
    })
}

