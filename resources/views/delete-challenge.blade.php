@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Delete Challenge</h1>

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
        <form method="post" action="{{ route('challenge.delete', $challenge->id) }}">
            @csrf
            <div class="form-group">

                <label for="title">First Name:</label>
                <input type="text" class="form-control" name="title" value={{ $challenge->title }} />
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" name="status">

                    <option> {{ $challenge->status }}</option>
               </select>

            </div>

            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input type="text" class="form-control" name="startDate" value={{ $challenge->startDate }} />
            </div>
            <div class="form-group">
                <label for="deadline">Deadline:</label>
                <input type="text" class="form-control" name="deadline" value={{ $challenge->deadline }} />
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" class="form-control" name="description" value={{ $challenge->description }} />
            </div>
            <div class="form-group">
                <label for="winnerName">Winner's Name:</label>
                <input type="text" class="form-control" name="winnerName" value={{  $challenge->winnerName}} />

            </div>
            <button type="submit" class="btn btn-primary">Delete</button>
        </form>
    </div>
</div>
@endsection
