@section('title')
Annonces
@endsection
@section('css_annonces')
<link rel="stylesheet" href="css/page_annonce.css">
@endsection
@extends('nav')
@section('content')
@if (Session::has('status'))
  <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-success" style="width
    :50%; text-align: center;left:25%;">
    {{Session::get('status')}}
  </div>
      
  @endif

  @unless(count($annonces) == 0)

  @foreach($annonces as $annonce)
  @if($annonce->disponible == 1)

    <div id="cartean">
        <div class="col-12">
            <div class="row anc">
                    <div class="col-sm-4">
                        <div class="divimg">
                            <a href="#">
                            <img src="../image_index/{{$annonce->image_index}}" alt="" class="image-responsive" >
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="infod" >
                            <h5>{{$annonce->titre}} <b style="float: right; color: orangered;"> prix:{{$annonce->prix }} DZD <img src="../images/etiquette-de-prix (1).png" alt=""></b></h5>
                            <ul style="color: brown; padding: 5px 10px; font-size: medium;font-weight: bold;margin:10px;">
                                <li>Type:{{$annonce->type}}</li>
                                <li>Surface:{{$annonce->surface}}</li>
                                <li>Wilaya:{{$annonce->wilaya}}</li>
                                <li>Type propriètaire:{{$annonce->user->type}}</li>
                                <li>à {{$annonce->transaction}}</li>
                               <li>Description:{{$annonce->description}}</li> 
                            </ul>
                            <a href="/annonces/{{$annonce->id}}">Voir plus</a>
                            @if(auth()->check() && auth()->user()->id != $annonce->user_id)
                            <form action="{{route('enregistrement.store2')}}" method="POST" style="border:none; background-color: rgb(240, 240, 240);">
                            @csrf
                            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                                 <button type="submit" class="btn-infodep3 " >Enregistrer</button>
                          </form>
                          @endif
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
   
  @endif




  @endforeach

  @else
  
  <div id="cartean">
    <div class="col-12">
        <div class="row anc">
  <p style="text-align: center;font-weight: bolder;color: royalblue;padding: 100px;">Désolé,Il y'a pas d'annonces publié pour l'instant.</p>
  </div>
</div>
</div>
  @endunless






  <div class="container-fluid p-6" >

    {{$annonces->links('pagination::bootstrap-5')}}

  
  
  
    </div>








@endsection