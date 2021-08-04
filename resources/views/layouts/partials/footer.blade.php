<!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->

   

    <section class="container">
       
        @guest
        <div class="bar-button">
                <div class="t3-button">
                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                </div>
                {{-- @if (Route::has('register')) --}}
                <div class="t3-button">
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </div>

        
                {{-- @endif --}}
        </div>
            {{-- @else --}}
        @endguest    
   
        {{-- mostrare barra per la dashboard se loggato --}}
        @auth
            <div class="dashboard-bar-footer">
                <div>
                    <a href="{{ route('admin.index') }}">visita la tua pagina personale</a>
                </div>
            </div>
        @endauth

      </section>

    <!-- Section: Text -->
    <section class="mb-4">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
        repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
        eum harum corrupti dicta, aliquam sequi voluptate quas.
      </p>
    </section>
    <!-- Section: Text -->
    <div class="col-lg-12 t3-title" >CHI SIAMO</div>
    <div class="col-lg-12">
        <div class="t3-name">Agnese Bettio</div>
        <div class="t3-conctact">
            <a href="https://www.linkedin.com/in/agnese-bettio-b1a720163/"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-github-square"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="t3-name">Lorenzo Cordovani</div>
        <div class="t3-conctact">
            <a href="https://www.linkedin.com/in/lorenzo-cordovani/"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-github-square"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="t3-name">Matteo Meago</div>
        <div class="t3-conctact">
            <a href="https://www.linkedin.com/in/matteo-meago-365aab216/"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-github-square"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="t3-name">Stefano Ferrera</div>
        <div class="t3-conctact">
            <a href="https://www.linkedin.com/in/stefano-ferrera-676b36167/"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-github-square"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
            <a href="#"><i class="fab fa-twitter-square"></i></a>
        </div>
    </div>
    
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="#">Boolbnb.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
