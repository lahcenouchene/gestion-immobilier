@section('title')
Mon compte
@endsection
@extends('nav')
@section('content')





    <div class="wrapper">
      
        <div class="info">
            <div class="info">
                <p>Chez client, nous mettons tout en œuvre pour vous offrir une expérience exceptionnelle. En vous connectant à votre compte, vous avez désormais accès à une gamme de fonctionnalités et d'options personnalisées pour répondre à vos besoins.
                    <br>Voici quelques-unes des possibilités qui s'offrent à vous : <br>
                    <ul>
                        
                        <li>Consultation des annonces , Enregistrement des annonces... </li>
                        
                        <li>Support client : Si vous avez des questions, des préoccupations ou besoin d'aide, notre équipe de support client est à votre disposition. Vous pouvez nous contacter facilement à travers votre compte.</li>
                        
                    </ul>
                </p>
            </div>
         {{--    <div class="carteOpp">
                <a href="#">
                    <div class="carteop">
                    hi you 
                    </div>
                </a>
                <a href="#">
                    <div class="carteop">
                    hi you 
                    </div>
                </a>
                <a href="#">
                    <div class="carteop">
                    hi you 
                    </div>
                </a>
            </div> --}}




            @if (Session::has('status'))
            <div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show" class="alert alert-success" style="width
              :50%; text-align: center;left:25%;">
              {{Session::get('status')}}
            </div>
                
            @endif
            @if (auth()->check() && auth()->user()->type != 'client')
            <hr class="separator">

         
            @unless(count($offres) == 0)
            <div class="info" style="width:100%" id="gerer_offre">
                        
                 <h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center;margin-top: 20px;">Liste des offres proposés:</h1> 
                 <table style="border: solid #1276D2; margin:20px;">  
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>E-mail</th>
                        <th>Nom Annonce</th>
                        <th>Offre proposé</th>
                      
                      </tr>
                    
      
            @foreach($offres as $offre)
            @if(auth()->check() && $offre->annonce && $offre->annonce->user_id == auth()->user()->id && $offre->annuler==0)
        

            <tr>
<td>{{$offre->user->nom}}</td>
<td>{{$offre->user->prenom}}</td>
<td>{{$offre->user->email}}</td>
<td>{{$offre->annonce->titre}}</td>
<td>{{$offre->prix_propose}}<span>DZD</span></td>
<td>
    <form action="/offre/accepter/{{$offre->id}}" method="POST" style="background-color: none;border:none;">
    @csrf
    <button  style="color:#1276D2;border:none;"><i class="fa-regular fa-circle-check"></i>Accepter</button>
</form>
</td>
<td>
    <form action="/offre/refuser/{{$offre->id}}" method="POST" style="background-color: none;border:none;">
        @csrf
        <button  style="color:red;border:none;"><i class="fa-solid fa-trash"></i>Refuser</button>
    </form>

</td>
</tr>

@endif
             
          
          
          
          
          
            @endforeach
        </table>
    </div>


            @else
            <h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center;margin-top: 20px;" id="gerer_offre">Liste des offres proposés:</h1> 
            <table style="border: solid #1276D2 ; margin:20px;">  
               <tr>
                   <th>Nom</th>
                   <th>Prénom</th>
                   <th>E-mail</th>
                   <th>Nom Annonce</th>
                   <th>Offre proposé</th>
                 
                 </tr>
         
          
        </table>

        <p  style="text-align: center;color: #1276D2; font-weight: bolder;">Pas d'offres</p>
            @endunless



<hr class="separator">

         
@unless(count($contrats) == 0)
<div class="info" style="width:100%" id="gerer_contrats">
            
     <h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center;margin-top: 20px;">Liste des contrats:</h1> 
     <table style="border: solid #1276D2; margin:20px;">  
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>E-mail</th>
            <th>Nom Annonce</th>
            <th>Offre proposé</th>
          
          </tr>
        


@foreach($contrats as $contrat)
    @if((auth()->check() && $contrat->annonce && $contrat->annonce->user_id == auth()->user()->id) ||(auth()->check() && $contrat->annonce && $contrat->user_id_client == auth()->user()->id) )
        <tr>

            <td>{{ $contrat->client->nom }}</td>
            <td>{{ $contrat->client->prenom }}</td>
            <td>{{ $contrat->client->email }}</td>
           
            <td>{{ $contrat->annonce->titre }}</td>
     

            @if($contrat->annonce->lastOffre == null)
<td>pas d'offres</td>
@else
 <td>{{$contrat->annonce->lastOffre->prix_propose}} <span>DZD</span></td>
@endif
  
<td>
<form action="/contrat/imprimer/{{$contrat->id}}" method="GET" style="background-color: none;border:none;">
@csrf

<button  style="color:#1276D2;border:none;" onclick="window.onload().print()"><i class="fa-solid fa-print"></i>Imprimer</button>
</form>
</td>
<td>
<form action="/contrat/supprimer/{{$contrat->id}}" method="POST" style="background-color: none;border:none;">
@csrf

<button  style="color:red;border:none;"><i class="fa-solid fa-trash"></i>Supprimer</button>
</form>

</td>
</tr>

@endif
 





@endforeach
</table>
</div>


@else
<h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center;margin-top: 20px;" id="gerer_offre">Liste des contrats:</h1> 
<table style="border: solid #1276D2 ; margin:20px;">  
   <tr>
       <th>Nom</th>
       <th>Prénom</th>
       <th>E-mail</th>
       <th>Nom Annonce</th>
       <th>Offre proposé</th>
     
     </tr>


</table>

<p  style="text-align: center;color: #1276D2; font-weight: bolder;">Pas de contrats</p>
@endunless













            <hr class="separator">
            @unless(count($annonces) == 0)
            <div class="info" style="width:100%" id="gerer_annonce">
                        
                 <h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center;margin-top: 20px; ">Mes Annonce:</h1> 
                 <table style="border: solid #1276D2; margin:20px;">  
                    <tr>
                        <th>Titre</th>
                        <th>Type</th>
                        <th>Surface</th>
                        <th>Prix</th>
                        <th>Wilaya</th>
                       {{--  <th>Description</th>
                        <th>Image index</th> --}}
                        <th>Adresse</th>
                        <th>Transaction</th>
                      {{--   <th>Nom de propriètaire</th>
                        <th>E-mail</th> --}}
                        <th>Téléphone</th>
                        <th>Prix proposé</th>
                      
                      </tr>
                    
      
            @foreach($annonces as $annonce)
            @if(auth()->check() && auth()->user()->id == $annonce->user_id)
            <tr>
<td>{{$annonce->titre}}</td>
<td>{{$annonce->type}}</td>
<td>{{$annonce->surface}}</td>
<td>{{$annonce->prix}} <span>DZD</span> </td>
<td>{{$annonce->wilaya}}</td>
{{-- <td>{{$annonce->description}}</td>
<td>{{$annonce->image_index}}</td> --}}
<td>{{$annonce->adresse}}</td>
<td>{{$annonce->transaction}}</td>
{{-- <td>{{$annonce->nom}}</td>
<td>{{$annonce->email}}</td> --}}
<td>{{$annonce->telephone}}</td>
@if($annonce->lastOffre == null)
<td>pas d'offres</td>
@else
 <td>{{$annonce->lastOffre->prix_propose}} <span>DZD</span></td>
@endif





<td><a href="/annonces/{{$annonce->id}}/modifier"> <i class="fa-solid fa-pen-to-square"></i> Modifier</a></td>
<td>{{-- <a href="#" style="color: red"> <i class="fa-solid fa-trash"></i>Supprimer</a>  --}}

    <form method="POST" action="/annonces/{{$annonce->id}}" style="background: none">
        @csrf
        @method('DELETE')
        <button  style="color: red;border:none;"><i class="fa-solid fa-trash"></i>Supprimer</button>
      </form>
</td>
            </tr>

@endif
             
          
          
          
          
          
            @endforeach
        </table>
    </div>


            @else
            <h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center;  margin-top: 20px;" id="gerer_annonce">Mes Annonce:</h1> 
            <table style="border: solid #1276D2 ; margin:20px;">
                <tr>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Surface</th>
                    <th>Prix</th>
                    <th>Wilaya</th>
                   {{--  <th>Description</th>
                    <th>Image index</th> --}}
                    <th>Adresse</th>
                    <th>Transaction</th>
                  {{--   <th>Nom de propriètaire</th>
                    <th>E-mail</th> --}}
                    <th>Téléphone</th>
                    <th>Prix proposé</th>
                  
                  </tr>
                
          
        </table>
        <p style="text-align: center;color: #1276D2; font-weight: bolder;">Pas d'annonces</p>
            @endunless




            @endif

            <hr class="separator">

            @unless(count($enregistrements) == 0)
            <div class="info" style="width:100%" id="enregistrement">
                        
                 <h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center;margin-top: 20px; ">Mes Enregistrements:</h1> 
                 <table style="border: solid #1276D2 ; margin:20px;">  
                    <tr>
                        <th>Titre</th>
                        <th>Prix</th>
                        <th>Wilaya</th>
                        <th>Adresse</th>
                        <th>Transaction</th>
                        <th>Dernière offre</th>
                      
                      </tr>
                    
      
            @foreach($enregistrements as $enregistrement)
            @if(auth()->check() && auth()->user()->id == $enregistrement->user_id)
            <tr>
<td>{{$enregistrement->annonce->titre}}</td>

<td>{{$enregistrement->annonce->prix}}<span>DZD</span></td>
<td>{{$enregistrement->annonce->wilaya}}</td>
{{-- <td>{{$annonce->description}}</td>
<td>{{$annonce->image_index}}</td> --}}
<td>{{$enregistrement->annonce->adresse}}</td>
<td>{{$enregistrement->annonce->transaction}}</td>
{{-- <td>{{$annonce->nom}}</td>
<td>{{$annonce->email}}</td> --}}

@if($enregistrement->annonce->lastOffre == null)
<td>pas d'offres</td>
@else
 <td>{{$enregistrement->annonce->lastOffre->prix_propose}}<span>DZD</span></td>
@endif





<td><a href="/annonces/{{$enregistrement->annonce_id}}">Voir l'annonce</a></td>
<td>{{-- <a href="#" style="color: red"> <i class="fa-solid fa-trash"></i>Supprimer</a>  --}}

    <form method="POST" action="/enregistrements/{{$enregistrement->annonce_id}}" style="background: none">
        @csrf
        @method('DELETE')
        <button  style="color: red;border:none;"><i class="fa-solid fa-trash"></i></button>
      </form>
</td>
            </tr>

@endif
             
          
          
          
          
          
            @endforeach
        </table>
    </div>


            @else
            <h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center; margin-top: 20px; " id="enregistrement">Mes Enregistrements:</h1> 
            <table style="border: solid #1276D2; margin:20px;">
                <tr>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Wilaya</th>
                    <th>Adresse</th>
                    <th>Transaction</th>
                    <th>Dernière offre</th>
                </tr>
               
          
        </table>
        <p style="text-align: center;color: #1276D2; font-weight: bolder;">Pas d'enregistrements</p>
            @endunless










            <hr class="separator">
            @if (auth()->check() && auth()->user()->type == 'admin')


            @unless(count($users) == 0)
            <div class="info" style="width:100%" id="users">
                        
                 <h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center;margin-top: 20px; ">Liste des utilisateurs:</h1> 
                 <table style="border: solid #1276D2 ; margin:20px;font-size: xx-small;">  
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                      
                        <th>Type</th>
                        <th>Wilaya</th>
                        <th>NomS</th>
                        <th>NumR</th>
                        <th>NumG</th>
                        <th>NomE</th>
                        <th>NumIN</th>
                        <th>Status juridique</th>
                    </tr>
                    
      
            @foreach($users as $user)
          
            <tr>
                <tr>
                    <td>{{$user->nom}}</td>
                    <td>{{$user->prenom}}</td>
                    <td>{{$user->tel}}</td>
                    <td>{{$user->email}}</td>
                   
                    <td>{{$user->type}}</td>
                    <td>{{$user->wilaya}}</td>
                    
               



@if($user->nomS == null)
    <td>/</td>
@else
    <td>{{$user->nomS}}</td>
@endif

@if($user->numR == null)
    <td>/</td>
@else
    <td>{{$user->numR}}</td>
@endif

@if($user->numG == null)
    <td>/</td>
@else
    <td>{{$user->numG}}</td>
@endif

@if($user->nomE == null)
    <td>/</td>
@else
    <td>{{$user->nomE}}</td>
@endif

@if($user->numIN == null)
    <td>/</td>
@else
    <td>{{$user->numIN}}</td>
@endif

@if($user->status_juridique == null)
    <td>/</td>
@else
    <td>{{$user->status_juridique}}</td>
@endif
<td>

<form method="POST" action="/bloquer/{{$user->id}}" style="background: none">
    @csrf

@method('PUT')

<button  style="color: red;border:none;"><i class="fa-duotone fa-user-slash"></i>Bloquer</button>
</form>
</td>
<td>
<form method="POST" action="/debloquer/{{$user->id}}" style="background: none">
    @csrf

@method('PUT')

<button  style="color: #1276D2;border:none;"><i class="fa-solid fa-user"></i>Débloquer</button>
</form>
</td>
<td>
    <form method="POST" action="/supprimer/{{$user->id}}" style="background: none">
        @csrf
    
    @method('DELETE')
    
    <button  style="color: red;border:none;"><i class="fa-solid fa-trash"></i></button>
    </form>
    </td>

<td>{{-- <a href="#" style="color: red"> <i class="fa-solid fa-trash"></i>Supprimer</a>  --}}
{{-- 
    <form method="POST" action="/enregistrements/{{$enregistrement->annonce_id}}" style="background: none">
        @csrf
        @method('DELETE')
        <button  style="color: red;border:none;"><i class="fa-solid fa-trash"></i></button>
      </form> --}}
</td>
            </tr> 


             
          
          
          
          
          
            @endforeach
        </table>
    </div>


            @else
            <h1 style="color: #1276D2 ;font-weight:bold;padding: 5px;text-align: center; margin-top: 20px; " id="users">Liste des utilisateurs:</h1> 
            <table style="border: solid #1276D2; margin:20px;font-size: xx-small;">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                  
                    <th>Type</th>
                    <th>Wilaya</th>
                    <th>NomS</th>
                    <th>NumR</th>
                    <th>NumG</th>
                    <th>NomE</th>
                    <th>NumIN</th>
                    <th>Status juridique</th>
                </tr>
                
               
          
        </table>
        <p style="text-align: center;color: #1276D2; font-weight: bolder;">Pas d'utilisateurs</p>
            @endunless








@endif

        </div>
    </div>


@endsection