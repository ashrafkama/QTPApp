@extends('base')@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Employee</h1>
    <div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
</div>
<div>
    <a style="margin: 19px;" href="{{ route('employee.create')}}" class="btn btn-primary">Add New</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Employee Name</td>
          <td>Employee Email</td>
            <td>Employee Phone Number</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td>{{$employee->employees_id}}</td>
            <td>{{$employee->employees_name}}</td>
            <td>{{$employee->employees_email}}</td>
            <td>{{$employee->employees_phone}}</td>

            <td>
                <a href="{{ route('employee.edit',$employee->employees_id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('employee.destroy',$employee->employees_id)}}" method="post">
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
