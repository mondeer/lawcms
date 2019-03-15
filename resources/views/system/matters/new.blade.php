@extends('system.dashboard')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">New Matter</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
    <div class="col-md-10">
        <div class="header header-primary text-center">
            <div class="logo-container">
                <img width="200px" src="/logo/kalya.png" class="kalya-logo" />
            </div>
            <hr>
            <p>
                <br>
            </p>
        </div>

        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data"
              action="{{ url('/system/matter/new') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-2 control-label"> Case No./ Name of parties</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="matter_name" value="{{ old('matter_name') }}">
                </div>
                <label class="col-md-2 control-label"> Case Type</label>
                <div class="col-md-3">
                    <select class="form-control" name="matter_type" id="">
                        <option value=""></option>
                        <option value="civil">Civil</option>
                        <option value="criminal">Criminal</option>
                    </select>
                </div>

            </div>

            <div class="form-group">
                <label class="col-md-2 control-label"> Primary Attorney</label>
                <div class="col-md-3">
                    <select class="form-control" name="counsel_incharge">
                        <option></option>
                        @foreach($advocates as $advocate)
                            <option value="{{$advocate->p_no}}">{{$advocate->first_name}}  {{$advocate->last_name}}</option>
                        @endforeach
                    </select>
                </div>
                <label class="col-md-2 control-label">Opposing Attorney</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="opposing_counsel" value="{{ old('opposing_counsel') }}">
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label">File Instructions Date</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="file_date" value="{{ old('file_date') }}">
                </div>
            </div>

            <h3>Client Details</h3>

            <div class="form-group">
                <label class="col-md-2 control-label"> Client Name </label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="client_name" value="{{ old('client_name') }}">
                </div>
                <label class="col-md-2 control-label"> Client Email</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="client_email" value="{{ old('client_email') }}">
                </div>

            </div>
            <div class="form-group">
                <label class="col-md-2 control-label"> Client Mobile No.</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="client_mobile" value="{{ old('client_mobile') }}">
                </div>
                <label class="col-md-2 control-label"> Matter Status</label>
                <div class="col-md-3">
                    <select class="form-control" name="matter_status" id="">
                        <option value=""></option>
                        <option value="open">open</option>
                        <option value="closed">closed</option>
                        <option value="suspended">suspended</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Student incharge</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="student_incharge" value="{{ old('student_incharge') }}">
                </div>
                <label class="col-md-2 control-label"> Clerk incharge</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="clerk_incharge" value="{{ old('clerk_incharge') }}">
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">Add Matter</button>
                </div>
            </div>
        </form>

    </div>
@endsection
