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
						          <span style="color: red">*&nbsp</span><label for="name">Fee Name</label>
                    	<input type="text" id="name" class="form-control" value="{{ old('name')}}" placeholder="Enter fee name" name="name" require>
                  </div>

                  <div class="form-group">
                      <span style="color: red">*&nbsp</span><label for="amount">Amount</label>
                      <input type="number" step="0.01" id="amount" class="form-control" value="{{ old('amount')}}" placeholder="Enter amount" name="amount" required>
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