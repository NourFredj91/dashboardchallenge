<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Challenge;

class ChallengeController extends Controller
{
   public function index($id_challenge){
     //echo $id_challenge;
     $challenge = DB::table("challenges")->where('id_challenge', $id_challenge)->get();
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
   public function delete($id_challenge){
      $challenge = DB::table("challenges")->where('id_challenge', $id_challenge)->delete();
      return view('delete-challenge');
   }

   public function edit($id_challenge){
      return view('edit-challenge');
   }

}
