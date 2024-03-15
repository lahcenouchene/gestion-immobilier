@section('title')
Acceuil
@endsection
@extends('nav')



@section('content')
{{-- <div id="carouselExampleAutoplaying" class="carousel slide c1" data-bs-ride="carousel">
  @if (Session::has('status'))
  <div class="alert alert-success">
    {{Session::get('status')}}
  </div>
      
  @endif
  @if(count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
              
          @endforeach
        </ul>
      </div>
  @endif
    <div class="carousel-inner">
      <div class="carousel-item active">
     <img src="images/vente-immobilier-luxe-scaled.jpg" class="d-block w-100" alt="..."> 
        <div class="carousel-caption d-none d-md-block" style="margin-bottom: 15em ;">

          <div
            style="padding:10px 10px; background-color:#f1f1f1; margin-top: 1em; margin-bottom:1em ; margin-left: 20px; margin-right: 20px; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 10px; width: 100%;  color: #000;">
            <div style="padding: 5px;" id="tab-location">
              <div class="noo-text-block">
                <form id="id_form" name="id_form" action="" method="post">
                  <div class="row" style="padding-top: 10px;">

                    <div class="col-lg-2 col-sm-6 col-xs-6">
                      <div class="form-group ">
                        <label for="type_trans" style="margin-left:25px;"><b>Transaction</b> </label>
                        <select class="form-control" id="type_trans" name="type_trans" style="width: 120px; margin-left:25px;">
                          <option value="location">Location</option>
                          <option value="achat">Achat</option>

                        </select>
                      </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 col-xs-6">
                      <div class="form-group">
                        <label for="typebien" style="margin-left:25px;"><b>Bien</b></label>
                        <select class="form-control" id="typebien" name="typebien" style="width: 120px; margin-left:25px;">
                          <option value="1">Appartement</option>
                          <option value="2">Villa</option>
                          <option value="3">Terrain</option>
                          <option value="4">Local Commercial</option>

                        </select>
                      </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 col-xs-6">
                      <div class="form-group glocation">
                        <div class="label-select">
                          <label for="liste_wilaya" style="margin-left:25px;"><b>Wilaya</b> </label>
                          <select class="form-control" id="liste_wilaya" name="liste_wilaya" style="width: 120px; margin-left:25px;">
                            <option>Wilaya</option>
                            <option value="1">01 - Adrar</option>
                            <option value="2">02 - Chlef</option>
                            <option value="3">03 - Laghouat</option>
                            <option value="4">04 - Oum-El-Bouaghi</option>
                            <option value="5">05 - Batna</option>
                            <option value="6">06 - Béjaïa</option>
                            <option value="7">07 - Biskra</option>
                            <option value="8">08 - Béchar</option>
                            <option value="9">09 - Blida</option>
                            <option value="10">10 - Bouira</option>
                            <option value="11">11 - Tamanrasset</option>
                            <option value="12">12 - Tébessa</option>
                            <option value="13">13 - Tlemcen</option>
                            <option value="14">14 - Tiaret</option>
                            <option value="15">15 - Tizi-Ouzou</option>
                            <option value="16">16 - Alger</option>
                            <option value="17">17 - Djelfa</option>
                            <option value="18">18 - Jijel</option>
                            <option value="19">19 - Sétif</option>
                            <option value="20">20 - Saida</option>
                            <option value="21">21 - Skikda</option>
                            <option value="22">22 - Sidi-Bel-Abbès</option>
                            <option value="23">23 - Annaba</option>
                            <option value="24">24 - Guelma</option>
                            <option value="25">25 - Constantine</option>
                            <option value="26">26 - Médéa</option>
                            <option value="27">27 - Mostaganem</option>
                            <option value="28">28 - MSila</option>
                            <option value="29">29 - Mascara</option>
                            <option value="30">30 - Ouargla</option>
                            <option value="31">31 - Oran</option>
                            <option value="32">32 - El-Bayadh</option>
                            <option value="33">33 - Illizi</option>
                            <option value="34">34 - Bordj-Bou-Arreridj</option>
                            <option value="35">35 - Boumerdès</option>
                            <option value="36">36 - El-Tarf</option>
                            <option value="37">37 - Tindouf</option>
                            <option value="38">38 - Tissemsilt</option>
                            <option value="39">39 - El-Oued</option>
                            <option value="40">40 - Khenchela</option>
                            <option value="41">41 - Souk-Ahras</option>
                            <option value="42">42 - Tipaza</option>
                            <option value="43">43 - Mila</option>
                            <option value="44">44 - Aïn-Defla</option>
                            <option value="45">45 - Naâma</option>
                            <option value="46">46 - Aïn-Témouchent</option>
                            <option value="47">47 - Ghardaia</option>
                            <option value="48">48 - Relizane</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-2 col-xs-6">
                      <div class="form-group">
                        <label for="prix" style="margin-left:25px;"><b>Prix</b>
                        </label>
                        
                        <input type="number" name="prix"
                          style=" border-color: #dee2e6 ; border-radius: 5px; border-width: 1px; padding: 5px;  width: 160px;margin-left:25px;">
                      </div>

                    </div>
                    <div class="col-lg-1 col-xs-6"></div>

                    <div class="col-lg-2 hidden-xs">
                      <div class="form-group"><label>&nbsp; </label><a title="lancer la recherche" class="btn-infod" href="#"><i class="ri-search-line"></i>&nbsp;Recherche</a>
                      </div>
                    </div>



                  </div>
                </form>
              </div>

            </div>
          </div>
        </div>

       
      </div>
      

    </div>
 
  </div> --}}


  @if (Session::has('status'))
  <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-success" style="width
  :50%; text-align: center;left:25%;">
    {{Session::get('status')}}
  </div>
      
  @endif
  @if(count($errors)>0)
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
              
          @endforeach
        </ul>
      </div>
  @endif
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-3">
      <form class="formch" style="background-color: transparent; border: none;">
        <div class="row">
          <div class=" form-group1" >
            <label for="transaction">Transaction</label>
            <select id="transaction" name="transaction" style="background-color: transparent">
              <option value="">-- Sélectionnez --</option>
              <option value="achat">Achat</option>
              <option value="location">Location</option>
            </select>
          </div>
          <div class=" form-group1">
            <label for="type">Type de bien</label>
            <select id="type" name="type" style="background-color: transparent">
              <option value="">-- Sélectionnez --</option>
              <option value="appartement">Appartement</option>
              <option value="maison">Maison</option>
              <option value="terrain">Terrain</option>
              <option value="commerce">Commerce</option>
            </select>
          </div>
          <div class=" form-group1">
            <label for="bedrooms">Nombre de chambres</label>
            <input type="number" id="bedrooms" name="bedrooms" min="1" max="10" style="background-color: transparent">
          </div>
          <div class=" form-group1">
            <label for="price_min">Prix minimum (DZD)</label>
            <input type="number" id="price_min" name="price_min" min="0" max="10000000"style="background-color: transparent" >
          </div>
          <div class=" form-group1">
            <label for="price_max">Prix maximum (DZD)</label>
            <input type="number" id="price_max" name="price_max" min="0" max="10000000"style="background-color: transparent" >
          </div>
          <div class=" form-group1">
            <label for="superficie_min">Superficie minimum (m²)</label>
            <input type="number" id="superficie_min" name="superficie_min" min="0" max="100000" style="background-color: transparent" >
          </div>
          <div class=" form-group1">
            <label for="superficie_max">Superficie maximum (m²)</label>
            <input type="number" id="superficie_max" name="superficie_max" min="0" max="100000" style="background-color: transparent">
          </div>
          <div class=" form-group1">
            <label for="wilaya">Wilaya</label>
            <select id="wilaya" name="wilaya" style="background-color: transparent">
              <option value="">-- Sélectionnez --</option>
              <option value="adrar">Adrar</option>
              <option value="chlef">Chlef</option>
              <option value="laghouat">Laghouat</option>
              <!-- Ajoutez le reste des wilayas ici -->
            </select>
          </div>
        </div>
        <button type="submit" class="btnfiltre">Rechercher</button>
      </form>
    </div>
      
      <div class="col-md-9" >
        <img src="\images\media-marche-immobilier-luxe-hausse.webp" alt="..." class="img-fluid" >
      </div>
    </div>
  </div>
  
  
  
  <section class="container" id="sec1">
    <div class="row">

      @foreach($annonces as $annonce)
        <div class="col-md-4">
            <div class="carte">
                <div class="row">
                    <div class="col-12">
                        <div class="divimg">
                            <a href="#">
                                <img src="../image_index/{{$annonce->image_index}}" alt="" class="image-responsive" >
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="info">
                            <h5>{{$annonce->type}} à {{$annonce->transaction}} </h5>
                            <p>{{$annonce->description}}</p>
                        </div>
                    </div>
                </div> 
            </div>  
        </div>
      @endforeach
       
    </div>
    <div class="row">
        <div class="col-12">
            <div class="divbtn">
                <a href="{{route('annonces')}}" class="buttonn">
                    <div class="button__line"></div>
                    <div class="button__line"></div>
                    <span class="button__text"><b> Voir Plus</b></span>
                    <div class="button__drow1"></div>
                    <div class="button__drow2"></div>
                </a>
            </div>
        </div>
    </div>
</section>


<section class="container-fluid bx">
  <div class="row">
    <div class="col-md-7">
      <div class="box1">
        <h3>A Propos de Nous</h3>
        <p>Notre site immobilier propose une sélection de biens immobiliers de qualité, 
          adaptés aux besoins et aux préférences de nos clients. Notre équipe d'experts
           immobiliers est à votre disposition pour vous guider dans le processus d'achat ou de vente, 
           en offrant un service professionnel et de qualité supérieure. Nous nous engageons à maintenir 
           les normes les plus élevées en matière de service à la clientèle, de professionnalisme et d'intégrité. 
           Nous sommes fiers de notre engagement envers l'excellence et espérons vous aider à réaliser vos rêves
            immobiliers.</p>
      </div>
    </div>
    <div class="col-md-5">
      <div class="box2">
        <h3 style="text-align: center;">Réseaux Sociaux</h3>
        <a href="#"> <i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"> <i class="fab fa-instagram"></i></a>
        <a href="#"> <i class="fa-brands fa-linkedin"></i></a>
        <a href="#"> <i class="fa-brands fa-twitter"></i></a>

      </div>
    </div>
  </div>
</section>
@endsection

