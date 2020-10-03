@extends('base')@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Products</h1>
    <div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('product.create')}}" class="btn btn-primary">Add New</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Product Name</td>
          <td>Product description</td>

          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->products_id}}</td>
            <td>{{$product->products_name}}</td>
            <td>{{$product->products_sid}}</td>


            <td>
                <a href="{{ route('product.edit',$product->products_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('product.destroy',$product->products_id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
