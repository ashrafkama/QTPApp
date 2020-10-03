@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Product</h1>
        @if ($errors->any())
        <div class="alert alert-danger">Update a Product
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('product.update',$product->products_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="products_name">Prodect  Name:</label>
                <input type="text" class="form-control" name="products_name" value={{ $product->products_name}} />
            </div>
            <div class="form-group">
                <label for="products_dis">Product description:</label>
                <input type="text" class="form-control" name="products_dis" value={{ $product->products_dis}} />
            </div>
            <div class="form-group">
                <label for="branches_id">Select Category:</label>
              <select class="form-control" name="categories_id">
                <option value="0">Select One</option>
                  @foreach($categories as $category)
                  @if($category->categories_id== $product->categories_id)
                     <option value="{{$category->categories_id}}" selected>{{$category->categories_name}}</option>
                    @else
                      <option value="{{$category->categories_id}}">{{$category->categories_name}}</option>
                       @endif
                  @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
