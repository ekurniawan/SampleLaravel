@extends('layouts.main')
@section('content')

<div class="row">
    <h2>Daftar Product</h2>
    <button id="btn_add" class="btn btn-success pull-right btn-xs">Add Product</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="product-list" name="product-list">
            <tr>
                @foreach($products as $product)
                    <tr id="product{{$product->id}}">
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->details}}</td>
                        <td>
                            <button class="btn btn-warning btn-detail open_modal btn-xs" value="{{$product->id}}">Edit</button>
                            <button class="btn btn-danger btn-delete delete-product btn-xs" value="{{$product->id}}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
           <div class="modal-content">
             <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Product</h4>
            </div>
            <div class="modal-body">
            <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                <div class="form-group error">
                 <label for="inputName" class="col-sm-3 control-label">Name</label>
                   <div class="col-sm-9">
                    <input type="text" class="form-control has-error" id="name" name="name" placeholder="Product Name" value="">
                   </div>
                   </div>
                 <div class="form-group">
                 <label for="inputDetail" class="col-sm-3 control-label">Details</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="details" name="details" placeholder="Details" value="">
                    </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
            <input type="hidden" id="product_id" name="product_id" value="0">
            </div>
        </div>
      </div>
  </div>
</div>
<meta name="_token" content="{!! csrf_token() !!}" />
@stop 

@section('myjs')
    <script src="{{asset('js/ajaxscript.js')}}"></script>
@stop