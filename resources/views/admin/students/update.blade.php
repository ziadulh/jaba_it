@extends('admin.home.index')

@section('content')

	@if($errors->any())
	   @foreach ($errors->all() as $error)
	      <div class="alert alert-danger">
	          {{ $error }}
	      </div>
	  @endforeach
	@endif

	<div class="col-md-8 offset-md-2">
            
        <div class="card card-primary">
            <div class="card-header">
            	<h3 class="card-title">Update Student Information</h3>
            </div>
              
            <form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            	@csrf
                <div class="card-body">

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="first_name">First Name</label>
                    	<input type="text" id="first_name" class="form-control" value="{{$student->first_name}}" placeholder="Enter first name" name="first_name">
                  	</div>

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="last_name">Last Name</label>
                    	<input type="text" id="last_name" class="form-control" value="{{$student->last_name}}" placeholder="Enter last name" name="last_name">
                  	</div>

					<div class="form-group clearfix">
						<label for="last_name">Gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<div class="icheck-primary d-inline">
							<input type="radio" id="radioPrimary1" value="male" name="gender" {{$student->gender == 'male'? 'checked' : ''}}>
							<label for="radioPrimary1">Male
							</label>
						</div>
						<div class="icheck-primary d-inline">
							<input type="radio" id="radioPrimary2" value="female" name="gender" {{$student->gender == 'female'? 'checked' : ''}}>
							<label for="radioPrimary2">Female
							</label>
						</div>
						<div class="icheck-primary d-inline">
							<input type="radio" id="radioPrimary3" value="other" name="gender" {{$student->gender == 'other'? 'checked' : ''}}>
							<label for="radioPrimary3">Other</label>
						</div>
                    </div>

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="date_of_birth">Date of Birth</label>
					  	<input type="date" class="form-control" value="{{$student->date_of_birth}}" id="date_of_birth" name="date_of_birth">
					</div>

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label>Present Address</label>
                        <textarea class="form-control" rows="3" name="present_address">
						<?php echo htmlspecialchars($student->present_address); ?>
						</textarea>
                    </div>

                  	<div class="form-group">
					  	<span style="color: red">*&nbsp</span><label for="sms_no">SMS No.</label>
                    	<input type="text" class="form-control" id="sms_no" value="{{ $student->sms_no}}" placeholder="Enter SMS No." name="sms_no">
                  	</div>

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="session">Session</label>
                    	<input type="text" class="form-control" id="session" value="{{ $student->info->session}}" placeholder="Enter Session" name="session">
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
							<option data-select2-id="30" value="vi" {{$student->info->class == 'vi' ? 'selected' : ''}}>VI</option>
							<option data-select2-id="31" value="vii" {{$student->info->class == 'vii' ? 'selected' : ''}}>VII</option>
							<option data-select2-id="32" value="viii" {{$student->info->class == 'viii' ? 'selected' : ''}}>VIII</option>
							<option data-select2-id="33" value="ix" {{$student->info->class == 'ix' ? 'selected' : ''}}>IX</option>
							<option data-select2-id="34" value="x" {{$student->info->class == 'x' ? 'selected' : ''}}>X</option>
						</select>
					</div>

					<div class="form-group">
						<label>Group</label>
						<select class="form-control" name="group">
							<option data-select2-id="30" value="null" {{$student->info->group == null ? 'selected' : ''}}>N\A</option>
							<option data-select2-id="31" value="science" {{$student->info->group == 'science' ? 'selected' : ''}}>Science</option>
							<option data-select2-id="32" value="business" {{$student->info->group == 'business' ? 'selected' : ''}}>Business</option>
							<option data-select2-id="33" value="studies" {{$student->info->group == 'studies' ? 'selected' : ''}}>Studies</option>
							<option data-select2-id="34" value="humanities" {{$student->info->group == 'humanities' ? 'selected' : ''}}>Humanities</option>
						</select>
					</div>

					<div class="form-group">
						<label>Section</label>
						<select class="form-control" name="section">
							<option data-select2-id="30" value="a" {{$student->info->section == 'a' ? 'selected' : ''}}>A</option>
							<option data-select2-id="31" value="b" {{$student->info->section == 'b' ? 'selected' : ''}}>B</option>
							<option data-select2-id="32" value="c" {{$student->info->section == 'c' ? 'selected' : ''}}>C</option>
						</select>
					</div>

                  	<div class="form-group">
					  	<span style="color: red">*&nbsp</span><label for="roll">Roll</label>
                    	<input type="number" class="form-control" id="roll" value="{{ $student->info->roll}}" placeholder="Enter roll" name="roll">
                  	</div>

					<div class="form-group">
                      <label for="publish">Publish</label>
                      <select class="form-control" name="publish">
                        <option value="1" {{$student->publish == 1 ? 'selected' : ''}}>Yes</option>
                        <option value="0" {{$student->publish == 0 ? 'selected' : ''}}>No</option>
                      </select>
                    </div>

                </div>

                {{method_field('PUT')}}

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
            
    </div>



@endsection