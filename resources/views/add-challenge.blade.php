@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Challenge</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div>

                <form method="post"  action="{{ route('challenge.store') }}">
          @csrf
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" name="title"/>
          </div>

          <div class="form-group">
              <label for="status">Status</label>
              <select class="form-control" name="status">

                     <option>Select Status</option>
                     <option value="new">New</option>
                     <option value="ongoing">Ongoing</option>
                     <option value="done">Done</option>
                </select>

          </div>
          <div class="form-group">
            <label for="startDate">Start Date</label>
            <input type="date" id="start" name="startDate"
              min="2018-01-01" max="2040-12-31">
        </div>
          <div class="form-group">
              <label for="deadline">Deadline</label>
              <input type="date" id="start" name="deadline"
                min="2018-01-01" max="2040-12-31">
          </div>
          <div class="form-group">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description"/>
          </div>

          <div class="form-group">
            <label for="description">Winner Name</label>
            <input type="text" class="form-control" name="winnerName"/>
        </div>

          <button type="submit" class="btn btn-success-outline">Add</button>
          <button class="btn btn-primary-outline">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap DatePicker -->
<link rel="stylesheet" href="./bootstrapdatepicker/css/bootstrap-datepicker.css">

 <script src="./bootstrapdatepicker/js/main.js"></script>
 <script src="./bootstrapdatepicker/js/bootstrap-datepicker.js"></script>

 <script>
   $(function() {
     $('.datepicker').datepicker();
   });
 </script>

@endsection
