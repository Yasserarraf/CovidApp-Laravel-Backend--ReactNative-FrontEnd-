<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Userp;
use App\Fiche;
use App\Question;

class UserpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();
      $data["password"] = Hash::make($request->password);


        $userp = Userp::create($data);
        $fiche = Fiche::create(['userp_id' => $userp->id]);
      for($i = 0; $i < 5 ; $i++ ){
          $question = Question::create(['fiche_id'=> $fiche->id,'question_nb'=>$i]);
        }
        return response()->json([
          "code"=>200,
          "message"=>"Userp added successfully,Fiche added successfully,Questions added successfully"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $userp = Userp::find($id);
      $userp->delete();
      return response()->json([
        "code" => 200,
        "message" => "Task deleted successfully"
      ]);
    }

    public function login(Request $request){
      $loginDetails = $request->only('email','password');
      $loginDetails["password"] = Hash::make($request->password);
      $userp = Userp::where('email', $request->email)->first();
      if($userp != null){
        if(Hash::check($request->password,$userp->password))
            return response()->json(['success'=>true,'id'=>$userp->id]);
        else{
          return response()->json(['success'=>false,'message'=>'wrong password']);
        }
      }else{
        return response()->json(['success'=>false,'message'=>'wrong email']);
      }

    }
}
