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
            	<h3 class="card-title">Update Fee Information</h3>
            </div>
              
            <form action="{{ route('admin.fees_management.update', $fee->id) }}" method="POST" enctype="multipart/form-data">
            	@csrf
                <div class="card-body">

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="name">Name</label>
                    	<input type="text" id="name" class="form-control" value="{{ $fee->name}}" placeholder="Enter Payment Name" name="name" require>
                  	</div>

					<div class="form-group">
						<span style="color: red">*&nbsp</span><label for="amount">Amount</label>
                    	<input type="number" step="0.01" id="amount" class="form-control" value="{{ $fee->amount}}" placeholder="Enter Payment amount" name="amount" required>
                  	</div>

					<div class="form-group">
						<label>Payment Type</label>
						<select class="form-control" name="type">
							<option data-select2-id="30" value="admission" {{$fee->type == 'admission' ? 'selected' : ''}}>Admission</option>
							<option data-select2-id="31" value="tution" {{$fee->type == 'tution' ? 'selected' : ''}}>Tution</option>
							<option data-select2-id="32" value="sports" {{$fee->type == 'sports' ? 'selected' : ''}}>Sports</option>
						</select>
					</div>

					<div class="form-group">
                      <label for="publish">Publish</label>
                      <select class="form-control" name="publish">
                        <option value="1" {{$fee->publish == 1 ? 'selected' : ''}}>Yes</option>
                        <option value="0" {{$fee->publish == 0 ? 'selected' : ''}}>No</option>
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