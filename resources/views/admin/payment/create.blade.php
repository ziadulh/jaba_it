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

	<div class="col-md-6 offset-md-3">
            
        <div class="card card-primary">
            <div class="card-header">
            	<h3 class="card-title">Enter Payment Information</h3>
            </div>
              
            <form action="{{ route('admin.fees_management.store') }}" method="POST" enctype="multipart/form-data">
            	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Class</label>
                    <select class="form-control" name="class" onchange="getSection()">
                      <option data-select2-id="30" value=null> ---select class---</option>
                      <option data-select2-id="30" value="vi">VI</option>
                      <option data-select2-id="31" value="vii">VII</option>
                      <option data-select2-id="32" value="viii">VIII</option>
                      <option data-select2-id="33" value="ix">IX</option>
                      <option data-select2-id="34" value="x">X</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Section</label>
                    <select class="form-control" name="section" onchange="getStudent('{{csrf_token()}}','{{route('admin.payment.get_student')}}')">
                      <option data-select2-id="30" value=null> ---select class---</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Student</label>
                    <select class="form-control" name="student">
                      <option data-select2-id="30" value=null> ---select class---</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Fee Category</label>
                    <select class="form-control" name="type">
                      <option data-select2-id="30" value="admission">Admission</option>
                      <option data-select2-id="31" value="tution">Tution</option>
                      <option data-select2-id="32" value="sports">Sports</option>
                    </select>
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
<script src="{{ asset('assets/js/js.js') }}"></script>

@endsection