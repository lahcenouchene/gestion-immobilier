<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="images/logo14.png" />
  <!-- liens bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- lien fontawsome -->
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- lien boxicons utilisé pour les icons -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- lien pour la navbar -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
      <!-- liens vers les pages css de chacun -->
  <link rel="stylesheet" href=" {{ asset('css/carousel.css') }}">
  <link rel="stylesheet" href="{{ asset('css/carte.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@yield('css')
@yield('css_annonces')
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="sweetalert2.min.css">
  <link rel="stylesheet" href="{{ asset('css/ajouter.css') }}"> 
  <link rel="stylesheet" href="{{ asset('css/inscrip.css') }}">
  <link rel="stylesheet" href="{{ asset('css/terme.css') }}">
 
  <title>@yield('title')</title>
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://kit.fontawesome.com/388fa52cbb.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/sidenav.css">
</head>

<body>
  <nav class="navbar" role="navigation" aria-label="main navigation" >
    <div class="navbar-brand" >
        <a class="navbar-item" href="{{Route('index')}}">
        <b style="color: #10b1d0;">Shelter<span style="color: orangered;">-In</span></b>
       {{-- <img src="../images/logo14.png" alt="logo"  style="height: 50px;width:50px;"> --}}
        </a>    

  
      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="navbarBasicExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="{{Route('index')}}">
          Accueil
        </a>
        <a class="navbar-item" href="{{Route('annonces')}}">
          Annonces
        </a>
    
      {{--   <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Location
          </a>
  
          <div class="navbar-dropdown">
            <a class="navbar-item">
              apartement
            </a>
            <a class="navbar-item">
              maisons
            </a>
            <a class="navbar-item">
              terrain
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item">
              biens
            </a>
          </div>
        </div>
        <div class="navbar-item has-dropdown is-hoverable">
          <a class="navbar-link">
            Vente
          </a>
  
          <div class="navbar-dropdown">
            <a class="navbar-item">
              apartement
            </a>
            <a class="navbar-item">
              maisons
            </a>
            <a class="navbar-item">
              terrain
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item">
              biens
            </a>
          </div>
        </div> --}}
       
      </div>
      @auth
      @if (auth()->check() && auth()->user()->type != 'client')
    
      <a class="btn-infodep3"  href="{{Route('ajouter_annonce')}}">
        Déposer Annonce
      </a>
      @else
     

     @endif
      @else
      <a class="btn-infodep3"  href="{{Route('ajouter_annonce')}}">
        Déposer Annonce
      </a>
@endauth

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons">
            @auth
           
         

 <a href="{{ route('dashboard') }}" class="navbar-item " style="color: #10b1d0 ;border:solid;border-radius:20px;height:35px;">Mon Compte</a>
            {{-- @if (auth()->user()->type!='client')
            <a href="{{Route('login')}}" class="navbar-item"><i class="fa-solid fa-gear"></i>  Gérer Annonces</a>
            @endif --}}
    

            <form method="POST" action="/deconnecter" style="border: none">
              @csrf
              <button type="submit" class="btn-infodepdec">
                <i class="fa-solid fa-door-closed"></i> Déconnexion
              </button>
            </form>

       

            @else
            <a class="btn-infodep" href="{{Route('login')}}" >
              <strong>connexion</strong>
            </a>
            <a class="btn-infodep1" href="{{Route('register')}}">
              créer un compte
            </a>
            @endauth
          </div>
        </div>
      </div>
    </div>
  </nav>
  @auth
  <div class="navbar" style="padding: 10px 20px">
    <div class="navbar-menu">
    {{--   class="fas fa-solid fa-comment-dots" --}}
    <span class="navbar-item" style="border:solid #064a89 ; border-radius: 30px;">
      Espace  <p style="color: #064a89;padding: 5px;font-weight: bolder;"> {{auth()->user()->type}} </p>
    </span>
       
        <a href="{{route('profile.edit')}}" class="navbar-item"><i class="fas fa-solid fa-user" style="color: #1276D2;"></i>Profile</a>
        @if (auth()->check() && auth()->user()->type != 'client')
        <a href="/dashboard#gerer_annonce" class="navbar-item"><i class="fa-solid fa-gear"style="color: #1276D2;" ></i> Gérer Annonces</a>
        <a href="/dashboard#gerer_offre" class="navbar-item"><i  class="fa-solid fa-gear" style="color: #1276D2;"></i>Gérer offres</a>
        <a href="/dashboard#gerer_contrats" class="navbar-item"><i  class="fa-solid fa-gear" style="color: #1276D2;"></i>Gérer contrats</a>
      @endif
        <a href="/dashboard#enregistrement" class="navbar-item"><i class="fas fa-solid fa-bookmark" style="color: #1276D2;"></i>Enregistrement</a>

        @if (auth()->check() && auth()->user()->type == 'admin')
        <a href="/dashboard#users" class="navbar-item"><i class="fas fa-solid fa-user" style="color: #1276D2;"></i> Gérer Utilisateurs</a>
    
      @endif
   
  </div>
  <div class="navbar-end">
    <span class="navbar-item">
      Welcome <p style="color: #1276D2;padding: 5px;font-weight: bolder;"> {{auth()->user()->nom}} {{auth()->user()->prenom}}</p>
    </span>
    </div>
</div>


@else

@endauth
  <div>@yield('content')</div>
  

  @include('footer')