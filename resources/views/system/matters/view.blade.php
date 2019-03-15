@extends('system.dashboard')

@section('content')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">View Users</li>
    </ol>
    </section>
    <div class="col-md-12">
        <a class="btn btn-success btn-lg pull-right" href="/system/matter/new">New Case</a>
        <table id="example2" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th> ID </th>
                <th> Case No/ Name of Parties </th>
                <th> Attorney InCharge </th>
                <th> Instructions Date </th>
                <th> Client Name </th>
                <th> Client Email </th>
                <th> Client Mobile </th>
                <th> Clerk Incharge </th>
                <th> Matter Status </th>
                <th> Edit </th>
                <th> View</th>
            </tr>
            </thead>
            <tbody>
            @foreach($matters as $matter)
                <tr>
                    <td>{{$matter->id}}</td>
                    <td>{{$matter->matter_name}}</td>
                    <td>{{$matter->counsel_incharge}}</td>
                    <td>{{$matter->file_date}}</td>
                    <td>{{$matter->client_name}}</td>
                    <td>{{$matter->client_email}}</td>
                    <td>{{$matter->client_mobile}}</td>
                    <td>{{$matter->clerk_incharge}}</td>
                    <td>{{$matter->matter_status}}</td>
                    <td> <a href="/system/matter/view"> <i class="fa fa-edit"></i> </a> </td>
                    <td> <a href="/system/matter/view"> <i class="fa fa-eye"></i> </a> </td>
                    <td>
                        <form class="deletestu" action="/system/matter/{{ $matter->id }}/delete" method="post">
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
