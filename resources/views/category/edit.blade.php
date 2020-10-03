@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Categories</h1>
        @if ($errors->any())
        <div class="alert alert-danger">Update a Categories
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('category.update',$categories->categories_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="categories_name">Categories Name:</label>
                <input type="text" class="form-control" name="categories_name" value={{ $categories->categories_name}} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
