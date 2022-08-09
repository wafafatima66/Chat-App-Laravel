@extends('master_main')
@section('mainContent')
<div class="container pt-5">
	<div class="row">

		<div class="col-lg-3">
			@include('settings.developerSettings.developer_settings_sidebar')
		</div>

		<div class="col-lg-9  settgs_right_content">
			<div class="card mb-4 no_border">
				@if(session()->has('message-success'))
				<div class="alert success_message mb-10 background-success" role="alert">
					{{ session()->get('message-success') }}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
				
				<div class="card-body">
					 <h6 class="card_body_header"> Assign Permission ({{$roleFor->role_name}})</h6>
					 
					<div class="card no_border">
						<div class="table-responsive">
							<form action="{{url('module-permission')}}" method="POST" enctype="multipart/form-data">
								@csrf
							<input type="hidden" value="{{$roleFor->id}}" name="id">
							<table class="datatable_template table table-striped table-bordered dtb_custom_tbl_common">
								<thead>
									<tr>
										<th>Module Name</th>
										<th width="100px">Select</th>
									</tr>
								</thead>
								<tbody >
									@if(!empty($modules))
										@foreach($modules as $module)
											<tr class="odd" role="row">
												<td class="text-center">{{$module->module_name}}</td>
											
												<td class="text-center text-nowrap" style="color: #4E5155;">
													{{-- <input type="hidden" name="id[]" value="{{$module->id}}"> --}}
													<input type="checkbox" id="permissions{{$module->id}}" class="common-checkbox  select"  name="permissions[]" value="{{$module->id}}" {{$module->permission == 1? 'checked':''}}>
													<label for="permissions{{$module->id}}"></label>
												</div>
												</td>
											</tr>
										@endforeach
									
									@else
									<tr>
										<td colspan="7" class="text-center text-danger">No Data Found</td>
									</tr>
									@endif
								</tbody>
							</table>
							<div class="text-right">
								<button class="btn btn-primary" type="submit" >Save</button>

							</div>
						</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    // $(document).ready(function(){
    //     $(".datatable_template").dataTable({
    //         order: [
    //                 [0, "desc"]
    //             ]
    //     });
    // });
</script>
@endsection