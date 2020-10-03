@extends('base')@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add New Branche</h1>
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
      <form method="post" action="{{ route('branche.store') }}">
          @csrf
          <div class="form-group">
              <label for="branches_name">Branch Name:</label>
              <input type="text" class="form-control" name="branches_name"/>
          </div>          <div class="form-group">
              <label for="branches_location">Branch Location:</label>
              <input type="text" class="form-control" name="branches_location"/>
          </div>
          <button type="submit" class="btn btn-primary">Add Branch</button>
      </form>
  </div>
</div>
</div>
@endsection
