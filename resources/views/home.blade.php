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

                </div>


                @if($authority == '0')
                <?php echo 'Hello Guest :) . Your status didnt change yet. Please wait until Admin change it' ?>
                @else
                <div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Start Date</th>
                            <th>Deadline</th>
                            <th>Description</th>
                            <th>Winner's Name</th>
                            <th>Winner's Code</th>
                            <th>Challenge Details</th>

                        </tr>
                        @foreach($chanllenges as $challenge)
                        <tr>
                            <td>{{$challenge['title']}}</td>
                            <td>{{$challenge['status']}}</td>
                            <td>{{$challenge['startDate']}}</td>
                            <td>{{$challenge['deadline']}}</td>
                            <td>{{$challenge['description']}}</td>
                            <td>{{$challenge['winnerName']}}</td>
                            @if($challenge['winnerName'] != null)
                            <td>

                                <button class="btn btn-success" type="button"
                                    onclick="location.href='{{url('/download')}}/{{$challenge['id']}}'">Download</button>

                            </td>

                            @else
                            <td></td>
                            @endif
                            <td> <button class="btn btn-primary" type="button"
                                    onclick="location.href='{{url('/challenge-details')}}/{{$challenge['id']}}'">Details</button>
                            </td>

                        </tr>
                        @endforeach
                    </table>

                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
