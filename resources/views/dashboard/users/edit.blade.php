@extends('dashboard.layout.app')
@section('title', 'Dashboard - edit user')
@section('content')	
    <div class="content-wrapper">
        <div class="container-fluid">

            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                      <div class="card-body">
                      <div class="card-title">Edit Client</div>
                      <hr>
                       <form method="post" action="{{ route('update.user', ['id' => $user->id]) }}" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                       <label>First Name</label>
                        <input type="text" name="first_name" class="form-control"  placeholder="Enter First Name"value="{{ old('first_name',$user->first_name) }}">
                        @if ($errors->has('first_name'))
                            <p class="text-error more-info-err" style="color: red;">
                                {{ $errors->first('first_name') }}</p>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control"  placeholder="Enter Last Name"value="{{ old('last_name',$user->last_name) }}">
                        @if ($errors->has('last_name'))
                            <p class="text-error more-info-err" style="color: red;">
                                {{ $errors->first('last_name') }}</p>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control"  placeholder="Enter Email"value="{{ old('email',$user->email) }}">
                        @if ($errors->has('email'))
                            <p class="text-error more-info-err" style="color: red;">
                                {{ $errors->first('email') }}</p>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone_number" class="form-control"  placeholder="Enter Phone Number"value="{{ old('phone_number',$user->phone) }}">
                        @if ($errors->has('phone_number'))
                            <p class="text-error more-info-err" style="color: red;">
                                {{ $errors->first('phone_number') }}</p>
                        @endif
                      </div>
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"  placeholder="Enter Username"value="{{ old('username',$user->username) }}">
                        @if ($errors->has('username'))
                            <p class="text-error more-info-err" style="color: red;">
                                {{ $errors->first('username') }}</p>
                        @endif
                      </div>
                      
                      
                      <div class="form-group">
                       <button type="submit" class="btn btn-light px-5"><i class="icon-lock"></i> Register</button>
                     </div>
                     </form>
                    </div>
                    </div>
                 </div>
            </div>
            <div class="overlay toggle-menu"></div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   
</script>
@endpush
