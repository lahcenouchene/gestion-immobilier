

<!DOCTYPE html>
<html>
<head>
    <title>Contrat de Location Immobilier</title>
    <link rel="stylesheet" href="{{ asset('css/contrat.css') }}">
    <script>
        window.onload = function() {
            document.getElementById('print-button').style.display = 'none'; // Masquer le bouton d'impression
            window.print();
            document.getElementById('print-button').style.display = 'block'; // Appeler la fonction d'impression
        };
    </script>
    
</head>
<body>
  @if($contrat->annonce->transaction =='louer')
    <div class="container">
        <h1>Contrat de Location Immobilier</h1>
        <div class="contract-details">
             <!-- Ajoutez les autres détails du contrat ici -->
            <h2>Informations du Contrat</h2>
            <p><strong>Nom du Locataire :</strong> {{ $contrat->client->nom }}</p>
            <p><strong>Adresse du Bien :</strong> {{$contrat->annonce->adresse}}</p>
            @if($contrat->annonce->lastOffre)
            <p><strong>Date de Début :</strong> {{$contrat->annonce->lastOffre->date_debut}}</p>
            <p><strong>Date de Fin :</strong> {{$contrat->annonce->lastOffre->date_fin}}</p>
            <p><strong>Loyer Mensuel :</strong>{{$contrat->annonce->lastOffre->prix_propose}} DZD</p>
        @else
            <p>Les informations de l'offre sont indisponibles.</p>
        @endif
        
          
        </div>
        <div class="signature-section">
            <h2>Signatures</h2>
            <div class="signatory">
                <p>Signature du Locataire :</p>
               <div><h4>...........</h4></div>
            </div>
            <div class="signatory">
                <p>Signature du Propriétaire :</p>
                <div><h4>...........</h4></div>
            </div>
            <div class="signatory">
                <p> Imprimé le:{{$currentDate }}</p>
              
            </div>
        </div>
        
       
    </div>
    <button id="print-button" class="print-button"   onclick="window.print()">Imprimer</button>
    @else



   
        <div class="container">
            <div class="contract-header">
                <h1>Contrat de vente immobilière</h1>
            </div>
            
            <div class="contract-details">
                <h2>Informations sur la propriété</h2>
                <p>Nom de la propriété:{{$contrat->annonce->nom}}</p>
                <p>Adresse:{{$contrat->annonce->adresse}} </p>
                <p>Description:{{$contrat->annonce->description}} </p>
            </div>
            @if($contrat->client->id == $user->id)
            <div class="contract-details">
                <h2>Informations sur le vendeur (propriétaire)</h2>
                <p>Nom du vendeur: {{$contrat->userProp->nom}}</p>
                <p>Prénom du vendeur: {{$contrat->userProp->prenom}}</p>
                <p>Téléphone du vendeur: {{$contrat->userProp->tel}}</p>
            </div>
            
            <div class="contract-details">
                <h2>Informations sur l'acheteur (client)</h2>
                <p>Nom de l'acheteur:{{$contrat->client->nom}} </p>
                <p>Prénom de l'acheteur:{{$contrat->client->prenom}} </p>
                <p>Téléphone de l'acheteur:{{$contrat->client->tel}}</p>
            </div>
            @else
            <div class="contract-details">
                <h2>Informations sur le vendeur (propriétaire)</h2>
                <p>Nom du vendeur: {{$user->nom}}</p>
                <p>Prénom du vendeur: {{$user->prenom}}</p>
                <p>Téléphone du vendeur: {{$user->tel}}</p>
            </div>
            
            <div class="contract-details">
                <h2>Informations sur l'acheteur (client)</h2>
                <p>Nom de l'acheteur:{{$contrat->client->nom}} </p>
                <p>Prénom de l'acheteur:{{$contrat->client->prenom}} </p>
                <p>Téléphone de l'acheteur:{{$contrat->client->tel}}</p>
            </div>


            @endif
            
            <div class="contract-details">
              
                <p>Prix de vente:{{$contrat->annonce->lastOffre->prix_propose}} </p>
             
            </div>
            
            <div class="signature-section">
                <p>Signature du vendeur: __________________________</p>
                <p>Signature de l'acheteur: ________________________</p>
            </div>

            <div class="signatory">
                <p> Imprimé le:{{$currentDate }}</p>
              
            </div>
        </div>
  
    
        <button id="print-button" class="print-button"   onclick="window.print()">Imprimer</button>


    @endif
</body>
</html>
