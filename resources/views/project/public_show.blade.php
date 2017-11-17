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
<html lang="en" dir="ltr" itemscope itemtype="http://schema.org/WebPage">
  <!-- #####Begin head-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- globalise scripting and styling content language-->
    <meta name="Content-Type-Script" content="text/javascript">
    <meta name="Content-Type-Style" content="text/css">
    <!-- author of this doc-->
    <meta name="author" content="owwwlab.com">
    <!-- ################################-->
    <!-- #### add SEO metadata here-->
    <!-- ################################-->
    <!-- #####Begin styles-->
    <!-- stylesheets	-->

    <link href="{{ asset('css/vendors/vendors.css') }}" rel="stylesheet" type="text/css">
    
    <!-- Load extra page specific css-->
    <!-- Overwrite vendors-->
    <link href="{{ asset('css/vendors/vendors-overwrites.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    <!-- #####End styles-->
    <!-- #####Begin JS-->
    <!-- add your scripts to the end of the page for sake of page load speed-->
    <!-- scripts that need to be at head section-->
    <script src="{{ asset('js/vendors/jquery.min.js') }}"></script>
    <!-- #####End JS-->
    <!-- #####Begin load google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700&amp;subset=latin,greek,cyrillic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Sintony:400,700&amp;subset=latin,greek,cyrillic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400,400italic,700,700italic&amp;subset=latin,greek,cyrillic" rel="stylesheet" type="text/css">
    <!-- #####End load google fonts-->
    <!-- #####End load google fonts-->
    <title>Game Theory</title>
  </head>
  <!-- #####End head-->
  <body class="fullwidth sticky-header">
    <div id="wrapper" class="regular-layout">
      <!-- #####Begin Header-->
      <header id="header" class="dark trans"> 
        <!-- #####Begin header main area-->
        <div class="head-main">
          <div class="container">
            <!-- #####Begin logo wrapper-->
            <center>
             <a href="/"><img src="{{ url('img/logo/logo-dark.png') }}" alt="CHAOS HTML Template" style="margin-top: 15px; margin-bottom: 15px;"></a>
            </center>

          </div>
        </div>
        <!-- #####End header main area-->
      </header>
      <!-- #####End Header-->
      <!-- #####Begin contents-->
      <section id="contents">
        <!-- #####Begin page head-->
        <div class="page-head parallax-layer ov-dark-alpha-95 h-200 dark" data-img-src="{{ url('img/backgrounds/50.jpg') }}" data-parallax-mode="mode-title">
          <div class="container">
            <div class="tb-vcenter-wrapper">
              <div class="title-wrapper vcenter parallax-layer" data-parallax-mode="mode-header-content">
                <h1 class="title">{!!$project->name!!}</h1>
              </div>
            </div>
          </div>
        </div>
        <!-- #####End page head
        -->
        <section class="page-contents">
          <!-- #####Begin main area-->
          <section id="main-area">
            <section class="section">
              <div class="container">
                <div class="row">
                  <div class="col-md-12" style="margin-top: -100px;">
                    <!-- #####Begin carousel-->
                    <center>
                      <img src="{{ url('projects/'.$project->project_image)}} " alt="image hover">
                    </center>
                    <!-- #####End carousel-->
                  </div>
                  <div class="col-md-12" style="margin-top: 100px;">
                    <h6 class="with-underline">Project Details</h6>
                    <p>{!!$project->description!!}</p>
                    <hr>
                    <div class="col-lg-6">
                      <dl class="description-item">
                      <dt>Documents</dt>
                      Download the documents related to this project here<br>
                      @foreach ($project->documents as $document)
                          <a href="/projects/documents/{!!$document->url!!}" target="_blank">{!!$document->url!!}</a>
                      @endforeach
                    </dl>
                      
                    </div>
                    <!-- #####End description metas-->
                    <div class="col-lg-6">
                    <dl class="description-item">
                        <dt>Category</dt>
                        {!!$project->category()->name!!}
                        <dt>Link to experiment demo</dt>
                        <a href="http://{!!$project->link_to_experiment_demo!!}" target="_blank">{!!$project->link_to_experiment_demo!!}</a>
                        <dt>Link to user demo</dt>
                        <a href="http://{!!$project->link_to_user_demo!!}" target="_blank">{!!$project->link_to_user_demo!!}</a>
                      </dl>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </section>
          <!-- #####End main area
          -->

        </section>
      </section>




          <!-- #####Begin main area-->
          <section id="main-area" style="margin-bottom: 50px;">
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                  

                  
      <h1>Others form category</h1>
       <div class="ol-grid masonry col-3 with-gutter">
            @foreach($projects_in_category as $project_cat) 
              <!-- #####Begin grid item-->
              @if ($project_cat->id != $project->id)
                <div class="grid-item cat_{!!$project_cat->category()->id!!}">
                  <div class="gi-wrapper ol-hover hover-2 ol-animate fadeInUp"><img src="{{ url('projects/'.$project_cat->project_image)}} " alt="image hover">
                    <div class="ol-overlay ov-dark-alpha-80"></div>
                    <div class="icons"><a href="{{ url('projects/'.$project_cat->project_image) }} " class="ol-lightbox"><i class="oli oli-search"></i></a><a href="/project_show/{!!$project_cat->id!!}"><i class="oli oli-right"></i></a></div>
                    <h3 class="title"><a href="/project_show/{{$project_cat->id}}">{!!$project_cat->name!!}</a></h3>
                  </div>
                </div>
              @endif
              <!-- #####End grid item-->
             @endforeach 

          </div>  
            </div>
          </div>
        </div>
            </section>
            


      <!-- #####End contents-->
      <!-- #####Begin footer-->
	<footer id="footer" class="dark-wrapper">
        <div id="footer-main">
          <div class="container">
            <div class="center-logo text-center"><a href="#top" class="scrollToTop img"><img src="{{ url('img/logo/logo-sq-dark.png') }}" alt="CHAOS HTML Template"></a></div>
            <div class="sp-blank-10"></div>
            <div class="row">
              <div class="col-sm-6 vcenter">
                <div class="copyright">ETH - GAME THEORY 2017.</div><br>
                <a href="http://{!!$website_information->about_website_url!!}" target="_blank">{!!$website_information->about_website_title!!}</a><br>
                <a href="http://{!!$website_information->about_website_url2!!}" target="_blank">{!!$website_information->about_website_title2!!}</a>
              </div>
              <div class="col-sm-6 vcenter text-right">
                {!!$website_information->contact_email!!}<br>
                {!!$website_information->contact_email2!!}<br>
                {!!$website_information->contact_phone!!}<br>
                {!!$website_information->contact_address!!}<br>
              </div>
            </div>
          </div>
        </div>
      </footer>
      <!-- #####End footer-->
    </div>
    <!-- #####Begin scripts-->
    <script src="{{ asset('js/vendors/vendors.js') }} "></script>
    <!-- Local Revolution tools-->
    <!-- Only for local and can be removed on server-->
    <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="http://localhost:35729/livereload.js"></script>
    <!-- #####End scripts-->
  </body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  
  //Click event to scroll to top
  $('.scrollToTop').click(function(){
    $('html, body').animate({scrollTop : 0},800);
    return false;
  });
  
});
</script>