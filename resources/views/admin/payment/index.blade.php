

@extends('admin.home.index')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')

	@if(session()->has('err_msg'))
      <div class="alert alert-warning">
      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session()->get('err_msg') }}
      </div>
    @endif

	@if(session()->has('message'))
      <div class="alert alert-success">
      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          {{ session()->get('message') }}
      </div>
    @endif


	<div class="card">
        <div class="card-header">
            <h3 class="card-title">Students</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            	<div class="row">
            		
            	</div>
            	<div class="row">
            		<div class="col-sm-12">
            			<table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  			<thead>
				                  <tr role="row">
				                  	  <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name
				                  	  </th>
				                  	  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">ON/OFF
				                  	  </th>
				                  	  <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action
				                  	  </th>
				                  </tr>
                  			</thead>

                  			<tbody>

                  				@forelse($fees as $fee)

                  					<tr role="row" class="{{(($fee->key)/2 == 0) ? 'even' : 'odd'}}">
				                      <td class="dtr-control sorting_1" tabindex="0">{{$fee->name}}</td>
									  <td><input type="checkbox" id="checkboxPrimary-{{$fee->id}}" onchange="publish_fee('{{$fee->id}}', '{{ csrf_token() }}', '{{route('admin.fee.publish')}}')" {{$fee->publish == 1 ? 'checked' : ''}}></td>
				                      <td>
				                      	<form action="{{ route('admin.fees_management.destroy', $fee->id) }}" method="post" >
		                                    @csrf
		                                    {{method_field('delete')}}
		                                    <!-- <button class="btn btn-primary alert-danger fas fa-trash-alt" onclick="return confirm('Are you sure?')" type="submit">
		                                    </button> -->
		                                    <a class="btn btn-primary alert-success fas fa-edit" href="{{route('admin.fees_management.edit',$fee->id)}}"><spam></spam></a>
		                                </form>
				                      </td>
				                    </tr>

								@empty
								<p>No fee info available</p>
                  				@endforelse
                  
              				</tbody>
                  
                		</table>
                	</div>
                </div>

                <div class="row">
                	<div class="col-sm-12 col-md-5"></div>
                	<div class="col-sm-12 col-md-7">
                		<div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                			
                		</div>
                	</div>
                </div>
            </div>
        </div>

    <!-- /.card-body -->
    </div>


@endsection


@section('jsscript')

	<!-- DataTables  & Plugins -->
	<script src="{{  asset('assets/plugins/datatables/jquery.dataTables.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/jszip/jszip.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/pdfmake/pdfmake.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/pdfmake/vfs_fonts.js')  }}"></script>
	<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')  }}"></script>
	<script src="{{  asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')  }}"></script>
	<!-- custom js -->
	<script src="{{  asset('assets/js/js.js')  }}"></script>

	<script>
	  $(function () {
	    $("#example1").DataTable({
	      "responsive": true, "lengthChange": false, "autoWidth": false,
	      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
	    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false,
	      "responsive": true,
	    });
	  });
	</script>
	

@endsection