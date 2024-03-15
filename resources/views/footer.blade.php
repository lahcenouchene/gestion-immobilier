
  


<section class="footer" id="footer">

    <div class="box-container">
     {{--  <div class="boxx"> --}}
        <img src=" {{ asset('images/logo14.png') }}" alt="logo"  style="height: 100px;width:140px;">
{{--       </div> --}}
      <div class="boxx">
        <h3>Notre Branches</h3>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> Béjaia </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> Alger </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i> Oran</a>
      </div>
  
      <div class="boxx">
        <h3>Liens</h3>
        <a href="{{Route('index')}}"> <i class="fas fa-arrow-right"></i> Accueil </a>
        <a href="#"> <i class="fas fa-arrow-right"></i> Contact </a>
        <a href="{{Route('register')}}"> <i class="fas fa-arrow-right"></i> Inscrire </a>
     
      </div>
  
      <div class="boxx">
        <h3>Contactez Nous</h3>
  
        <a href="#"> <i class="fas fa-phone"></i>0655342343 </a>
        <a href="#"> <i class="fas fa-envelope"></i> shelterin@gmail.com </a>
        <a href="#"> <i class="fas fa-map-marker-alt"></i>Notre Adresse</a>
        <div style="display: inline-flex ;">
         
          <a href="#" style="padding: 15px ;"> <i class="fa-brands fa-facebook-f"></i></a>
          <a href="#" style="padding: 15px"> <i class="fab fa-instagram"></i></a>
          <a href="#" style="padding: 15px"> <i class="fa-brands fa-linkedin"></i></a>
          <a href="#" style="padding: 15px"> <i class="fa-brands fa-twitter"></i></a>
  
        </div>
      </div>

      
  
  
  
    </div>
  
    <div class="credit">
      <p>ShelterIn All Rights Reserved &copy;</p>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="sweetalert2.min.js"></script>
  <script src="js/inscrire.js"></script>
  </body>
  
  </html>