@extends('master_main')
@section('mainContent')

    <style>
        .ui-tooltip-content {
            display: none;
        }

    </style>
    @php
    $common_array = [
        'content_heading' => 'Chat App',
    ];
    @endphp

    <div class="main-container">



        <div class="container">

            <!-- Page header start -->
            {{-- <div class="page-title">
                <div class="row gutters">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <h5 class="title">Chat App</h5>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
                </div>
            </div> --}}
            <!-- Page header end -->

            <!-- Content wrapper start -->
            <div class="content-wrapper mt-4">

                <!-- Row start -->
                <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                        <div class="card m-0">

                            <!-- Row start -->
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">


                                        <div class="users-container">
                                            <div class="chat-search-box">
                                                <ul class="nav nav-pills messenger-listView-tabs">
                                                    <li class="active"><a href="#users" class="active-tab"
                                                            data-view="users" data-toggle="pill">
                                                            <svg class="svg-inline--fa fa-user fa-w-14" aria-hidden="true"
                                                                focusable="false" data-prefix="far" data-icon="user"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 448 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z">
                                                                </path>
                                                            </svg><!-- <span class="far fa-user"></span> --> People</a>
                                                    </li>
                                                    <li><a href="#group" data-view="groups" data-toggle="pill">
                                                            <svg class="svg-inline--fa fa-users fa-w-20" aria-hidden="true"
                                                                focusable="false" data-prefix="fas" data-icon="users"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 512" data-fa-i2svg="">
                                                                <path fill="currentColor"
                                                                    d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z">
                                                                </path>
                                                            </svg><!-- <span class="fas fa-users"></span> --> Groups</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-content mt-3">
                                                <div id="users" class="tab-pane show fade in active">
                                                    <ul class="users">
                                                        @if (!empty($allUsers))
                                                            @foreach ($allUsers as $allUser)
                                                                <li class="person " data-chat="person1">
                                                                    <div class="user ">
                                                                        <img src="{{ empty($allUser->icon_image_path) ? asset('assets_/img/user_avatar.png') : asset($allUser->icon_image_path) }}"
                                                                            alt="">

                                                                        {{-- <span class="status busy"></span> --}}
                                                                    </div>
                                                                    <p class="name-time">
                                                                        <span
                                                                            class="name">{{ $allUser->name }}</span>
                                                                        <input type="hidden" value="{{ $allUser->id }}"
                                                                            id="receiver_user_id">
                                                                    </p>
                                                                </li>
                                                            @endforeach
                                                        @else
                                                            <li class="text-center text-danger">No Users Found
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>

                                                <div id="group" class="tab-pane fade">

                                                    <div class="groups">
                                                        <!-- Button trigger modal -->
                                                      
                                                      @if(Session::get('role') == 0)
                                                      <div class="text-center mx-auto">
                                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                            Add Group
                                                        </button>
                                                    </div>
                                                      @endif

                                                        <ul class="users mt-3">
                                                            @if (!empty($allGroups))
                                                                @foreach ($allGroups as $allGroup)
                                                                    <li class="person group" data-chat="person1">
                                                                        <p class="name-time">
                                                                            <span
                                                                                class="name">{{ $allGroup->name }}</span>
                                                                            <input type="hidden"
                                                                                value="{{ $allGroup->id }}" id="group_id">
                                                                        </p>
                                                                    </li>
                                                                @endforeach
                                                            @else
                                                                <li class="text-center text-danger">No Groups Found
                                                                </li>
                                                            @endif
                                                        </ul>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Add Group</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <div class="text-danger mb-3">Required *</div>
                                                                        {{-- Saving group --}}

                                                                        {{ Form::open(['class' => '', 'files' => true, 'url' => '/create_group', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}

                                                                        <div class="form-group">
                                                                            <label>Group Name*</label>
                                                                            <input type="text" class="form-control"
                                                                                name="group_name" required>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Select Users*</label>
                                                                            <select required
                                                                                class=" selectpicker form-control  custom-select"
                                                                                multiple data-live-search="true"
                                                                                data-style="btn-white border"
                                                                                title="Select Users" name="users[]">
                                                                                @if (isset($allUsers))
                                                                                    @foreach ($allUsers as $allUser)
                                                                                        <option
                                                                                            value="{{ $allUser->id }}">
                                                                                            {{ $allUser->name }}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-success">{{ __('Save') }}</button>
                                                                    </div>

                                                                    {{ Form::close() }}

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9">
                                        <div class="selected-user">
                                            <span>To: <span class="name"></span></span>
                                        </div>
                                        <div class="chat-container">
                                            <ul class="chat-box chatContainerScroll" id="results">

                                            </ul>

                                            <div class="ajax-loading"><img
                                                    src="{{ asset('assets_/img/Preloader-1.gif') }}" /></div>

                                            <div class="d-flex flex-row mt-3 mb-0">

                                                <textarea id="message" class="form-control " rows="1" placeholder="Type your message here..."></textarea>

                                                <input type="hidden" name="sender_user_id"
                                                    value="{{ Session::get('user_id') }}">

                                                {{-- {{ Form::open(['class' => '', 'files' => true, 'url' => '', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }} --}}

                                                {{-- <label> --}}
                                                    <button class="btn btn-primary border border-white" id="send_file"><i
                                                        class="fa fa-paperclip" aria-hidden="true"></i></button>

                                                        <input type="file" id="file" style="display:none" name="file" />
                                              {{-- </label> --}}

                                                {{-- {{ Form::close() }} --}}

                                                <button type="submit" class="btn btn-primary border border-white"
                                                    id="send_message"><i class="fa fa-paper-plane"
                                                        aria-hidden="true"></i></button>
                                            </div>



                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        </div>

                    </div>

                </div>
                <!-- Row end -->

            </div>
            <!-- Content wrapper end -->

        </div>

    </div>

    <script type="text/javascript">
        var receiver_user_id = ''
        var sender_user_id = ''
        var group_id = ''
        var site_url = "{{ route('show_messages') }}"

        load_more(receiver_user_id, sender_user_id, group_id);

        function load_more(receiver_user_id, sender_user_id, group_id) {

            $(".chat-box").stop().animate({
                scrollTop: $(".chat-box")[0].scrollHeight
            }, 1000);

            if (receiver_user_id == '' && group_id == '') {
                $('.ajax-loading').hide();
                $("#results").empty().append(
                    '<div class ="mx-auto"> <div class="text-center text-danger" role="alert">Select A Friend or Group to see messages!</div></div>'
                );
            } else {
                $.ajax({
                    url: site_url + "?receiver_user_id=" + receiver_user_id + "&sender_user_id=" + sender_user_id +
                        "&group_id=" + group_id,
                    type: "get",
                    datatype: "html",
                    success: function(data) {
                        $('.ajax-loading').hide();
                        $("#results").empty().append(data);
                    }

                })
            }

        }

        // var receiver_user_id = '';

        $(document).on('click', '.messenger-listView-tabs li a', function() {
            $(".messenger-listView-tabs li a").removeClass("active-tab");
            $(this).addClass("active-tab");
        });

        $(document).on('click', '.users .person', function() {

            if ($(this).hasClass('group')) { //checking if its a group
                // getting group id 
                group_id = $('#group_id', this).attr('value');
                receiver_user_id = '';

                // alert(group_id)
            } else {
                // getting receiver user id 
                receiver_user_id = $('#receiver_user_id', this).attr('value');
                group_id = '';
            }

            $(".users .person").removeClass("active-user");
            $(this).addClass("active-user");
            var name = $(this).children("p").children("span").text();
            $('.selected-user').children("span").children("span").text(name);

            // getting sender user id 
            sender_user_id = $("input[name=sender_user_id]").val();
            load_more(receiver_user_id, sender_user_id, group_id);
        });

        $("#send_message").click(function(event) {
            event.preventDefault();
            // getting sender user id 
            sender_user_id = $("input[name=sender_user_id]").val();
            let message = $("#message").val();

            $.ajax({
                url: "{{ route('send_message') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    message: message,
                    sender_user_id: sender_user_id,
                    receiver_user_id: receiver_user_id,
                    group_id: group_id
                },
                success: function(data) {
                    $("#message").val('');
                    $(".chat-box").stop().animate({
                        scrollTop: $(".chat-box")[0].scrollHeight
                    }, 1000);
                    load_more(receiver_user_id, sender_user_id, group_id);
                },
            });
        });

        $('#send_file').click(function(event) {
           
            $('#file').trigger('click');
            // event.preventDefault();
            $(document).on('change', '#file', function(e) {

                if (e.handled !== true) 
        {
            e.handled = true;
                // $("#file").change(function(){

                // console.log('hi');
                sender_user_id = $("input[name=sender_user_id]").val();
                var name = document.getElementById("file").files[0].name;
                var form_data = new FormData();
                // var ext = name.split('.').pop().toLowerCase();
                // if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                //     alert("Invalid Image File");
                // }
                // var oFReader = new FileReader();
                // oFReader.readAsDataURL(document.getElementById("emp_image").files[0]);
                // var f = document.getElementById("emp_image").files[0];
                // var fsize = f.size || f.fileSize;
                // if (fsize > 2000000) {
                //     alert("Image File Size is very big");
                // } else {
                    form_data.append("file", document.getElementById('file').files[0]);
                    form_data.append("sender_user_id", sender_user_id);
                    form_data.append("receiver_user_id", receiver_user_id);
                    form_data.append("group_id", group_id);
                    $.ajax({
                        url: "{{ route('send_file') }}",
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,

                        success: function(response) {
                            if (response != 0) {
                                // $("#img").attr("src",response); 
                                // $(".preview img").show(); 
                                $(".chat-box").stop().animate({
                                    scrollTop: $(".chat-box")[0].scrollHeight
                                }, 1000);
                                load_more(receiver_user_id, sender_user_id, group_id);
                            } else {
                                alert('file not uploaded');
                            }
                        },
                    });
                    return;
        }
                });
            });

        // });
    </script>

@endsection
