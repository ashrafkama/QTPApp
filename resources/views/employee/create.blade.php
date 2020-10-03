@extends('base')@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Employee</h1>
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
      <form method="post" action="{{ route('employee.store') }}">
          @csrf
          <div class="form-group">
              <label for="employees_name">Employee Name:</label>
              <input type="text" class="form-control" name="employees_name"/>
          </div>
           <div class="form-group">
              <label for="employees_email">Employee Email Address:</label>
              <input type="text" class="form-control" name="employees_email"/>
          </div>          <div class="form-group">
              <label for="employees_phone">Employee Phone number:</label>
              <input type="text" class="form-control" name="employees_phone"/>
          </div>
          <div class="form-group">
              <label for="branches_id">Select Branch:</label>
            <select class="form-control" name="branches_id">
              <option value="0">Select One</option>
                @foreach($branches as $branche)
                   <option value="{{$branche->branches_id}}">{{$branche->branches_name}}</option>
                @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Add Employee</button>
      </form>
  </div>
</div>
</div>
@endsection
