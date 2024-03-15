@section('title')
Annonce
@endsection
@section('css_annonces')
<!-- include the jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- include the slick library -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<link rel="stylesheet" href="../css/page_annonce.css">
@endsection
@extends('nav')
@section('content')

@if (Session::has('status'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-success" style="width
  :50%; text-align: center;left:25%;">
  {{Session::get('status')}}
</div>

@endif
<div id="cartean">
    <div class="col-12">
        <div class="anc" style="display: block">
          


            
        <div class="col-sm-12" style="display:flex; justify-content:center;">
          <div class="col-sm-5 divimg" style="padding: 10px; margin: 10px;">
              <a href="#">
                  <img src="../image_index/{{$annonce->image_index}}" alt="" class="img-fluid" style="max-height: 300px;">
              </a>
          </div>
          <div id="image-slider" class="col-sm-6 divimg" style="padding: 10px; margin: 10px; display: flex; flex-wrap: wrap;">
              @foreach ($images as $image)
                  <img src="../images_annonces/{{ $image->path }}" class="img-fluid" style="max-height: 300px; margin: 5px;">
              @endforeach
          </div>
      </div>
       
                  
                <div class="col-sm-12" style="margin: 40px;padding:40px;">
                    <div class="infod" >
                        <h5>{{$annonce->titre}} <b style="float: right; color: orangered;"> prix à {{$annonce->transaction}}: {{$annonce->prix }} DZD <img src="../images/etiquette-de-prix (1).png" alt=""></b></h5>
                        <ul style="color: brown; padding: 5px 10px; font-size: medium;font-weight: bold;margin:10px;">
                            <li>Type:{{$annonce->type}}</li>
                            <li>Surface:{{$annonce->surface}}</li>
                            <li>Wilaya:{{$annonce->wilaya}}</li>
                            <li>Adresse:{{$annonce->adresse}}</li>
                            <li>Type propriètaire:{{$annonce->user->type}}</li>

                           <li>Description:{{$annonce->description}}</li> 

                        </ul>
                      
                    </div>
      

@if($annonce->lastOffre == null)
    <p>Cette annonce n'a pas encore d'offre</p>
@else
    <h1>Le Plus Grand Offre est: {{ $annonce->lastOffre->prix_propose }}<span>DZD</span></h1>
@endif





                    @if(auth()->check() && auth()->user()->id != $annonce->user_id)
                
                    <form action="{{route('offres.store')}}" method="POST" style="border:none; background-color: rgb(240, 240, 240);">
                     @csrf
                     <label for="" style="margin: 5px">Votre Offre</label>
                     <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                      <input type="number" placeholder="Votre offre" name="prix_propose">
                      @error('prix_propose')
                      <div class="text text-danger"> 
                            {{$message}}
                      </div>
               @enderror
                      @if($annonce->transaction =='louer')
                      <label for=""  style="margin: 5px">Date début</label>
                      <input type="datetime-local" name="date_debut" placeholder="Date début">
                      @error('date_debut')
                      <div class="text text-danger"> 
                            {{$message}}
                      </div>
               @enderror
                      <label for=""  style="margin: 5px">Date fin</label>
                      <input type="datetime-local" name="date_fin"placeholder="Date fin">
                      @error('date_fin')
                      <div class="text text-danger"> 
                            {{$message}}
                      </div>
               @enderror
                      @endif
                      <button type="submit" class="btn-infodep3 "> valider</button>
                    </form>


                 @endif
                </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
  $(document).ready(function(){
    $('#image-slider').slick({
      autoplay: true, // set to true to enable auto play
      autoplaySpeed: 4000 // set the time between slides (in milliseconds)
    });
  });
</script>

@endsection