@extends('master_main')
@section('mainContent')
    <!-- <h4 class="font-weight-bold py-3 mb-4">
          <span class="text-muted font-weight-light"></span> Dashboard
        </h4> -->

    @php
    $common_array = [
        'content_heading' => 'Dashboard',
    ];
    @endphp
    <link rel="stylesheet" href="{{ asset('tui-editor/css/tui-editor.css') }}" />
    <link rel="stylesheet" href="{{ asset('tui-editor/css/tui-editor-contents.css') }}" />
    <style type="text/css">
        .noticeboard_wrapper {
            margin: 0 auto;

        }

        /*  .noticeboard_wrapper h1,
            h2,
            h3,
            h4,
            h5,
            h6,
            p {
                color: #FFFFFF !important;
                padding: 0px 35px;
                line-height: 20px;
            }*/

    </style>
    <div class=" mt-4">
        <div class="row">

            @if (Session::get('role') == '0')
                <div class="col-md-4">
                    <div id="accordion2 mb-2 text-center">
                        <div class="card mb-5 no_border">

                            <a href="{{ route('messenger') }}" id="all_projects" class="collapse show"
                                data-parent="#accordion2" style="color:#4E5155">
                                    
                                            <ul class=" list-group list-group-flush">
                                <li class="list-group-item"
                                    style="font-weight: bold; text-align: center; font-size: 26px; padding: 15px; background-color: #fff3cd; ;">
                                    <span class=""><i class="fa fa-user" aria-hidden="true"></i></span> No
                                    Of Users </li>
                                <li class="list-group-item py-3 projectlists"
                                    style="font-weight: bold; text-align: center; font-size: 26px; ">
                                    <span>{{ $users }}</span>
                                </li>
                                </ul>



                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div id="accordion2 mb-2 text-center">
                        <div class="card mb-5 no_border">
                            <a href="{{ route('messenger') }}" id="all_projects" class="collapse show"
                                data-parent="#accordion2" style="color:#4E5155">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"
                                        style="font-weight: bold; text-align: center; font-size: 26px; padding: 15px; background-color: #fff3cd;">
                                        <span><i class="fa fa-users" aria-hidden="true"></i> </span> No of Groups</li>
                                    <li class="list-group-item py-3 projectlists"
                                        style="font-weight: bold; text-align: center; font-size: 26px; ">
                                        <span>{{ $groups }}</span>
                                    </li>

                                </ul>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            {{-- <div class="col-md-4">
                <div id="accordion2 mb-2 text-center">
                    <div class="card mb-5 no_border">
                        <div id="all_projects" class="collapse show" data-parent="#accordion2" style="">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"
                                    style="font-weight: bold; text-align: center; font-size: 26px; padding: 15px; background-color: #fff3cd;">Total
                                    Notifications</li>
                                <li class="list-group-item py-3 projectlists">

                                    <a href="#"
                                        style="display: block; font-weight: bold; text-align: center; font-size: 20px;">
                                        <div class="font-weight-semibold black_font_color text-center">
                                            {{ $unseenActivity->count() }}</div>
                                    </a>
                                </li>
                                <a href="{{ url('notification') }}"
                                    class="card-footer d-block text-center text-body small font-weight-semibold gray_button">VIEW
                                    ALL</a>
                            </ul>

                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>


    {{-- @if (Session::get('role') == '0')

            <div class="col-lg-12">
                <div class="row"><h3 style="color: #000000 !important;" class="mb-4">Latest Applications</h3></div>

                <table class="new-datatables-demo table table-striped table-bordered dtb_custom_tbl_common text-center">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Student Name</th>
                            <th>Course Name</th>
                            <th>University Name</th>
                            
                            <th>Date Added</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($latest_applications) && sizeof($latest_applications) != 0)
                            @foreach ($latest_applications as $latest_application)
                                <tr>
                                  
                                    <td class="text-center">{{ $latest_application->id }}</td>
                                    <td class="text-center">{{ $latest_application->field_5 }}</td>
                                    <td class="text-center">{{ $latest_application->course_title }}</td>
                                    <td class="text-center">{{ $latest_application->university }}</td>
                                    
                                    <td class="text-center">{{ $latest_application->admission_date }}</td>
                                    <td class="text-center"> <a class="action_icon_color btn btn-sm btn-primary"
                                            href="{{ route('int_student.show', $latest_application->id) }}"><span
                                              style="color: white"  class="glyphicon glyphicon-eye-open"></span></a>&nbsp;&nbsp;</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center text-danger">No Data Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>





            </div>
        @endif --}}



    <style type="text/css">
        .noticeboard {
            text-align: center;
            width: 100%;
            background: #718AA8 !important;
            color: #FFFFFF !important;
            border-radius: 4px;
            margin: 0 auto;
            /* display: table; */
            padding: 11px 0px 1px;


            border-radius: 5px;


        }

        .sidenav-horizontal-next,
        .sidenav-horizontal-prev {
            display: none;
        }

    </style>
    <script>
        $(document).ready(function() {
            $(".new-datatables-demo").dataTable({
                order: [
                    [0, "desc"]
                ]
            });
        });
    </script>
@endsection
