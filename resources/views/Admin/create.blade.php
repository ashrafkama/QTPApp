@extends('base')@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Admin</h1>
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
      <form method="post" action="{{ route('admin.store') }}">
          @csrf
          <div class="form-group">
              <label for="admins_name">Amin Name:</label>
              <input type="text" class="form-control" name="admins_name"/>
          </div>          <div class="form-group">
              <label for="admins_email">Admin Email Address:</label>
              <input type="text" class="form-control" name="admins_email"/>
          </div>          <div class="form-group">
              <label for="email">Admin Phone number:</label>
              <input type="text" class="form-control" name="admins_phone"/>
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

          <button type="submit" class="btn btn-primary">Add contact</button>
      </form>
  </div>
</div>
</div>
@endsection
