@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Edit Challenge</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form method="post" action="{{ route('challenges.update', $challenge->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">

                <label for="title">First Name:</label>
                <input type="text" class="form-control" name="title" value={{ $challenge->title }} />
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">

                    <option> {{ $challenge->status }}</option>
                    <option value="new">New</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="done">Done</option>
               </select>

            </div>

            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="date" id="startDate" name="startDate" value={{ $challenge->startDate }}
                min="2018-01-01" max="2040-12-31">

            </div>
            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="date" id="deadline" name="deadline" value={{ $challenge->deadline }}
                min="2018-01-01" max="2040-12-31">

            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value={{ $challenge->description }} />
            </div>

            <div class="form-group">
                <label for="winnerName">Winner's Name:</label>
                <select class="form-control"  name="winnerName">
                        <option value="">{{ $challenge->winnerName }}</option>

                        @if($users->count() > 0)
                        @foreach($users as $user){
                        <option value="{{$user->name}}">{{$user->name}}</option>
                        }
                        @endforeach
                        @else
                        No participants found
                         @endif
                   </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
</div>
@endsection
