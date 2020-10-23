@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Donations and their informations</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12 col-md-6"></div>
                <div class="col-sm-12 col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                        aria-describedby="example2_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-sort="ascending"
                                    aria-label="Rendering engine: activate to sort column descending">Donation ID
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Donation Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Platform(s): activate to sort column ascending">Donation Amount</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Engine version: activate to sort column ascending">Currency</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="Browser: activate to sort column ascending">Transaction ID</th>
                                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                                    aria-label="CSS grade: activate to sort column ascending">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($donations as $donation)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{{$donation->id}}</td>
                                <td>{{$donation->donation_name}}</td>
                                <td>{{$donation->donation_email}}</td>
                                <td>{{$donation->donation_amount}}</td>
                                <td>{{$donation->currency}}</td>
                                <td>{{$donation->donation_transaction_id}}</td>
                                <td>
                                    {{-- <button class="btn btn-warning pr-4 editbtn">Approve</button><br>
                                    <button class="btn btn-danger deletebtn">Decline</button> --}}
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Donation ID</th>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Donation Email</th>
                                <th rowspan="1" colspan="1">Donation Amount</th>
                                <th rowspan="1" colspan="1">Currency</th>
                                <th rowspan="1" colspan="1">Transaction ID</th>
                                <th rowspan="1" colspan="1">Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-5">
                   
                </div>
                <div class="col-sm-12 col-md-7">
                    {{ $donations->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>

@endsection