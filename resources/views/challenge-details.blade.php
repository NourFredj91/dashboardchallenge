@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Challenge Details</h1>

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
        <form id="idChallenge">
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

            <div class="form-group">
                <label>Comments:</label>
                <br />

                @if($comments != null)
                @foreach($comments as $comment)

                <label for="name">Writter's name: {{ $comment->name }}</label>
                <input type="text" class="col-md-4" name="comment"
                    value={{  $comment->descriptionComment}} /><br /><br />
                @endforeach
                @endif
            </div>
            <a href="{{ URL::previous() }}">Go Back</a>

        </form>
        <br />

        @if($comments->count() >0)
        <form id="idupload" action="{{ route('file.upload.post', $challenge->id) }}" method="post"
            style="margin-top: -43%; margin-left: 51%;" class="col-md-6" enctype="multipart/form-data">
            @csrf

            <label for="comment">Comment</label>

            <textarea name="comment" class="form-control" placeholder="you can write your comment here..."
                type="text"></textarea>
            <br />
            <button type="submit" class="btn btn-info">Add Comment</button>

            <br />
            <br />
            <br />
            @if($challenge->status !='done')
            <div class="row">
                <div class="col-md-6">
                    <input id="idFile" type="file" name="file">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
                <br />
                <?php echo 'Please upload your code file if you want to participate in this challenge (only zip file will be uploaded)' ?>
            </div>
            @endif
        </form>
        @else
        <form id="idupload" action="{{ route('file.upload.post', $challenge->id) }}" method="post" class="col-md-6"
            enctype="multipart/form-data">
            @csrf

            <label for="comment">Comment</label>

            <textarea name="comment" class="form-control" placeholder="you can write your comment here..."
                type="text"></textarea>
            <br />
            <button type="submit" class="btn btn-info">Add Comment</button>

            <br />
            <br />
            <br />
            @if($challenge->status !='done')
            <div class="row">
                <div class="col-md-6">
                    <input id="idFile" type="file" name="file">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
                <br />
                <?php echo 'Please upload your code file if you want to participate in this challenge (only zip file will be uploaded)' ?>
            </div>
            @endif
        </form>
        @endif
    </div>
</div>
@endsection
