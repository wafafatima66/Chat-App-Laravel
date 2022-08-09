@extends('master')
@section('mainContent')
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="card overflow-hidden">
  <div class="row no-gutters row-bordered row-border-light">

    <div class="col-md-2 pt-0">
      @include('settings.generalSettings.general_settings_sidebar')
    </div>

    <div class="col-md-10">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="account-general">

          <div class="card-body media align-items-center pb-2">
            <div class="media-body">
              <button type="button" class="btn btn-outline-primary btn-sm md-btn-flat" data-toggle="modal" data-target="#issuetypemodal"><i class="fa fa-plus" style="font-size:12px"></i> Add IssueType</button>
            </div>
          </div>

          <hr class="border-light m-0">
          <div class="card-body">
            <table class="table table-bordered table-striped dtb_custom_tbl_common" id="issuetypelist">
              <thead>
                <tr>
                  <th style="width: 13.6px;"></th>
                  <th> List of Issue Types</th>
                  <th>Colors</th>
                  <th>Points</th>
                  <th style="width: 13.6px;">Action</th>
                </tr>
              </thead>

              <tbody id="tablecontents">
                @forelse ($dtbissuetype as $issuetype)

                <tr class="row1" data-id="{{ $issuetype->id }}" id="{{$issuetype->id}}">

                  <td class="sorted" data-value="">
                   <div style="display: flex;color: #00000063;"> <i class="fas fa-th-list d-block"></i></div>
                    
                  </td>
                  <td data-value="{{ $issuetype->color }}">{{ $issuetype->issue_type }}</td>
                  
                  <td data-value="{{ $issuetype->issue_type }}"><button class="btn btn-sm" style="color:white;background: {{ $issuetype->color }}">{{ $issuetype->issue_type }}</button></td>
                  <td data-value="{{ $issuetype->points }}">{{ $issuetype->points }}</td>
                  <td data-value="{{ $issuetype->id }}" style="display: flex;">
                    
                    <a href="#"  data-toggle="modal" data-target="#issuetypeeditmodal" class="mr-2 issueeditmodal" value="{{ $issuetype->id }}" data-issuetype="{{$issuetype->issue_type}}" data-issuecolor="{{$issuetype->color}}"  data-points="{{$issuetype->points}}" data-projectid='{{$id}}'><i class="far fa-edit d-block"></i></a>
              

                    <a href="#" data-toggle="modal" data-target="#issuecatdelconfirmmodal" class="issuecatdelconfirmmodal" value="{{ $issuetype->id }}"><i class="far fa-trash-alt d-block"></i></a>
                    
                  </td>
                </tr>
                @empty
                <p>No data</p>
                @endforelse
              </tbody>
            </table>
            <span style="display: flex;margin-left: -10px;">
                <i style="color: #00000063;margin-top: 3px;margin-right: 4px" class="fas fa-th-list d-block"></i> Drag  to rearrange order.
            </span>

          </div>

        </div>

      </div>
    </div>

<!-- Modal template -->
<div class="modal fade" id="issuetypemodal">
  <div class="modal-dialog modal-lg">
    <form method="POST" class="modal-content" id="issuetypeform">

      <div class="modal-header">
        <h5 class="modal-title">
          Add Issue Type
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
      </div>
      <div class="modal-body">

            <div class="errmsg alert alert-danger" style="display:none">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        <div class="form-row">
          <div class="form-group col-5 mb-0">
            <label class="form-label">Issue Type</label>
            <input required type="text" id="issue_type" name="issue_type" value="{{ old('issue_type') }}" class="form-control required" placeholder="">

          </div>

          <div class="form-group col-3 mb-0">
            <label class="form-label">Points</label>
            <input type="number" id="points" name="points" value="{{ old('points') }}" class="form-control" placeholder="">
          </div>


          <div class="form-group col mb-0">
          </div>
        </div>        

        <div class="form-row mt-4">
          <div class="form-group col">
            <label class="form-label">Select Background color for this issue type</label>
            <div class="demo-inline-spacing issuebgcolorholder">
            
              <label class="switcher switcher-square">
                  <input type="checkbox" name="color" value="#d73a4a" id="color" class="switcher-input required editcolor">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no red"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>  

                <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor"  name="color" value="#b6DD05">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no green"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>

                <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor"  name="color" value="#0075ca">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no blue"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>


                <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor" name="color" value="#e4e669">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no yellow"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>               


                 <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor" name="color" value="#4caf93">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no color5"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>

                 <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor" name="color" value="#f42858">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no color6"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>


                
                <label class="switcher switcher-square" style="padding-left: 0px">
                <input type="text" placeholder="put cursor to pick color" value="" class="editcolor jscolor {required:false,hash:true,refine:false,width:243, zIndex:99999, height:150,borderColor:'#FFF', backgroundColor:'#666'} " style="border: 1px solid #80808075;border-radius: 3px;padding: 4px 8px;font-size: 13px;" value="#f3f3f3">
                <input type="checkbox" id="inptcolorvalue"  name="color" style="display: none;">
                </label>

                </div>
          </div>
        </div>      

        <label class="form-label">Existing Items</label>
         <div class="form-row mt-1">

          <div class="form-group col" style="padding: 17px 8px 3px;background: #00000012;">
            <div class="demo-inline-spacing">
               @forelse ($dtbissuetype as $issuetype)
              <span class="btn btn-sm" style="color:white;background: {{ $issuetype->color }}">{{ $issuetype->issue_type }}</span>
              @empty
                <p>No users</p>
              @endforelse 
            </div>
          </div>
        </div>

        <!-- hidden field for getting project id -->
        <input type="hidden" name="project_id" value="{{$id}}" >

      </div>
      <div class="modal-footer">
        <button id="issuetypeclosebtn" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
</div>

<!-- MODAL FOR EDIT -->
<!-- Modal template -->
<div class="modal fade" id="issuetypeeditmodal">
  <div class="modal-dialog modal-lg">
    <form method="POST" class="modal-content" id="issuetypupdate">

      <div class="modal-header">
        <h5 class="modal-title">
          Edit Issue Type
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
      </div>
      <div class="modal-body">

            <div class="errmsg alert alert-danger" style="display:none">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        <div class="form-row">
          <div class="form-group col-5 mb-0">
            <label class="form-label">Issue Type</label>
            <input required type="text" id="edit_issue_type" name="issue_type" value="" class="form-control required" placeholder="">

          </div>

          <div class="form-group col-3 pl-4">
            <label class="form-label">Background Color</label>
            <span class="oldcolrolabel"><input type="button" class="btn editcolors" name="oldercolor"><br>
          </div>

          <div class="form-group col-3 mb-0">
            <label class="form-label">Points</label>
            <input required type="number" id="edit_points" name="points" value="{{ old('points') }}" class="form-control" placeholder="">
          </div>

        </div>        

        <div class="form-row mt-1">
          <div class="form-group col">
            <label class="form-label">Choose any color to change the background color of this issue type</label>
            <div class="demo-inline-spacing issuebgcolorholder">
            
              <label class="switcher switcher-square">
                  <input type="checkbox" name="color" value="#d73a4a" id="color" class="switcher-input required editcolor">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no red"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>  

                <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor"  name="color" value="#b6DD05">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no green"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>

                <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor"  name="color" value="#0075ca">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no blue"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>


                <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor" name="color" value="#e4e669">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no yellow"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>               


                 <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor" name="color" value="#4caf93">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no color5"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>

                 <label class="switcher switcher-square">
                  <input type="checkbox" class="switcher-input editcolor" name="color" value="#f42858">
                  <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no color6"></span>
                  </span>
                  <span class="switcher-label"></span>
                </label>


                <label class="switcher switcher-square" style="padding-left: 0px">
                  <input type="text" placeholder="put cursor to pick color" value="" class="editcolor jscolor {required:false,hash:true,refine:false,width:243, zIndex:99999, height:150,borderColor:'#FFF', backgroundColor:'#666'} " style="border: 1px solid #80808075;border-radius: 3px;padding: 2px 5px;font-size: 13px;" value="#f3f3f3">
                  <input type="checkbox" id="inptcolorvalue"  name="color" style="display: none;">
                </label>

                </div>
          </div>
        </div>      


        <label class="form-label">Existing Items</label>
         <div class="form-row mt-1">

          <div class="form-group col" style="padding: 17px 8px 3px;background: #00000012;">
            <div class="demo-inline-spacing">
               @forelse ($dtbissuetype as $issuetype)
              <span class="btn btn-sm" style="color:white;background: {{ $issuetype->color }}">{{ $issuetype->issue_type }}</span>
              @empty
                <p>No users</p>
              @endforelse 
            </div>
          </div>
        </div>

       <!--  hidden field to get project id and older color -->
        <input type="hidden" name="project_id" value="{{$id}}" >
        <input type="hidden" class="newlycolor" name="newlycolor" value="" >

      </div>
      <div class="modal-footer">
        <button id="issuetypeclosebtn" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary updateissuesavebtn">Save</button>
      </div>
    </form>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="issuecatdelconfirmmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #f8d7da;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title">Are you sure to delete?</h6>
        </div>
<!--         <div class="modal-body">
          <p>Some text in the modal.</p>
        </div> -->
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
          <button  value="{{ $issuetype->id ?? '' }} type="button" class="btn btn-danger issuedelbtn" data-dismiss="modal">YES</button>
          
        </div>
      </div>
      
    </div>
  </div>
  


  </div>
</div>
  </div>
  <div class="col-lg-2"></div>
</div>



<style>
  .btn-outline-primary {
    border: 1px solid #38587d;
    border-radius: 0px;
    color: #38587d;
}  

.btn-outline-primary:hover {
  background: #718AA8;
  color: white;
}
</style>

<script src="{{asset('js/jscolor.js')}}"></script>
<script type="text/javascript">
$( document ).ready(function() {

$('body').on('click','.issueeditmodal',function(e){

  e.preventDefault();

var issueid = $(this).attr('value');
var projectid = $(this).attr('data-projectid');
var issue_type = $(this).attr('data-issuetype');
var oldcolor = $(this).attr('data-issuecolor');
var issuetype_points = $(this).attr('data-points');

$("#edit_issue_type").val(issue_type);
$(".editcolors").val(issue_type);
$('.editcolors').css('background',oldcolor)
$("#edit_points").val(issuetype_points);

$('body').on('click','.updateissuesavebtn',function(e){

  e.preventDefault();

  var issuevalue = $("#edit_issue_type").val();
  $('input[name="color"]:checked').each(function() {
    var colors = (this.value); 
    $(".newlycolor").val(colors);
  });

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

  var lastcolor = $(".newlycolor").val();
  var point_of_type = $("#edit_points").val();


    $.ajax({
        url: 'issuetype/'+issueid,
        type: 'POST',
        data: {
            issueid:issueid,
            projectid: projectid,
            issue_type: issuevalue,
            color: lastcolor,
            oldcolor: oldcolor,
            issue_type_point: point_of_type,
        },
        success: function(response){
          // alert(response);
          $('#issuetypeeditmodal').modal('hide');
          $("#msgcontainer").show();
          if (response) {

            $.iaoAlert({msg: "Data has been updated",
            type: "success",
            mode: "dark",})

          }
          setTimeout(function(){// wait for 5 secs(2)
           location.reload(); // then reload the page.(3)
          }, 1500);
        }
    });
});

});

// issue delete
$('body').on('click','.issuecatdelconfirmmodal',function(e){
var id = $(this).attr('value');
e.preventDefault();

  //when confirm modal clicked
  $('body').on('click','.issuedelbtn',function(e){
    e.preventDefault();
    issuedelete();
  });

function issuedelete() {

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

        $.ajax({
            url: 'issuetype',
            type: 'DELETE',
            data: {
            "id": id
        },
            success: function(response){

            $.iaoAlert({msg: "Data has been deleted",
            type: "success",
            mode: "dark",});

              setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
              }, 1000);
            }
        });

  }
});

// PROJECT LIST DRAG DROP SORTING
$( "#tablecontents" ).sortable({
  items: "tr",
  cursor: 'move',
  opacity: 0.6,
  update: function() {
    sendOrderToServer();
  }
});
function sendOrderToServer() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var order = [];
    $('tr.row1').each(function(index,element) {
      order.push({
        id: $(this).attr('data-id'),
        position: index+1
      });
       // alert(JSON.stringify(order, null, 4));exit();
    });
    $.ajax({
        url: 'issuetype',
        type: 'PUT',
        data: {
            order:order,
           _token: '{{csrf_token()}}'
        },
        success: function(response){
          $("#msgcontainer").show();
          if (response) {
          $.iaoAlert({msg: "Ordering Successfull",
            type: "success",
            mode: "dark",})
          }
        },
        error: function() {
          alert('Error occurs!');
       }
    });
  }


//#############  CHECKING HIDDEN COLOR CHECKBOX WHEN PICKING COLOR FROM COLOR PALETTE #####################
    $(".jscolor").on("change", function(){
        var inputboxcolor = $(this).val();

        if (inputboxcolor != "") {
          $('#color-error').text('');
          $('#inptcolorvalue').attr('checked', true);
          $('#inptcolorvalue').val(inputboxcolor);
        }else{
          $('#inptcolorvalue').attr('checked', false);
          $('#inptcolorvalue').val("");
        }

    });
//################################


  });
</script>

@endsection