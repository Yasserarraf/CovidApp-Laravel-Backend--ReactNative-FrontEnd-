<?php

namespace App\Http\Controllers;

use App\Fiche;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Question;
class FicheController extends Controller
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
    public function fichesNT(){
      $fichesNT = Fiche::whereNull('result')->paginate(12);

      return view("admin.fichesNT",compact('fichesNT'));
    }
    public function fichesT(){
      $fichesT = Fiche::whereNotNull('result')->paginate(12);

      return view("admin.fichesT",compact('fichesT'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
      
      return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $fiche = Fiche::find($id);
      $user = $fiche->userp;
      $questions = DB::table('questions')->where('fiche_id',$id)->get();


        return view('admin.showFicheNT',compact('id','user','questions'));
    }
    public function showFicheT($id)
    {
      $fiche = Fiche::find($id);
      $user = $fiche->userp;
      $questions = DB::table('questions')->where('fiche_id',$id)->get();


        return view('admin.showFicheT',compact('fiche','user','questions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

      switch($request->input('action')){
        case 'positive':
          DB::update('update fiches set result = ? where id = ?',['positive',$id]);

          break;
        case 'negative':
          DB::update('update fiches set result = ? where id = ?',['negative',$id]);
          break;
      }
        return redirect('fichesNT');
    }
    public function addQuestionnaire(Request $request){
      $questions = DB::update('update questions set question = ? where id = ?',['positive',$id]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fiche $fiche)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fiche  $fiche
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fiche $fiche)
    {
        //
    }
}
