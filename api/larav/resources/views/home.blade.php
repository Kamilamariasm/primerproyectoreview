@extends('layouts.main')
@section('title','Lueur')
@section('content')
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Lueur Astre</title>

  <!-- slider stylesheet -->


  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/boostrap.css') }}">
  <link rel="stylesheet" href="{{ asset('css/resposive.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css.map') }}">
  <link rel="stylesheet" href="{{ asset('css/style.scss') }}">


</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.html">
          <img src="{{ asset('images/granocafe.png') }}" alt="" />
            <span>
              
            </span>
          </a>
         

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="admin">Admin<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="login">Inicia sesión<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="product.html">  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="client.html">  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- hero section -->
    <section class="hero_section">
      <div class="hero_detail">
        <h1>
          <span>
            L
          </span>
          <span>
            u
          </span>
          <span>
            e
          </span>
          <span>
            u
          </span>
          <span>
            r
          </span>
         
        </h1>
        <h3>
          S    O    N    O    R    A
          </h2>
      </div>
      
    </section>
    <!-- end hero section -->
  </div>
  <!-- end hero area -->


  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="about_container">
      <div class="container">
        <div class="detail">
          <h2 class="custom_heading">
           Sobre nosotros
          </h2>
          <p >
          En Lueur, te sumergimos en el cautivador mundo de las cafeterías en Hermosillo. Te guiamos por una odisea 
          sensorial para descubrir el encanto único de cada lugar
          </p>
          <div>
            <a href="">
              
            </a>
          </div>
        </div>
        <div class="detail-2">
          <p>
 Embárcate en un viaje donde se captura la esencia de cada experiencia. 
          Desde íntimos refugios hasta modernos escenarios. te invitamos a una exploración celestial para descubrir el encanto único de cada lugar         

          </p>
        </div>
      </div>
    </div>
  </section>


  <!-- end about section -->

  <!-- product section -->
  <section class="product_section layout_padding">
    <div class="d-flex justify-content-center">
      <h2 class="custom_heading">
      Explora las historias que se despliegan con cada taza de café

      </h2>
    </div>
    <div class="container layout_padding2">
      <div class="img-box box-1">
        <img src="images/po2.jpg" alt="">
      </div>
      <div class="img-box box-2">
        <img src="images/po6.jpg" alt="">
      </div>
      <div class="img-box box-3">
        <img src="images/po7.jpg" alt="">
      </div>
      <div class="img-box box-4">
        <img src="images/po5.jpg" alt="">
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <a href="">
        
      </a>
    </div>
  </section>


  <!-- end product section -->

  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="d-flex flex-column align-items-center text-center">
        <h2 class="custom_heading ">
|   ¿Por qué elegir Lueur Astre?   
      </h2>
        <p class="">
        Lueur Astre es tu compañero perfecto para explorar las cafeterías 
        locales de Hermosillo. Te llevamos a un viaje por los 
        sabores auténticos de nuestra ciudad. En Lueur Astre 
        celebramos la diversidad de opciones que Hermosillo 
        ofrece cada espacio. 
        
      </div>
    </div>
    <div class="why_container my-4">
      <div class="img_box">
        <img src="images/36.png" alt="">
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <a href="">
       
      </a>
    </div>
  </section>

  <!-- end why section -->



  <!-- contact section -->

  <section class="contact_section layout_padding">
    <div class="container">
      <div class="col-md-6">
        <div class="d-flex mb-4 ml-4 ml-md-0">
          <h2 class="custom_heading text-center">
            Contáctanos 
          </h2>
        </div>
        <form action="">
          <div>
            <input type="text" placeholder="Name" />
          </div>
          <div>
            <input type="email" placeholder="Email" />
          </div>
          <div>
            <input type="text" placeholder="Pone Number" />
          </div>
          <div>
            <input type="text" class="message-box" placeholder="Message" />
          </div>
          <div class="d-flex justify-content-center mt-4 ">
            <button>
              Enviar
            </button>
          </div>
        </form>
      </div>
    </div>

  </section>

  <!-- end contact section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="d-flex justify-content-center">
      <h2 class="custom_heading">
      ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎ ︎
      </h2>
    </div>
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="client_container layout_padding">
              <div class="img_box">
                <img src="images/client.png" alt="">
              </div>

              <div class="detail_box">
                <h5>
                  
                </h5>
                <p>
                Embárcate en un viaje donde los cafés se transforman en historias, donde las texturas 
                y los aromas se entrelazan en cada relato y los aromas danzan en armonía. Cada rincón 
                es un paseo por las atmósferas que hacen únicos a cada rincón cafetero. 

                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding">
              <div class="img_box">
                <img src="images/client.png" alt="">
              </div>

              <div class="detail_box">
                <h5>
                  
                </h5>
                <p>
                Embárcate en un viaje donde los cafés se transforman en historias, donde las texturas 
                y los aromas se entrelazan en cada relato y los aromas danzan en armonía. Cada rincón 
                es un paseo por las atmósferas que hacen únicos a cada rincón cafetero. 

                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding">
              <div class="img_box">
                <img src="images/client.png" alt="">
              </div>

              <div class="detail_box">
                <h5>
                 
                </h5>
                <p>
                Embárcate en un viaje donde los cafés se transforman en historias, donde las texturas 
                y los aromas se entrelazan en cada relato y los aromas danzan en armonía. Cada rincón 
                es un paseo por las atmósferas que hacen únicos a cada rincón cafetero. 

                </p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- end client section -->

  <!-- info section -->
  <section class="info_section layout_padding">
    <div class="container layout_padding-top  layout_padding2-bottom">
      <div class="logo-box">
        <a href="index.html">
          <img src="images/info-cafeypan.png" alt="">
        </a>
      </div>
      <div class="info_items">
        <a href="">
          <div class="item ">
            <div class="img-box box-1">
              <img src="images/location-white.png" alt="" />
            </div>
            <div class="detail-box">
              <p>
               Bulevard de los Seris Final, Parque Industrial, 83299 Hermosillo, Son.
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-3">
              <img src="images/envelope-white.png" alt="" />
            </div>
            <div class="detail-box">
              <p>
                Kamilamariasm@hotmail.com
              </p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item ">
            <div class="img-box box-2">
              <img src="images/telephone-white.png" alt="" />
            </div>
            <div class="detail-box">
              <p>
                +52 6622
              </p>
            </div>
          </div>
        </a>

      </div>
    </div>
  </section>

  <!-- end info_section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; Práctica Final
      <a href="https://html.design/"></a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>

@endsection