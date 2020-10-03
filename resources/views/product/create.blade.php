@extends('base')@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Product</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('product.store') }}">
          @csrf
          <div class="form-group">
              <label for="products_name">Product Name:</label>
              <input type="text" class="form-control" name="products_name"/>
          </div>          <div class="form-group">
              <label for="products_dis">Product description:</label>
              <input type="text" class="form-control" name="products_dis"/>
          </div>
          <div class="form-group">
              <label for="branches_id">Select Category:</label>
            <select class="form-control" name="categories_id">
              <option value="0">Select One</option>
                @foreach($categories as $category)
                   <option value="{{$category->categories_id}}">{{$category->categories_name}}</option>
                @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Add Prodect</button>
      </form>
  </div>
</div>
</div>
@endsection
