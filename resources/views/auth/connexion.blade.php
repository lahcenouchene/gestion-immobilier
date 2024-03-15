@section('title')
Connexion
@endsection
@extends('nav')
@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-6" id="sectioninscrip">
       
            
       
        @if (Session::has('status'))
        <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-success" style="width
          :50%; text-align: center;left:25%;">
          {{Session::get('status')}}
        </div>
    
@endif


        <form class="row g-3 form" method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}
          <div class="col-12">
            <h1>Connectez vous</h1>
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
          
          </div>
         
         
         
          
         
         
        
       
          <div class="col-md-12 text-center">
            <div class="d-inline-block m-5">
              <button type="submit" class="btn-infodep">Se connecter</button>
              <label class="mx-3">
                  <a class="btn-infodep1" href="{{ route('register') }}">Créer un compte</a>
              </label>
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