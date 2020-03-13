<?php

namespace App\Http\Controllers;

use App\Challenge;
use App\ChallengeUserRelation;
use App\Comment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function fileUploadPost(Request $request, $id)
    {
        $id_user = Auth::user()->id;



        if (Auth::user()->authority == '1')
            $roleWritter = 'participant';
        else if (Auth::user()->authority == '2')
            $roleWritter = 'admin';
        else
            $roleWritter = 'organizer';

        if ($request->comment != null) {

            $comment = new Comment([
                'id_writter' =>   $id_user,
                'roleWritter' => $roleWritter,
                'descriptionComment' => $request->comment,
                'winnerName' => $request->get('winnerName'),
                'id_challenge' => $id
            ]);
            $comment->save();
        }


        if ($request->file != null) {

            $fileName = $id_user . '_' . $id . '.' . $request->file->extension();

            $request->file->move(public_path('uploads'), $fileName);

            $challengeUserRelation = new ChallengeUserRelation([
                'id_user' => $id_user,
                'id_challenge' => $id,
                'codeFileName' => $fileName
            ]);


            $challengeUserRelation->save();
        }

        $comments = DB::table('comments')
            ->select('comments.descriptionComment', 'users.name')
            ->join('users', 'users.id', '=', 'comments.id_writter')
            ->where('comments.id_challenge', $id)
            ->get();

        $challenge = Challenge::find($id);
        return view('challenge-details', compact('challenge', 'comments'));
    }



    public function exportWinnerCode($id)
    {

        $challenge = Challenge::find($id);
        $winner = User::where('name', $challenge->winnerName)->first();

        echo $challenge->winnerName;
        $file = public_path().'/uploads/'.$winner->id. '_' . $id . '.' .'zip';

        $headers = [
            'Content-Type' => 'application/zip',
        ];

        return response()->download($file, 'filename.zip', $headers);
    }
}
