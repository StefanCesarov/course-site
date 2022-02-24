@extends('layouts.app-course')
@section('content')
  <!-- Start Slider -->
  <section id="mu-slider">
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="{{ asset('/storage/site-content/lines-of-code.jpg') }}" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Wellcome!</h4>
        <span></span>
        <h2>Learn to code online!</h2>
        <p>Master programming skills quickly and easily from the comfort of your home with professional video tutorials.</p>
      </div>
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="{{ asset('/storage/site-content/programiranjeSlideSlika.jpg') }}" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Best world courses!</h4>
        <span></span>
        <h2>Beginner and advanced courses</h2>
        <p>Top offer of programming courses. 50+ courses, programming, SQL, Web Design.</p>
      </div>
    </div>
    <!-- Start single slider item -->
    <!-- Start single slider item -->
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="{{ asset('/storage/site-content/programming-code-script-late-night.jpg') }}" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>Quick skills mastering!</h4>
        <span></span>
        <h2>Build your portfolio</h2>
        <p>Whether you prefer backend or front-end programming, you're in the right place.</p>
      </div>
    </div>
    <!-- Start single slider item -->    
  </section>
  <!-- End Slider -->
  <!-- Start service  -->
  <section id="mu-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-service-area">
            <!-- Start single service -->
            <div class="mu-service-single">
              <h3>Backend courses</h3>
              <p>The site offers a rich offer of backend courses as well as frameworks for backend programming. Explore different programming languages.</p>
              <a href="{{ route('backend-courses') }}" class="mu-read-more-btn">Read More</a>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
                 <h3>Fullstack courses</h3>
              <p>Great story for those who want a complete picture of web application development. Gain the necessary skills to develop a complete website/application.</p>
              <a href="{{ route('fullstack-courses') }}" class="mu-read-more-btn">Read More</a>
            </div>
            <!-- Start single service -->
            <!-- Start single service -->
            <div class="mu-service-single">
              <h3>Front-End courses</h3>
              <p>Learn front-end programming with modern JavaScript frameworks. If you are oriented towards aesthetics and details, you are in the right place.</p>
              <a href="{{ route('frontend-courses') }}" class="mu-read-more-btn">Read More</a>
            </div>
            <!-- Start single service -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End service  -->

  <!-- Start from blog -->
  <section id="mu-from-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-from-blog-area">
            <!-- start title -->
            <div class="mu-title">
              <h2>Our Courses</h2>
              <p>Professional coding courses. Now you can Build real-world applications.</p>
            </div>
            <!-- end title -->  
            
            <!-- start from blog content   -->
            <div class="mu-from-blog-content">
              <div class="row">
              @foreach($courses->sortBy('naziv') as $course)
                @if($loop->iteration % 3 == 0)
                <div class="row">
                @endif
                <div class="col-md-4 col-sm-4"> 
                   <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                      <a href="{{ route('single-course-show', $course->id) }}" target="_blank"><img src="{{ asset('/storage/Course/'.$course->putanja_slike) }}" alt="img"></a>
                      <figcaption class="mu-blog-caption">
                        <h3><a href="{{ route('single-course-show', $course->id) }}">{{ $course->naziv }}</a></h3>
                      </figcaption>                      
                    </figure>
                    <div class="mu-blog-meta">
                      <a ><b>{{ $course->broj_lekcija }}</b> Lectures</a>
                      <a><span><i class="fa fa-clock-o"></i><b>{{ $course->sati_sadrzaja}}</b>Hours </span></a>
                      <a href="{{ route('course-language', $course->language['slug']) }}"><span class="mu-language-btn" >{{ $course->language['name'] }}</span></a><span class="price">
                      @if($course->cena_eur == 0)
                         free 
                      @else    
                        @if ($course->cena_eur > 30)
                          {{ $course->cena_eur }}$
                        @else
                          {{ $course->cena_eur }}$ <s>{{ $course->cena_eur  * 5}}$</s>
                        @endif
                      @endif
                      </span>
                    </div>
                    <div class="mu-blog-description">
                      <p>{{ Str::limit($course->opis_naziva, 87) }}</p>
                      <a class="mu-read-more-btn" href="{{ route('single-course-show', $course->id) }}" target="_blank">Read more</a>
                      @if($course->besplatan == 1)
                      <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">ATTEND</button></a>
                      @elseif($course->intro)
                      <a href="{{ $course->intro }}" target="_blank"><button class="mu-download-btn">ZAPOČNITE</button></a>              
                      @else
                      @auth
                        @if(auth()->user()->haveAcces())
                        <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">ATTEND</button></a>
                        @elseif(auth()->user()->hasCourse($course->id))
                        <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">ATTEND</button></a>
                        @endif
                      @endauth
                      @endif
                    </div>
                  </article>
                </div>
                @if($loop->iteration % 3 == 0)
                </div>
                @endif
                @endforeach
              </div>
            </div>     
            {{ $courses->links() }}
            <!-- end from blog content   -->
            <!--
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
            <div class="col-lg-4 col-md-4 col-sm-4"></div>
            <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="mu-abtus-counter-single">
                  <span style="display: inline-block;font-size: 50px; color:#5891ff" class="fa fa-book"></span>
                  <h4 style="font-size: 40px;font-weight: bold;margin-bottom: 5px;margin-top: 20px;" class="counter">94</h4>
                  <p style="font-size: 18px;text-transform: uppercase;">Kurseva</p>
                </div>
              </div>   -->
              <!-- End counter item -->
              <!-- Start counter item -->
              <!--
              <div class="col-lg-2 col-md-4 col-sm-4">
                <div class="mu-abtus-counter-single">
                  <span style="display: inline-block;font-size: 50px; color:forestgreen;" class="fa fa-users"></span>
                  <h4 style="font-size: 40px;font-weight: bold;margin-bottom: 5px;margin-top: 20px;" class="counter">{{
                    $users_no + 214}}</h4>
                  <p style="font-size: 18px;text-transform: uppercase;">Polaznika</p>
                </div>
              </div>
                  -->
          </div>
        </div>
      </div>
    </div>
    <!--
    <div style="text-align: center;">
    <div style="display:inline-block;margin-right:10px;"class="mu-abtus-counter-single">
        <span style="display: inline-block;font-size: 50px; color:#5891ff" class="fa fa-book"></span>
          <h4 style="font-size: 40px;font-weight: bold;margin-bottom: 5px;margin-top: 20px;" class="counter">94</h4>
            <p style="font-size: 18px;text-transform: uppercase;">Kurseva</p>

      </div>
            <div style="display:inline-block;" class="mu-abtus-counter-single">
                  <span style="display: inline-block;font-size: 50px; color:forestgreen;" class="fa fa-users"></span>
                  <h4 style="font-size: 40px;font-weight: bold;margin-bottom: 5px;margin-top: 20px;" class="counter">{{
                    $users_no + 214}}</h4>
                  <p style="font-size: 18px;text-transform: uppercase;">Polaznika</p>
                </div>
    </div>
                  -->
  </section>
    <!-- Start about us counter 
    <h2 style="text-align: center;">BROJEVI KOJI GOVORE O NAMA</h2>-->

     <!-- Start about us -->
  <section id="mu-about-us" style="background-image: url({{ asset('/storage/site-content/whiteBackground.jpg')}})">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>ABOUT US</h2>              
                  </div>
                  <!-- End Title -->
                  <p>When we started Codecademy, our goal was to give anyone in the world the ability to learn the skills they’d need to succeed in the 21st century. We set out to create a new, interactive way of learning — making it engaging, flexible, and accessible for as many people as possible. Since then, we have helped millions of people worldwide unlock modern technical skills and reach their full potential through code</p>
                  <br>
                  <p>We want to create a world where anyone can build something meaningful with technology, and everyone has the learning tools, resources, and opportunities to do so. Code contains a world of possibilities — all that’s required is the curiosity and drive to learn. At Codecademy, we are committed to empowering all people, regardless of where they are in their coding journeys, to continue to learn, grow, and make an impact on the world around them.</p>
                </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class=""> 
                 <video width="600"   height="440"  controls>
                  <source src="{{ asset('/storage/site-content/finalReklama.mp4') }}" type="video/mp4">
                  Your browser does not support the video tag.
                </video>  
                                 
              <!-- <img src="{{ asset('/storage/site-content/slikaSajtIndex.png') }}" alt="img" style="width: 100%"> -->
                </div>
              </div>
            </div>
                  <!-- End Title -->            
            <!-- end kako pronaci pravi kurs-->
          </div>
        </div>
      </div>

                    
  <section id="mu-abtus-counter">

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="mu-abtus-counter-area">
        <div class="row">
          <!-- Start counter item -->
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="mu-abtus-counter-single">
              <span style="color:#5891ff" class="fa fa-book"></span>
              <h4 class="counter">{{ $broj_kurseva }}</h4>
              <p>Courses</p>
            </div>
          </div>
          <!-- End counter item -->
          <!-- Start counter item -->
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="mu-abtus-counter-single">
              <span style="color:forestgreen" class="fa fa-users"></span>
              <h4 class="counter">{{$users_no + 220}}</h4>
              <p>Students</p>
            </div>
          </div>
          <!-- End counter item -->
          <!-- Start counter item -->
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="mu-abtus-counter-single">
              <span style="color:#D41400" class="fa fa-clock-o"></span>
              <h4 class="counter">{{ $sati_sadrzaja }}</h4>
              <p>Hours of content</p>
            </div>
          </div>
          <!-- End counter item -->
          <!-- Start counter item -->
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="mu-abtus-counter-single no-border">
              <span style="color: #FF4500" class="fa fa-laptop"></span>
              <h4 class="counter">{{ $broj_lekcija }}</h4>
              <p>Lectures</p>
            </div>
          </div>
          <!-- End counter item -->
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<!-- End about us counter -->

      
  </section>
  <!-- End about us -->

  <!-- End from blog -->
  <!-- Start latest course section -->
  @include('partials.placanje')
  <!-- End latest course section -->

 
   <!-- Start about us -->
   <section id="mu-about-us" style="background-image: url({{ asset('/storage/site-content/whiteBackground.jpg')}})">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
         <div class="row">

            <!--Kako pronaci odgovarajuci kurs-->
            <div class="row" style="padding-top: 20px">
              <div class="col-lg-10 col-md-10">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>FIND THE COURSE FOR YOU</h2>
                  </div>
                  <p>You can find the right programming course first based on personal preferences. You can consider whether you are someone who is a perfectionist and pays more attention to aesthetics and details, in which case one of the <b>frontend courses</b> would be the right solution for you. </p>
                  <p> If you are more logical and oriented towards functionalities, that is, the essence is more important to you than the form, you are more of a <b> backend </b> type of programmer. </p>
                  <p> Of course, there is a third option - <b> fullstack </b>, if you have broad aspects of interest, it is important to see the complete picture, the form and essence are important to you, fullstack is a complete hit. Of course, fullstack developers are also the most sought after, considering that every employer, be it a company, a client or someone else, primarily wants one person who can cover as many different business and technical requirements as possible. </p>
                  <p>Practical tips:</p>
                  <ul>
                    <li>Explore jobs</li>
                    <li> See which programming skills are most in demand. </li>
                    <li> If you are interested in WEB programming, orient yourself to framework programming courses. </li>
                    <li> Think about the relationship between your interests and market demands, and make the best decision based on that. </li>
                    <li> Take courses, master the necessary skills and start earning! </li>
                    <li> <b>Please feel free to contact us!</b> </li>
                  </ul>
                </div>
                </div>
              </div>
            </div> 
                  <!-- End Title -->            
            <!-- end kako pronaci pravi kurs-->
          </div>
        </div>
      </div>
  </section>
  <!-- End about us -->



  <!-- dodato review -->
  <!-- Start testimonial -->
  <section id="mu-testimonial"style="background-image: url({{ asset('/storage/site-content/160-1605661_reviewing-code.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-testimonial-area">
            <div id="mu-testimonial-slide" class="mu-testimonial-content">
            @foreach($reviews as $review)
            <!-- start testimonial single item -->
              <div class="mu-testimonial-item">
                <div class="mu-testimonial-quote">
                  <blockquote>
                    <p>{{ $review->komentar }}</p>
                  </blockquote>
                </div>
                <div class="mu-testimonial-info">
                  <h4>{{ $review->naslov }}</h4>
                  <span>{{ $review->user['name'] }}</span>
                </div>
              </div>
              <!-- end testimonial single item -->
            @endforeach
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End testimonial -->





@endsection
