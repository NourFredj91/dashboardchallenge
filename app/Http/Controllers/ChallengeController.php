<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Challenge;


class ChallengeController extends Controller
{
   public function index($id){
     $challenge = Challenge::find($id);
     return view('challenge-details', compact('challenge'));
   }

   public function create(){

   }

   public function get(){
      $chanllenges = Challenge::all()->toArray();
      return view('challenges', compact('chanllenges'));
   }

   public function add(){
      return view('add-challenge');
   }
   public function delete($id){
      $challenge = Challenge::find($id);
      return view('delete-challenge',compact('challenge'));
   }

   public function edit($id){

      $users = DB::table("users")->where('authority', '1')->get();
      $challenge = Challenge::find($id);
      return view('edit-challenge', compact('challenge', 'users'));
   }


   public function storeChallenge(Request $request){

    $request->validate([
        'title'=>'required',
        'deadline'=>'required',
        'status'=>'required'
    ]);

    $challenge = new Challenge([
        'title' => $request->get('title'),
        'status' => $request->get('status'),
        'description' => $request->get('description'),
        'winnerName' => $request->get('winnerName'),
        'startDate' => $request->get('startDate'),
        'deadline' => $request->get('deadline')
    ]);
    $challenge->save();
    return redirect('/challenges')->with('success', 'Challenge saved!');
   }


   public function update(Request $request, $id)
   {


    $request->validate([
        'title'=>'required',
        'deadline'=>'required',
        'status'=>'required'
    ]);


       $challenge = Challenge::find($id);
       $challenge->title =  $request->get('title');
       $challenge->status = $request->get('status');
       $challenge->description = $request->get('description');
       $challenge->winnerName = $request->get('winnerName');
       $challenge->startDate = $request->get('startDate');
       $challenge->deadline = $request->get('deadline');
       $challenge->save();

       return redirect('/challenges')->with('success', 'Challenge updated!');
   }

   public function return($id){

    return redirect('/home');
   }


   public function deleteChallenge($id){

    $challenge = Challenge::find($id);
    $challenge->delete();

    return redirect('/challenges')->with('success', 'Challenge deleted!');
   }
}
