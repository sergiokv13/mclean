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

    @if(Auth::user() != null)

      <div style="text-align: center; background-color: white; width: 50%;margin:auto;">
        Usted inicio sesión como {{Auth::user()->name}}. <br> <a href="/scaffold-dashboard">Ir al dashboard.</a>
      </div> 

    @endif
    <!-- Header -->
      <section id="header">
        <header class="major"> 
          <img src={{url("img/logo.png")}}>
          <a href="#one" class="goto-next scrolly"><p style="margin-top: -40px;">{!!$website_information->welcome_text!!}</p></a>
        </header>
      </section>

    <!-- One -->
      <section id="one" class="main special">
        <div class="container">
          <span class="image fit primary"><img src="{{ url('website/'.$website_information->about_image) }}" alt="" /></span>
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
          <span class="image fit primary"><img src="{{ url('website/'.$website_information->menu_image) }}" alt="" /></span>
          <div class="content">
            <header class="major">
              <h2>Mapa del sitio</h2>
            </header>
            <ul class="icons-grid">
              <li>
                <a href="#header" class="scrolly" style="color:#6f7577;"> <span class="icon major fa-home"></span></a>
                INICIO
              </li>
              <li>
                <a href="#three" class="scrolly" style="color:#6f7577;"> <span class="icon major fa-pencil"></span></a>
                PROYECTOS
              </li>
              <li>
                <a href="#team" class="scrolly" style="color:#6f7577;"> <span class="icon major fa-users"></span></a>
                EQUIPO
              </li>
              <li>
                <a href="#footer" class="scrolly" style="color:#6f7577;"> <span class="icon major fa-envelope-open-o"></span></a>
                CONTACTO
              </li>
            </ul>
          </div>
          <a href="#three" class="goto-next scrolly">Next</a>
        </div>
      </section>

    <!-- Three -->
      <section id="three" class="main special">
        <div class="container">
          <span class="image fit primary"><img src="{{ url('website/'.$website_information->projects_image)}}" alt="" /></span>
          <div class="content" style="vertical-align: baseline !important;">
            <header class="major">
              <h2>Proyectos</h2>
            </header>
            <p>{!!$website_information->projects_text!!}</p>
            <div class="ol-grid-filters">
              <ul class="default-filters">
                <li class="active"><a style="border-bottom: none;" href="#" data-filter="*">Todos</a></li>
                @foreach($categories as $category) 
                  <li><a style="border-bottom: none;" href="#" data-filter=".cat_{!!$category->id!!}">{!!$category->name!!}</a></li>
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


             <div class="ol-grid masonry col-3 with-gutter">
                @foreach($projects as $project) 
                  <!-- #####Begin grid item-->
                  <div class="grid-item cat_{!!$project->category()->id!!}">
                    <div class="gi-wrapper ol-hover hover-2 ol-animate fadeInUp"><img src="{{ url('projects/'.$project->project_image)}} " alt="image hover">
                      <div class="ol-overlay ov-dark-alpha-80"></div>
                      <div class="icons"><a style="border-bottom: none;" href="{{ url('projects/'.$project->project_image) }} " class="ol-lightbox"><i class="fa fa-search"></i></a><a style="border-bottom: none;" href="/project_show/{!!$project->id!!}"><i class="fa fa-arrow-right"></i></a></div>
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
          <span class="image fit primary"><img src="{{ url('website/'.$website_information->team_image) }}" alt="" /></span>
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
                                <div class="team-hover">
                                    <div class="desk">
                                        <h4>{{$team_member->welcome_title}}</h4>
                                        <p>{{$team_member->about_team_member}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="team-title">
                                <h5>{{$team_member->name}}</h5>
                                <span>{{$team_member->position}}</span>
                            </div>
                        </div>

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
         
          <ul class="icons">
            <li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
            <li><a href="#" class="icon alt fa-linkedin"><span class="label">Linkedin</span></a></li>
          </ul>

           <div class="copyright" style="margin-bottom: 30px;">
           <span><i class= "fa fa-envelope-o" ></i> {{$website_information->contact_email}} </span><br><br>
            <span><i class= "fa fa-phone" ></i> {{$website_information->contact_phone}}</span><br><br>
            <span><i class= "fa fa-mobile" ></i> {{$website_information->contact_phone2}}</span><br><br>
            <span><i class= "fa fa-map-pin" ></i> {{$website_information->address}}</span>
          </div>

          <ul class="copyright">
            <li>&copy; Maclean 2017</li><li>Development andDesign: <a href="www.expansesoft.com">Expanse Software</a></li><li>Images and videos: <a href="https://www.facebook.com/picture.contenidos/?timeline_context_item_type=intro_card_work&timeline_context_item_source=550169723&pnref=lhc">Picture</a></li>
          </ul>
        </footer>
      </section>

    <!-- Scripts -->
      



  </body>

</html>
