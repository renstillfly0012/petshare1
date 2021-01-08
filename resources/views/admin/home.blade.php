@extends('layouts.admin')

<style>
    .card-body {
        background: rgb(14, 64, 30);
        background: linear-gradient(180deg, rgba(14, 64, 30, 1) 0%);
        color: #fdc370;
    }

    .card-footer{
        font-size:22px;
    }
    .card-body > p {
        font-size:18px;
    }
  
   

</style>
@section('Notification_Count')
@if($notifications->count() > 0)
({{$notifications->count()}}) 
@endif
@endsection
@section('refresh')
<meta http-equiv="refresh" content="10">
@endsection
@section('content')
<nav aria-label="breadcrumb" class="d-none d-lg-block">
    <ol class="breadcrumb bg-transparent justify-content-end p-0">
                                      <li class="breadcrumb-item text-capitalize"><a href="/home">Admin</a></li>
                                                    <li class="breadcrumb-item text-capitalize active" aria-current="page"><strong>Dashboard</strong></li>
                            </ol>
  </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">


                        <div class="card-body ">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            
                            @forelse ($notifications as $notification)
                          
                           
                            {{-- @if($notification->type == 'App\Notifications\newUserNotification')
                            <div class="alert alert-success" role="alert">
                               <span style="color: black; font-size:18px">
                                [{{$notification->created_at}}] 
                                <br>
                                User: {{$notification->data['name']}} 
                                (Email: {{ $notification->data['email'] }}) has just registered.
                            
                            
                            </span>
                                <a style="color: black; font-size:18px" href="#" class="float-right markbtn" data-id="{{ $notification->id }}">
                                Mark as read
                                </a> --}}
                            @if($notification->type == 'App\Notifications\newReportNotification')
                            <div class="alert alert-danger" role="alert">
                            <span style="color: black; font-size:18px">
                                Notification:
                                <br>
                                [{{$notification->created_at}}] 
                                <br>
                                Email: {{$reportName->email}}
                                <a style="color: black; font-size:18px" href="#" class="float-right markbtn" data-id="{{ $notification->id }}">
                                Mark as read
                                </a>
                                <br>
                                Mobile Number: {{ $reportName->mobile_number }}
                                <br>
                                (Address: {{ $notification->data['address'] }}) 
                            </span>
                            @endif
                           </div>
                                {{-- @if($loop->last)
                                <a style=" font-size:18px"href="#" id="mark-all">
                                    Mark all as read
                                </a>
                                @endif --}}
                             @empty
                            There are no new notifications
                            @endforelse
                          
                           {{-- <p> {{ __('You are logged in!') }} </p> --}}
                            <span class="flag-icon flag-icon-gr"></span>
                            <span class="flag-icon flag-icon-gr flag-icon-squared"></span>
                            <i class="ion-ios-paper-plane-outline"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"> <h3>Report</h3>
                                <p>January 2021</p>
                            </div>
                            <!-- /.card-header -->
                         
                                <div id="chart2" style="height: 300px;"></div>
                            
                            <!-- /.card-body  -->
                            <div class="card-footer text-right">
                                <p> Total: {{ $reportCount }}</p>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"> <h3>Pets</h3>
                                {{-- <p>November 2020</p> --}}
                            </div>
                            <!-- /.card-header -->
                         
                                <div id="chart4" style="height: 300px;"></div>
                            
                            <!-- /.card-body  -->
                            <div class="card-footer text-right">
                                <p> Total: {{ $petCount }}</p>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>

                   

                </div>
            </div>

            <div class="container">
                <div class="row">

                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"> 
                                <h3>Appointments</h3>
                                <p>January 2021</p>
                            </div>
                            <!-- /.card-header -->
                               
                            <div id="chart1" style="height: 300px;"></div>
                            
                            <!-- /.card-body  -->
                            <div class="card-footer text-right">
                                <p>Total: {{ $appointmentCount }}</p> 
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    
                    <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"> <h3>Users</h3>
                                <p>Year 2021</p>
                            </div>
    
                                <div id="chart" style="height: 300px;"></div>
                              
                            <div class="card-footer text-right">
                                <p>  Total: {{ $userCount }}</p>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>

                    {{-- <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"> <h3>Pets</h3></div>
                            <!-- /.card-header -->
                            <div class="card-body ">
                                <h1>{{ $chart4->options['chart_title'] }}</h1>
                                {!! $chart4->renderHtml() !!}
                            </div>
                            <!-- /.card-body  -->
                            <div class="card-footer text-right">
                                <p>Total: {{ $petCount }}</p>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div> --}}
                </div>
            </div>


        </div>
    @endsection

    @section('notification_script')
    <script type="text/javascript">
        $(document).ready(function() {
            function sendMarkRequest(id = null) {
            return $.ajax("/home/"+id, {
                method: 'GET',
                data: {
                    id
                }
            });
        }
            
            $('.markbtn').click(function() {
                let request = sendMarkRequest($(this).data('id'));
                request.done(() => {
                    $(this).parents('div.alert').remove();
                });
            });

            $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                $('div.alert').remove();
            });
        });

            
        });
    </script>

    @endsection



    @section('charts')
    <script>
    const chart = new Chartisan({
        el: '#chart',
        url: "@chart('sample_chart')",
        hooks: new ChartisanHooks()
            .legend()
            .datasets([{ type: 'bar', color:'#FDC370' },{ type: 'bar', color: '#D31B2E' },{ type: 'bar', color: '#1C4496' }])
            .colors()

            .tooltip()
      });

      const chart1 = new Chartisan({
        el: '#chart1',
        url: "@chart('appointment_chart')",
        hooks: new ChartisanHooks()
            .legend()
            .colors()
            .datasets([{ type: 'line', color:'#0E401E' },{ type: 'line', color: '#D31B2E' }])
            .tooltip()
      });

      const chart2 = new Chartisan({
        el: '#chart2',
        url: "@chart('report_chart')",
        hooks: new ChartisanHooks()
            .legend()
            .colors()

            .datasets([{ type: 'bar', color: '#D31B2E' }])
            .tooltip()
      });

   

    //   const chart3 = new Chartisan({
    //     el: '#donation_chart',
    //     url: "@chart('donation_chart')",
    //     hooks: new ChartisanHooks()
    //         .legend()
    //         .colors()
    //         .tooltip()
            
    //   });

      const chart4 = new Chartisan({
        el: '#chart4',
        url: "@chart('pet_chart')",
        hooks: new ChartisanHooks()
                    .legend()
                .colors()
                .tooltip()
                .axis(false)
                .datasets([
                { type: 'pie', radius: ['40%', '60%'] },
                { type: 'pie', radius: ['10%', '30%'] },
                ]),
      });

     
    </script>
    @endsection

    