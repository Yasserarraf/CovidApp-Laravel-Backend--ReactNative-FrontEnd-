@extends('admin.dashboard')

@section('content')

<div class="container ml-4 "style="margin-top:50px">
  <div class="row justify-content-center">
    <h5 style="margin-right:5%">Liste Non Traiter</h5>
  </div>
<hr style="width:50%">
@if(!$fichesNT->isEmpty())

<div class="row justify-content-center  mx-2 mt-4">
    @foreach($fichesNT as $fiche)
    <div class="col-md-3">
        @php
          $user_id = $fiche->userp_id;
          $user = \App\Userp::find($user_id);
        @endphp

          <a href="{{route('fiches.show',$fiche->id)}}"style="color:black">
            <div class="card bg-secondary" style="width: 13rem;">
              <div class="card-body">
                <h5 class="card-text text-center" >Fiche N°{{$fiche->id}}</h5>
                <hr>
                <p class="card-text text-center">nom : {{$user->nom}}</p>

              </div>
            </div>
          </a>
        </div>

  @endforeach
  </div>
  
  <div class="row justify-content-center fixed-bottom " style="margin-left:14%">
    {{$fichesNT->links()}}
  </div>
@endif
@if($fichesNT->isEmpty())
<div class="row justify-content-center "style="margin-top:15%">
  <h2 class="">Aucune Fiche Non Traiter est  trouvé</h2>
</div>
@endif

</div>
@endsection
@section('footerSection')
<div class="row justify-content-center pb-4">

  {{$fichesNT->links()}}
</div>
@endsection
