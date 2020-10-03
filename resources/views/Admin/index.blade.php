@extends('base')@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Branch Manager</h1>
    <div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('admin.create')}}" class="btn btn-primary">Add New</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Branch Manager Name</td>
          <td>Branch Manager Email</td>
            <td>Branch Manager Phone Number</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($admins as $admin)
        <tr>
            <td>{{$admin->admins_id}}</td>
            <td>{{$admin->admins_name}}</td>
            <td>{{$admin->admins_email}}</td>
              <td>{{$admin->admins_phone}}</td>

            <td>
                <a href="{{ route('admin.edit',$admin->admins_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('admin.destroy',$admin->admins_id)}}" method="post">
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
