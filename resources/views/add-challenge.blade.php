@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard Challenge</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                <div>
                  
                <form method="post" >
          @csrf
          <div class="form-group">    
              <label for="title">Title:</label>
              <input type="text" class="form-control" name="title"/>
          </div>

          <div class="form-group">
              <label for="status">Status:</label>
              <input type="text" class="form-control" name="status"/>
          </div>

          <div class="form-group">
              <label for="deadline">Deadline:</label>
              <input type="text" class="form-control" name="deadline"/>
          </div>
          <div class="form-group">
              <label for="description">Description:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          
                               
          <button type="submit" class="btn btn-primary-outline">Add</button>
          <button class="btn btn-primary-outline">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection