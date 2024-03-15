@section('title')

Modifier Annonce


@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('css/form_ajout_annonce.css') }}">
@endsection

  @extends('nav')
 



@section('content')




<div class="col-md_12">

<form action="/annonces/{{$annonce->id}}" method="POST" class="formaj"  enctype="multipart/form-data">
  {{ csrf_field() }}
  @method('PUT')
  <div class="form-group2"><h2>Modifier Annonce Immobilière: </h2> <h1 style="text-align: center;color: orange;">{{$annonce->titre}} </h1></div>

  <div class="form-group2">
    <label for="titre" class="label1">Titre de l'annonce :</label>
    <input type="text" id="titre" name="titre"  class="aj" value="{{$annonce->titre}}">
    @error('titre')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>

  <div class="form-group2">
    <label for="type" class="label1">Type de bien :</label>
    <select id="type" name="type"  class="aj">
      <option value="">Sélectionnez un type de bien</option>
      <option value="appartement" @if($annonce->type == 'appartement') selected @endif>Appartement</option>
      <option value="maison" @if($annonce->type == 'maison') selected @endif>Maison</option>
      <option value="terrain" @if($annonce->type == 'terrain') selected @endif>Terrain</option>
      <option value="local" @if($annonce->type == 'local') selected @endif>Local commercial</option>
    </select>
    @error('type')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>

  <div class="form-group2">
    <label for="surface" class="label1">Surface <span>(m²)</span>:</label>
    <input type="number" id="surface" name="surface"  class="aj" value="{{$annonce->surface}}"> 
    @error('surface')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>

  <div class="form-group2">
    <label for="prix" class="label1">Prix <span >(DZD)</span>:</label>
    <input type="number" id="prix" name="prix"  class="aj" value="{{$annonce->prix}}"> 
    @error('prix')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>
  <div class="form-group2">
    <select class="aj" aria-label="Default select example" name="wilaya"  >
      <option value="">wilaya </option>
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
    @error('wilaya')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>
  <div class="form-group2">
    <label for="description" class="label1">Description :</label>
    <textarea id="description" name="description" rows="6"  class="aj" placeholder="Décrit votre annonce ici" value="{{$annonce->description}}"></textarea>
    @error('description')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>
  <div class="form-group2">
    <label for="image" class="label1">Image index :</label>
    <input type="file" id="image"  name="image_index" class="aj">
    @error('image_index')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>
  <div class="form-group2">
    <label for="image" class="label1">Images :</label>
    <input type="file" id="image" multiple name="images[]" class="aj">
    @error('images')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>


<div class="form-group2">
  <label for="adresse" class="label1">Adresse :</label>
  <input type="text"  name="adresse"  class="aj" value="{{$annonce->adresse}}">
  @error('adresse')
  <div class="text text-danger"> 
        {{$message}}
  </div>
@enderror
</div>
<div class="form-group2">
  <label for="transaction" class="label1">Transaction :</label>
  <select id="type" name="transaction"  class="aj">
    <option value="">Sélectionnez une transaction</option>
    <option value="vendre" @if($annonce->transaction == 'vendre') selected @endif>Vendre</option>
    <option value="louer" @if($annonce->transaction == 'louer') selected @endif>Louer</option>
    
  </select>
  @error('transaction')
  <div class="text text-danger"> 
        {{$message}}
  </div>
@enderror
</div>
  <div class="form-group2">
    <label for="nom"class="label1">Nom de Propriètaire :</label>
    <input type="text" id="nom" name="nom"  class="aj" value="{{$annonce->nom}}">
    @error('nom')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>

  <div class="form-group2">
    <label for="email" class="label1">E-mail :</label>
    <input type="email" id="email" name="email"  class="aj" value="{{$annonce->email}}">
    @error('email')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror
  </div>

  <div class="form-group2">
    <label for="telephone" class="label1">Téléphone :</label>
    <input type="tel" id="telephone" name="telephone"  class="aj" value="{{$annonce->telephone}}">
    @error('telephone')
    <div class="text text-danger"> 
          {{$message}}
    </div>
@enderror               

</div>

<div  class="form-group2 container-fluid" style="text-align: center "><button class="inputajbtn" type="submit" style="background-color: rgb(2, 109, 197); width:fit-content">Modifier</button>
<a   class="inputajbtn" href="/dashboard#gerer_annonce">Annuler</a></div>



</form>
</div>


 

  @endsection
 
      


    



