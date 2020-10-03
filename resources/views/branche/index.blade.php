@extends('base')@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Branches</h1>
    <div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('branche.create')}}" class="btn btn-primary">Add New</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Branch Name</td>
          <td>Branch Location</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($branches as $branche)
        <tr>
            <td>{{$branche->branches_id}}</td>
            <td>{{$branche->branches_name}}</td>
            <td>{{$branche->branches_location}}</td>

            <td>
                <a href="{{ route('branche.edit',$branche->branches_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('branche.destroy',$branche->branches_id)}}" method="post">
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
