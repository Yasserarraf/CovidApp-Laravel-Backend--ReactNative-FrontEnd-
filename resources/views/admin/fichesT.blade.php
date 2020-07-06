@extends('admin.dashboard')

@section('content')
<div class="container"style="margin-top:50px">
    <div class="row justify-content-center ">
      <h5 style="margin-right:5%">Liste Traiter</h5>
    </div>
    <hr class="w-50">
    @if(!$fichesT->isEmpty())
    <div class="row justify-content-center mx-2 mt-4">

        @foreach($fichesT as $fiche)
        <div class="col-md-3">
            @php
              $user_id = $fiche->userp_id;
              $user = \App\Userp::find($user_id);
            @endphp

              <a href="{{route('showFicheT',$fiche->id)}}"style="color:black">
                <div class="card @if($fiche->result=='positive') bg-danger @endif @if($fiche->result=='negative') bg-info @endif " style="width: 13rem;">
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

      <div class="row justify-content-center fixed-bottom mt-2" style="margin-left:14%">
        {{$fichesT->links()}}
      </div>
    @endif
    @if($fichesT->isEmpty())
    <div class="row justify-content-center "style="margin-top:15%">
      <h2 class="">Aucune Fiche Traiter est  trouvé</h2>
    </div>
    @endif
</div>
@endsection
@section('footerSection')

@endsection
