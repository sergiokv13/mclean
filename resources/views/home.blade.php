<!--
                                   _       _   
								  | |     | |    
  Designed and Coded By           | | __ _| |__  
 / _ \ \ /\ / /\ \ /\ / /\ \ /\ / / |/ _` | '_ \ 
| (_) \ V  V /  \ V  V /  \ V  V /| | (_| | |_) |
 \___/ \_/\_/    \_/\_/    \_/\_/ |_|\__,_|_.__/ 

http://themeforest.net/user/owwwlab/
                                          
-->
<html class="is-touch">

  <!-- #####Begin head-->
  <head>
    <title>MACLEAN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

     <link href="{{ asset('css/vendors/vendors-overwrites.css') }}" rel="stylesheet" type="text/css">

     <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/jquery.scrollex.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/jquery.scrolly.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/skel.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('js/util.js') }}"></script>
      <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
      <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>


         <script src="{{ asset('js/vendors/vendors.js') }} "></script>
    <!-- Only for local and can be removed on server-->

    <script src="{{ asset('js/custom.js') }}"></script>

  </head>

  <!-- #####End head-->
    <body>

        <video poster="{{ url('img/videoposter.png') }}" id="bgvid" playsinline autoplay muted loop>
        <source src="{{ url('img/video.mp4') }}" type="video/mp4">
 </video>

    @if(Auth::user() != null)

      <div style="text-align: center; background-color: white; width: 50%;margin:auto;">
        Usted inicio sesión como {{Auth::user()->name}}. <br> <a href="/scaffold-dashboard">Ir al dashboard.</a>
      </div> 

    @endif



    <!-- Header -->
      <section id="header">
          <header class="major"> 

            <div id="conocemas">
              <a href="#one" class="goto-next scrolly">
                <img src='{{url("img/logo.png")}}' id="logotipo">
                <p style="margin-top: -40px;">{!!$website_information->welcome_text!!}</p>
              </a>
            </div>

        </header>
      </section>

    <!-- One -->
      <section id="one" class="main special">
        <div class="container">
          
          <div class="content">
            <header class="major">
              <img src="{{ url('website/'.$website_information->mclean_image) }}"><h2></h2>
            </header>
            <p>{!!$website_information->about_me!!}</p>
          </div>
          <a href="#two" class="goto-next scrolly">Next</a>
        </div>
      </section>

    <!-- Two -->
      <section id="two" class="main special">
        <div class="container">
         
          <div class="content">
            <header class="major">
              <h2>Mapa del sitio</h2>
            </header>
            <ul class="icons-grid">
              <li>
                <a  href="#header" class="scrolly" style="color:#6f7577; border-bottom: none; "> INICIO</a>
                
              </li>
              <li>
                <a  href="#three" class="scrolly" style="color:#6f7577; border-bottom: none; "> PROYECTOS</a>
                
              </li>
              <li>
                <a  href="#team" class="scrolly" style="color:#6f7577; border-bottom: none; "> EQUIPO</a>
                
              </li>
              <li>
                <a  href="#footer" class="scrolly" style="color:#6f7577; border-bottom: none; "> CONTACTO</a>
              </li>
            </ul>
          </div>
          <a href="#three" class="goto-next scrolly">Next</a>
        </div>
      </section>

    <!-- Three -->
      <section id="three" class="main special">
        <div class="container">

          <div class="content" style="vertical-align: baseline !important;">
            <header class="major">
              <h2>Proyectos</h2>
            </header>
            <p>{!!$website_information->projects_text!!}</p>
            <div class="ol-grid-filters">
              <ul class="default-filters">
                <li  class="active"><a style="border-bottom: none;" href="#" data-filter="*">Todos</a></li>
                @foreach($categories as $category) 
                  <li ><a style="border-bottom: none;" href="#" data-filter=".cat_{!!$category->id!!}">{!!$category->name!!}</a></li>
                @endforeach 
              </ul>
              <div class="select-filters">
                <select>
                  <option value="*">Show All</option>
                   @foreach($categories as $category) 
                    <option value=".cat_{!!$category->id!!}">{!!$category->name!!}</option>
                  @endforeach 
                  
                </select>
              </div>
            </div>


             <div class="ol-grid masonry col-3 with-gutter ol-lightbox-gallery">
                @foreach($projects as $project) 
                  <!-- #####Begin grid item-->
                  <div class="grid-item cat_{!!$project->category()->id!!}">
                    <div class="gi-wrapper ol-hover hover-2 ol-animate fadeInUp"><img src="{{ url('projects/'.$project->project_image)}} " alt="image hover">
                      <div class="icons">
                          <a title="<span style='color:white !important;'>{{$project->name}}</span> <br> <a href='/project_show/{!!$project->id!!}'>Ver proyecto</a>" style="border-bottom: none;" href="{{ url('projects/'.$project->project_image) }} " class="ol-lightbox"><i class="fa fa-search"></i></a>

                          <a style="border-bottom: none;" href="/project_show/{!!$project->id!!}"><i class="fa fa-arrow-right"></i></a>
                      </div>
                    </div>
                  </div>
                  <!-- #####End grid item-->
                 @endforeach 
              </div>

          </div>
          <a href="#team" class="goto-next scrolly">Next</a>
        </div>
      </section>

      <section id="team" class="main special">
        <div class="container">
          <div class="content">
            <header class="major">
              <h2>Equipo</h2>
            </header>
            <p>{!!$website_information->team_text!!}</p>
          <a href="#footer" class="goto-next scrolly">Next</a>

              @foreach($team_members as $team_member) 

                        <div style=" width: 70%; margin-right: auto; margin-left: auto;">
                            <div class="team-member">
                                <div class="team-img">
                                    <img src="{{ url('members/'.$team_member->member_image)}}" alt="team member" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <br>
                @endforeach

                    </div>
        </div>
      </section>



    <!-- Footer -->
      <section id="footer">
        <div class="container">
          <header class="major">
            <h2>Contacto</h2>
           
          </header>
          <form method="post" action="#">
            <div class="row uniform">
              <div class="6u 12u$(xsmall)"><input type="text" name="name" id="name" placeholder="Nombre" /></div>
              <div class="6u$ 12u$(xsmall)"><input type="email" name="email" id="email" placeholder="Correo electrónico" /></div>
              <div class="12u$"><textarea name="message" id="message" placeholder="Mensaje" rows="4"></textarea></div>
              <div class="12u$">
                <ul class="actions">
                  <li><input type="submit" value="Send Message" class="special" /></li>
                </ul>
              </div>
            </div>
          </form>
        </div>

        <footer>

           <div class="copyright" style="margin-bottom: 30px;">
           <span><i class= "fa fa-envelope-o" ></i> {{$website_information->contact_email}} </span><br><br>
            <span><i class= "fa fa-phone" ></i> {{$website_information->contact_phone}}</span><br><br>
            <span><i class= "fa fa-mobile" ></i> {{$website_information->contact_phone2}}</span><br><br>
            <span><i class= "fa fa-map-pin" ></i> {{$website_information->address}}</span>
          </div>

          <ul class="copyright">
            <li>&copy; Maclean 2017</li><li>Development and Design: <a href="www.expansesoft.com">Expanse Software</a></li>
          </ul>
        </footer>
      </section>

    <!-- Scripts -->
  </body>
</html>


<script type="text/javascript">
  $(window).scroll(function(){ 

  var first = $("#one").offset().top;
  var last = $("#footer").offset().top;  
  var pos = $(window).scrollTop();

  if(pos >= first) {
      $("section").css({
                  "background-color" : "white",
                              
      });
  }

  if(pos < first) {
      $("section").css({
                  "background-color" : "",
                               
      });
  }
  

  
  });
</script>