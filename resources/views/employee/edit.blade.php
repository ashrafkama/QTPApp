@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a Branch Manager</h1>
        @if ($errors->any())
        <div class="alert alert-danger">Update a Branches Manager
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('employee.update',$employee->employees_id)}}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="employees_name">Employee Name:</label>
                <input type="text" class="form-control" name="employees_name" value={{ $employee->employees_name}} />
            </div>
            <div class="form-group">
                <label for="employees_email">Employee E-mail:</label>
                <input type="text" class="form-control" name="employees_email" value={{ $employee->employees_email }} />
            </div>
            <div class="form-group">
                <label for="employees_phone">Employee Phone Number:</label>
                <input type="text" class="form-control" name="employees_phone" value={{ $employee->employees_phone }} />
            </div>
            <div class="form-group">
                <label for="branches_id">Select Branch:</label>
              <select class="form-control" name="branches_id">
                <option value="0">Select One</option>
                  @foreach($branches as $branche)
                  @if($branche->branches_id == $employee->branches_id)
                     <option value="{{$branche->branches_id}}" selected>{{$branche->branches_name}}</option>
                    @else
                      <option value="{{$branche->branches_id}}">{{$branche->branches_name}}</option>
                       @endif
                  @endforeach
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
