@extends('admin.home.index')

@section('content')

	@if($errors->any())
	   @foreach ($errors->all() as $error)
	      <div class="alert alert-danger">
	      	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	          {{ $error }}
	      </div>
	  @endforeach
	@endif

	<div class="col-md-8 offset-md-2">
            
        <div class="card card-primary">
            <div class="card-header">
            	<h3 class="card-title">Enter Student Information</h3>
            </div>
              
            <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data">
            	@csrf
                <div class="card-body">

                	<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="first_name">First Name</label>
                    	<input type="text" id="first_name" class="form-control" value="{{ old('first_name')}}" placeholder="Enter first name" name="first_name">
                  	</div>

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="last_name">Last Name</label>
                    	<input type="text" id="last_name" class="form-control" value="{{ old('last_name')}}" placeholder="Enter last name" name="last_name">
                  	</div>

					<div class="form-group clearfix">
						<label for="last_name">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="icheck-primary d-inline">
							<input type="radio" id="radioPrimary1" value="male" name="gender" checked>
							<label for="radioPrimary1">Male
							</label>
						</div>
						<div class="icheck-primary d-inline">
							<input type="radio" id="radioPrimary2" value="female" name="gender">
							<label for="radioPrimary2">Female
							</label>
						</div>
						<div class="icheck-primary d-inline">
							<input type="radio" id="radioPrimary3" value="other" name="gender">
							<label for="radioPrimary3">Other</label>
						</div>
                    </div>

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="date_of_birth">Date of Birth</label>
					  	<input type="date" class="form-control" value="{{ old('date_of_birth')}}" id="date_of_birth" name="date_of_birth">
					</div>

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label>Present Address</label>
                        <textarea class="form-control" rows="3" placeholder="Enter your address" name="present_address"></textarea>
                    </div>

                  	<div class="form-group">
					  	<span style="color: red">*&nbsp</span><label for="sms_no">SMS No.</label>
                    	<input type="text" class="form-control" id="sms_no" value="{{ old('sms_no')}}" placeholder="Enter SMS No." name="sms_no">
                  	</div>

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="session">Session</label>
                    	<input type="text" class="form-control" id="session" value="{{ old('session')}}" placeholder="Enter Session" name="session">
						<!-- <div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text"><i class="far fa-clock"></i></span>
							</div>
							<input type="text" class="form-control float-right" id="reservationtime" name="session">
						</div> -->
					</div>
						

					<div class="form-group">
						<label>Class</label>
						<select class="form-control" name="class">
							<option data-select2-id="30" value="vi">VI</option>
							<option data-select2-id="31" value="vii">VII</option>
							<option data-select2-id="32" value="viii">VIII</option>
							<option data-select2-id="33" value="ix">IX</option>
							<option data-select2-id="34" value="x">X</option>
						</select>
					</div>

					<div class="form-group">
						<label>Group</label>
						<select class="form-control" name="group">
							<option data-select2-id="30" value="null">N\A</option>
							<option data-select2-id="31" value="science">Science</option>
							<option data-select2-id="32" value="business">Business</option>
							<option data-select2-id="33" value="studies">Studies</option>
							<option data-select2-id="34" value="humanities">Humanities</option>
						</select>
					</div>

					<div class="form-group">
						<label>Section</label>
						<select class="form-control" name="section">
							<option data-select2-id="30" value="a">A</option>
							<option data-select2-id="31" value="b">B</option>
							<option data-select2-id="32" value="c">C</option>
						</select>
					</div>

                  	<div class="form-group">
					  	<span style="color: red">*&nbsp</span><label for="roll">Roll</label>
                    	<input type="number" class="form-control" id="roll" value="{{ old('roll')}}" placeholder="Enter roll" name="roll">
                  	</div>

					<div class="form-group">
                      <label for="publish">Publish</label>
                      <select class="form-control" name="publish">
                        <option value="1">Yes</option>
                        <option value="0" selected>No</option>
                      </select>
                    </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
            
    </div>

@endsection

@section('jsscript')

<script>
	//Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
</script>
@endsection