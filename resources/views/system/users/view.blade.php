@extends('system.dashboard')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Users</li>
    </ol>
    </section>
    <div class="col-md-12">
        <a class="btn btn-success btn-lg pull-right" href="/system/new_user">New User</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th> ID </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> PO NO </th>
                <th> Email </th>
                <th> Designation </th>
                <th> Access Level </th>
                <th> Phone NO </th>
                <th> National ID </th>
            </tr>
            </thead>
            <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{$profile->id}}</td>
                    <td>{{$profile->first_name}}</td>
                    <td>{{$profile->last_name}}</td>
                    <td>{{$profile->p_no}}</td>
                    <td>{{$profile->email}}</td>
                    <td>{{$profile->designation}}</td>
                    <td>{{$profile->access_level}}</td>
                    <td>{{$profile->phone_no}}</td>
                    <td>{{$profile->nat_id}}</td>
                    <td>
                        <form class="deletestu" action="/system/profile/{{ $profile->id }}/delete" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
