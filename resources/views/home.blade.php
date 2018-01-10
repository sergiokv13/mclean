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
    <link rel="icon" href="{{ url('img/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ url('img/favicon.png') }}">

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

    <div id = "side_menu" class="dropdown">
      <span style="color: #6f7577; font-size: 2em;opacity: 0.5;filter: alpha(opacity=50);"><i class="fa fa-bars" aria-hidden="true"></i></span>
      <div class="dropdown-content">
        <a  href="#header" class="scrolly active" style="color:#6f7577; border-bottom: none;"> INICIO</a><br>
        <a  href="#one" class="scrolly" style="color:#6f7577; border-bottom: none;"> ACERCA DE</a><br>
        <a  href="#two" class="scrolly" style="color:#6f7577; border-bottom: none;"> PROYECTOS</a><br>
        <a  href="#team" class="scrolly" style="color:#6f7577; border-bottom: none;"> EQUIPO</a><br>
        <a  href="#footer" class="scrolly" style="color:#6f7577; border-bottom: none;"> CONTACTO</a><br>
      </div>
    </div>


 

    @if(Session::has('message'))
      <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{ Session::get('message') }}
      </div> 
    @endif

  </head>

  <!-- #####End head-->
    <body>



  <video poster="{{ url('img/videoposter.png') }}" id="bgvid" playsinline autoplay loop>
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
                <img style="margin-left: auto; margin-right: auto;" src='{{url("img/logo.png")}}' id="logotipo">
                <p>{!!$website_information->welcome_text!!}</p>
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
            <p align="justify">{!!$website_information->about_me!!}</p>
          </div>
          <a href="#two" class="goto-next scrolly">Next</a>
        </div>
      </section>


    <!-- Three -->
      <section id="two" class="main special">
        <div class="container">

          <div class="content" style="vertical-align: baseline !important;">
            <header class="major">
              <h2>Proyectos</h2>
            </header>
            <p>{!!$website_information->projects_text!!}</p>


              @foreach($categories as $category) 

                  <div id="container2{{$category->id}}" class="container2" style="margin-bottom: 10%;">

                   <div id="arrowL{{$category->id}}" class="arrowL">
                      <
                    </div>

                    <div id="arrowR{{$category->id}}" class="arrowR">
                      >
                    </div>

                    <div class="list-container" id="list-container{{$category->id}}">
                        <div class='list'>
                            <div id="item{{$category->id}}" class='item' style = "text-align: left; width: 200px;">
                              {!!$category->name!!}
                            </div>
                            @foreach($projects->where("category_id",$category->id) as $project) 
                            <div id="item{{$category->id}}" class="item">
                              <a style="border-bottom: none;" href="/project_show/{!!$project->id!!}">
                                    <span>
                                      <img class="imagen_proyecto" src="{{ url('projects/'.$project->project_image)}} " alt="image hover" height="150px" width="auto" >
                                    </span>
                              </a>
                              <!-- #####End grid item-->
                            </div>
                            @endforeach 

                        </div>
                    </div>

                </div>
              @endforeach 
           
             
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
          <form method="post" action="/contact_mail">
            {!! csrf_field() !!}
            <div class="row uniform">
              <div class="6u 12u$(xsmall)"><input type="text" name="name" id="name" placeholder="Nombre" required/></div>
              <div class="6u$ 12u$(xsmall)"><input type="email" name="email" id="email" placeholder="Correo electrónico" required/></div>
              <div class="12u$"><textarea name="message" id="message" placeholder="Mensaje" rows="4" required style="resize: none;"></textarea></div>
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

  if(pos >= first/2) {
      $("section").css({
                  "background-color" : "white",
                  "transition": "background 0.5s linear"             
      });
     $("#side_menu").fadeIn(500);
  }

  if(pos < first/2) {
      $("section").css({
                  "background-color" : "",
                  "transition": "background 0.5s linear"             
      });
      $("#side_menu").fadeOut(500);
  }
  

  
  });
</script>

<script type="text/javascript">

$(window).bind('load',function() {

   @foreach($categories as $category)     


    $('div#arrowL{{$category->id}}').click(function () { 
      var leftPos = $('#list-container{{$category->id}}').scrollLeft();
      $("#list-container{{$category->id}}").animate({scrollLeft: leftPos - 200}, 800);
    });

    $('div#arrowR{{$category->id}}').click(function () { 
      var leftPos = $('#list-container{{$category->id}}').scrollLeft();
      $("#list-container{{$category->id}}").animate({scrollLeft: leftPos + 200}, 800);
    });
    
   

    var element{{$category->id}} = document.getElementById("list-container{{$category->id}}");

    if (element{{$category->id}}.offsetWidth < element{{$category->id}}.scrollWidth)
    {
        $('div#container2{{$category->id}}').hover(
        function () {
          $('div#arrowR{{$category->id}}').fadeIn();
          $('div#arrowL{{$category->id}}').fadeIn();
        }, 
        function () {
          $('div#arrowR{{$category->id}}').fadeOut();
          $('div#arrowL{{$category->id}}').fadeOut();
        }
      );
    }


    
  @endforeach 
    
});
</script>
