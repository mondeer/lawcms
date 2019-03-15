@extends('system.dashboard')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New User</li>
    </ol>
    </section>
    <div class="col-md-12">
        <div class="header header-primary text-center">
            <div class="logo-container">
                <img width="200px" src="/logo/kalya.png" class="kalya-logo" />
            </div>
            <hr>
            <p>
                Set new profile below <br>
            </p>
        </div>

        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('/system/new_user') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-2 control-label"> First Name</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                </div>
                <label class="col-md-2 control-label"> Last Name</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> PO No.</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="p_no" value="{{ old('p_no') }}">
                </div>
                <label class="col-md-2 control-label">Email</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> Designation</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="designation" value="{{ old('designation') }}">
                </div>
                <label class="col-md-2 control-label"> Access Level</label>
                <div class="col-md-3">
                    <select class="form-control" name="access_level">
                        <option></option>
                        <option>admin</option>
                        <option>managing</option>
                        <option>advocate_incharge</option>
                        <option>associate</option>
                        <option>pupil</option>
                        <option>clerk</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> Phone No. </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="phone_no" value="{{ old('phone_no') }}">
                </div>
                <label class="col-md-2 control-label"> Nation ID </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="nat_id" value="{{ old('nat_id') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Add User</button>
                </div>
            </div>
        </form>

    </div>
@endsection
