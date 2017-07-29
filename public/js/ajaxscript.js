$(document).ready(function () {

    var url = "http://laravel.dev:8000/products";

    //menampilkan modal form ketika pengguna menekan tombol edit
    $(document).on('click', '.open_modal', function () {
        var product_id = $(this).val();
        $.get(url + '/' + product_id, function (data) {
            console.log(data);
            $("#product_id").val(data.id);
            $('#name').val(data.name);
            $('#details').val(data.details);
            $('btn-save').val("update");

            $('#myModal').modal('show');
        });

    });

    //menampilkan data ketika membuat produk baru
    $("#btn_add").click(function () {
        $('#btn-save').val('add');
        $('#frmProducts').trigger('reset');

        $('#myModal').modal('show');
    });

    //save product
    $("#btn-save").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        e.preventDefault();

        var formData = {
            name:$('#name').val(),
            details:$('#details').val()
        };

        var state = $("#btn-save").val();

        var type = "POST";
        var product_id = $('#product_id').val();
        var my_url = url;

        if(state=="update"){
            type="PUT";
            my_url+='/'+product_id;
        }
        console.log(formData);

        $.ajax({
            type:type,
            url:my_url,
            data:formData,
            dataType:'json',
            success:function(data){
                console.log(data);
                var product = '<tr id="product' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td>' + data.details + '</td>';
                product += '<td><button class="btn btn-warning btn-detail open_modal btn-xs" value="' + data.id + '">Edit</button>&nbsp;';
                product += '<button class="btn btn-danger btn-delete delete-product btn-xs" value="' + data.id + '">Delete</button></td></tr>';

                if(state=="add"){
                    $("#product-list").append(product);
                }
                else{
                     $("#product" + product_id).replaceWith(product);
                }
                
                $('#frmProducts').trigger('reset');
                $('#myModal').modal('hide');
            },
            error:function(data){
                console.log('Error:'+data);
            }
        });
    });

    //delete product
    $(document).on('click','.delete-product',function(){
        var product_id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            type:'DELETE',
            url:url+'/'+product_id,
            success:function(data){
                console.log(data);
                $("#product"+product_id).remove();
            },
            error:function(data){
                console.log("Error :"+data);
            }
        });
    });

});

