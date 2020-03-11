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

                <button class="btn btn-success" style="margin-left: 91%; margin-bottom: 4%;" type="button"  onclick="location.href='{{url('/add-challenge')}}'" >Add</button>
                </div>
                <div>
                  <table class="table table-bordered">
                    <tr>
                      <th>Title</th>
                      <th>Status</th>
                      <th>Start Date</th>
                      <th>Deadline</th>
                      <th>Description</th>
                      <th>Winner's Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                    @foreach($chanllenges as $challenge)
                    <tr>
                        <td>{{$challenge['title']}}</td>
                        <td>{{$challenge['status']}}</td>
                        <td>{{$challenge['startDate']}}</td>
                        <td>{{$challenge['deadline']}}</td>
                        <td>{{$challenge['description']}}</td>
                        <td>{{$challenge['winnerName']}}</td>
                        <td> <button class="btn btn-warning" type="button"  onclick="location.href='{{url('/edit-challenge')}}/{{$challenge['id_challenge']}}'" >Edit</button>
                        </td>
                        <td> <button class="btn btn-danger" type="button"  onclick="location.href='{{url('/delete-challenge')}}/{{$challenge['id_challenge']}}'" >Delete</button>
                        </td>
                   </tr>
                    @endforeach
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection