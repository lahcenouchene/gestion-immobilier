@section('title')
Inscription
@endsection
@extends('nav')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-6" id="sectioninscrip">
        @if (Session::has('status'))
        <div class="alert alert-success">
          {{Session::get('status')}}
        </div>
            
        @endif
      
        <form class="row g-3 form" method="POST" action="{{route('register')}}" onsubmit="return verif_formulaire1()">
          {{ csrf_field() }}
          <div class="col-12">
            <h1>Inscrivez vous</h1>
          </div>
          <div class="col-md-6 mt-4">
            <!-- <label for="nom" class="form-label">Nom:</label> -->
            <input type="text" class="form-control" name="nom" placeholder="Nom" value="{{old('nom')}}">
            @error('nom')
          <div class="text text-danger"> 
                {{$message}}
          </div>
   @enderror
          </div>
          
          <div class="col-md-6 mt-4">
            <!-- <label for="prenom" class="form-label">Prenom: </label> -->
            <input type="text" class="form-control" name="prenom" placeholder="Prenom" value="{{old('prenom')}}">
            @error('prenom')
            <div class="text text-danger"> 
                  {{$message}}
            </div>
     @enderror
          </div>
        
          <div class="col-md-6 mt-4">
            <!-- <label for="tel" class="form-label">:</label> -->
            <input type="number" class="form-control" name="tel" placeholder="mobile" value="{{old('tel')}}">
            @error('tel')
            <div class="text text-danger"> 
                  {{$message}}
            </div>
     @enderror
          </div>
          <div class="col-md-6 mt-4">
            <select class="form-select" aria-label="Default select example" name="wilaya"  >
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
         
          <div class="col-md-6 mt-4">
            <!-- <label for="inputEmail4" class="form-label">Email</label> -->
            <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
            @error('email')
            <div class="text text-danger"> 
                  {{$message}}
            </div>
     @enderror
          </div>
        
          <div class="col-md-6 mt-4">
            <!-- <label for="inputPassword4" class="form-label">Password</label> -->
            <input type="password" class="form-control" name="password" placeholder="mot de passe">
            @error('password')
            <div class="text text-danger"> 
                  {{$message}}
            </div>
     @enderror
            <input type="password" class="form-control" name="password_confirmation" placeholder="confirmer le mot de passe">
            @error('password_confirmation')
            <div class="text text-danger"> 
                  {{$message}}
            </div>
     @enderror
          </div>
    
     
          <div class="col-6 mt-4">
            <select class="form-select" name="type"  id="type">
              <option value="">Type</option>
              <option value="client" @if(old('type') == 'client') selected @endif>client</option>
              <option value="particulier" @if(old('type') == 'particulier') selected @endif>particulier</option>
              <option value="agence" @if(old('type') == 'agence') selected @endif>agence</option>
              <option value="promoteur" @if (old('type') == 'promoteur') selected @endif>promoteur</option>
            </select>
            @error('type')
          <div class="text text-danger"> 
                {{$message}}
          </div>
   @enderror
          </div>



          <span id="hide">
            <div class="col-md-12 mt-4">
              <input type="text" class="form-control" id="nomS" name="nomS" placeholder="Le nom de votre société">
              @error('nomS')
              <div class="text text-danger"> 
                    {{$message}}
              </div>
       @enderror
            </div>
            <div class="col-md-12 mt-4">
              <input type="number" class="form-control" id="numR" name="numR" placeholder="Numéro de registre">
              @error('numR')
              <div class="text text-danger"> 
                    {{$message}}
              </div>
       @enderror
            </div>
            <div class="col-md-12 mt-4">
              <input type="number" class="form-control" id="numG" name="numG" placeholder="Numéro d'agrément">
              @error('numG')
              <div class="text text-danger"> 
                    {{$message}}
              </div>
       @enderror
            </div>
          </span>




          <span id="hide2">
            <div class="col-md-12 mt-4">
              <input type="text" class="form-control" id="nomE"  name="nomE" placeholder="Le nom de votre entreprise">
              @error('nomE')
              <div class="text text-danger"> 
                    {{$message}}
              </div>
       @enderror
            </div>
            <div class="col-md-12 mt-4">
              <input type="number" class="form-control" id="numIN" name="numIN" placeholder="Numéro d'inscription au RCS de l'entreprise.">
              @error('numIN')
              <div class="text text-danger"> 
                    {{$message}}
              </div>
       @enderror
            </div>
            <div class="col-md-12 mt-4">
            
      
            <select class="form-select" aria-label="Default select example"name="status_juridique" id="numG">
              <option value="">Status Juridique</option>
              <option value="sa">SA</option>
              <option value="sarl">SARL</option>
              <option value="sas">SAS</option>
            </select>
            @error('status_juridique')
          <div class="text text-danger"> 
                {{$message}}
          </div>
   @enderror
          
            </div>
          </span>
         
          
         
         
          <div class="col--">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck" name="cd">
              <label class="form-check-label" for="gridCheck">
                J'accepte les <a  href="{{route('condition')}}" style="color: orangered;">termes et conditions</a> d'utilisations.
              </label>
              @error('cd')
              <div class="text text-danger"> 
                    {{$message}}
              </div>
       @enderror
            </div>
          </div>
        
            <div class="col-12 p-5">
            <div class="btnmove">
              <button type="reset"  id="btncompte" style="width: 180px">annuler</button>
              <button type="submit"  id="btncompte" style="width: 180px">créer un compte</button>
              
              
              <p style="color:grey; padding-bottom: 10px;">Vous avez déja un compte?</p>
              <a href="{{Route('login')}}"  id="btncnx">se connecter</a>
            </div>
          </div>
       
        </form>

       
      </div>
      <div class="col-md-6">
        <div class="imageanim">
          <img src="../images/vivid-man-working-on-a-laptop-at-his-desk.gif" alt="" class="image-responsive">
        </div>
      </div>
    </div>
  </div>
@endsection