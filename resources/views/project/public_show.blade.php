<!DOCTYPE html>
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


 @foreach($categories as $category) 
  <div id = "side_menu" class="dropdown" style="top: {{$category->id*5 + 5}}%; z-index: {{100 - $category->id}};">
  <span>{{$category->name}}</span>
  <div class="dropdown-content">
  @foreach($projects->where("category_id",$category->id) as $project_for_show)
    <a  style="color:#6f7577; border-bottom: none;" href="/project_show/{{$project_for_show->id}}">{{$project_for_show->name}}</a><br>
  @endforeach 
  </div>
  </div>
 @endforeach 
    



    <CENTER><a href="/"><h2 style="margin-top: 20px; color:white; width: 60%;"> <img src={{url("img/logo2.png")}} id="logotipo"></h2></a></CENTER>

      <section id="two" class="main special">
        <div class="container">
          <span class="image fit primary"><img src="{{ url('website/'.$website_information->projects_image)}}" alt="" /></span>
          <div class="content">
            <header class="major">
              <h2>{!!$project->name!!}</h2>
        

              <div class="ol-grid-filters">
              </div>


             <div class="ol-grid masonry col-3 with-gutter  ol-lightbox-gallery">
                @foreach($project->documents as $document) 
                  <!-- #####Begin grid item-->
                <a style="border-bottom: none;" href="{{ url('projects/documents/'.$document->url)}} " class="ol-lightbox">
                  <div class="grid-item cat_{!!$project->category()->id!!}">
                    <div class="gi-wrapper ol-hover hover-2 ol-animate fadeInUp"><img src="{{ url('projects/documents/'.$document->url)}} " alt="image hover">
                    </div>
                  </div>
                  <!-- #####End grid item-->
                  </a>
                 @endforeach 
              </div>


            </header>
            <p>{!!$project->description!!}</p>

            <h2>Otros de la categoría</h2>
              

              <div class="ol-grid-filters">
              </div>

            <div class="ol-grid masonry col-3 with-gutter ol-lightbox-gallery">
            @foreach($projects_in_category as $project_cat) 
              <!-- #####Begin grid item-->
              @if ($project_cat->id != $project->id)
              <a style="border-bottom: none;" href="/project_show/{!!$project_cat->id!!}">
                <div class="grid-item cat_{!!$project_cat->category()->id!!}">
                  <div class="gi-wrapper ol-hover hover-2 ol-animate fadeInUp"><img src="{{ url('projects/'.$project_cat->project_image)}} " alt="image hover">
               
                      
                  </div>
                </div>
              </a>
              @endif
              <!-- #####End grid item-->
             @endforeach 


          </div>
        </div>


  </body>
</html>

  