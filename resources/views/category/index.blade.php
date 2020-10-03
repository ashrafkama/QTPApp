@extends('base')@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Product Category</h1>
    <div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('category.create')}}" class="btn btn-primary">Add New</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Categories Name</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->categories_id}}</td>
            <td>{{$category->categories_name}}</td>
              <td>
                <a href="{{ route('category.edit',$category->categories_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('category.destroy',$category->categories_id)}}" method="post">
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
