@extends('admin.dashboard')

@section('content')
@php

@endphp
<div class="container ml-2 "style="margin-top:40px">
  <div class="row justify-content-between">
    <div class="col-4">
      <div class="card bg-light mb-3" style="max-width: 26rem;">
          <div class="card-header">Information</div>
        <div class="card-body">
          <div class="form-group row  align-items-center">
              <label class="col-sm-3 col-form-label">Nom  </label>
              <span class="col-sm-1">:</span>
              <div class="col-sm-8">
                {{$user->nom}}
              </div>
              <label class="col-sm-3 col-form-label">Prenom </label>
              <span class="col-sm-1">:</span>
              <div class="col-sm-8">
                {{$user->prenom}}
              </div>
          </div>
          <hr style="width:100%">
          <div class="form-group row align-items-center ">
            <label class="col-sm-3 col-form-label">Age</label>
            <span class="col-sm-1">:</span>
            <div class="col-sm-8">
              {{$user->age}}
            </div>
          </div>
          <hr style="width:100%">
          <div class="form-group row align-items-center ">
            <label class="col-sm-3 col-form-label">Adresse</label>
            <span class="col-sm-1">:</span>
            <div class="col-sm-8">
              {{$user->adresse}}
            </div>
          </div>
          <hr style="width:100%">
          <div class="form-group row align-items-center ">
            <label class="col-sm-3 col-form-label">Ville </label>
            <span class="col-sm-1">:</span>
            <div class="col-sm-8">
              {{$user->ville}}
            </div>
          </div>
          <hr style="width:100%">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">email </label>
            <span class="col-sm-1">:</span>
            <div class="col-sm-8">
              {{$user->email}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-8">
      <form class="" action="{{route('fiches.edit',$id)}}" method="get">
      <div class="card bg-light mb-3" style="max-width: 45rem;max-height:30rem;min-height:30rem">

        <div class="card-header">Formulaire</div>
        <div class="card-body" style="overflow:hidden;overflow-y:scroll;">


          @foreach($questions as $question)

            <div class="form-group row align-items-center">
              <label class="col-sm-8 col-form-label">{{$question->question}}</label>
              <span class="col-sm-1">:</span>
              <div class="col-sm-8">
                {{$question->reponse}}
              </div>
            </div>

          @endforeach

        </div>
        <hr>

          @csrf
          <div class="row justify-content-center my-2">
            <button type="submit" name="action" value="positive" class="btn btn-outline-danger mx-2">Positive</button>
              <button type="submit" name="action" value="negative" class="btn btn-outline-info mx-2">Negative</button>
          </div>
        </div>
        </form>
    </div>
  </div>
</div>
@endsection
