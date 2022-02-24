@extends('layouts.app-course')
@section('content')

 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>COURSE</h2>
           <ol class="breadcrumb">
            <li><h2>{{ $course->naziv }}</h2></li>  
            <li class="active">COURSE CONTENT</li>          
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->
 <section id="mu-course-content">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-course-details">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mu-latest-course-single">
                        <figure class="mu-latest-course-img">
                          <a href="#"><img src="{{ asset('/storage/Course/'.$course->putanja_slike) }}" alt="img"></a>
                        </figure>
                        <div class="mu-latest-course-single-content">
                          <h3>{{ $course->opis_naziva }}</h3>
                      @if($course->besplatan == 1)
                      <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">Attend</button></a>
                      @else
                          @auth
                        @if(auth()->user()->haveAcces())
                        <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">Attend</button></a>
                        @elseif(auth()->user()->hasCourse($course->id))
                        <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">Attend</button></a>
                        @else
                          <a href="#mu-latest-courses"><button class="mu-download-btn">Buy Now</button></a>
                          <button class="price-btn">
                          @if($course->cena_eur == 0)
                         free 
                      @else    
                        @if ($course->cena_eur > 30)
                          {{ $course->cena_eur }}$
                        @else
                          {{ $course->cena_eur }}$ <s>{{ $course->cena_eur  * 5}}$</s>
                        @endif
                      @endif
                          </button>
                          <span><span><i class="fa fa-money"></i></span> 30-Days Money Back Guarantee <span><i class="fa fa-hourglass"></i></span> Lifetime Access <span><i class="fa fa-clock-o"></i></span> 24/7 Access</span>

                        @endif
                      @else
                          <a href="#mu-latest-courses"><button class="mu-download-btn">Buy Now</button></a>
                          <button class="price-btn">
                          @if($course->cena_eur == 0)
                         free 
                          @else    
                            @if ($course->cena_eur > 30)
                              {{ $course->cena_eur }}$
                            @else
                              {{ $course->cena_eur }}$ <s>{{ $course->cena_eur  * 5}}$</s>
                            @endif
                          @endif
                          </button>
                          <h3><span><i class="fa fa-money"></i></span> 30-Days Money Back Guarantee <span><i class="fa fa-hourglass"></i></span> Lifetime Access <span><i class="fa fa-clock-o"></i></span> 24/7 Access</h3>
                          
                      @endauth
                      @endif
                                            
                          <h4>Basic informations</h4>
                          <ul>
                            <li> <span>Language:</span> <span>{{ $course->language['name']}}</span></li>
                            <li> <span>Hours:</span> <span>{{ $course->sati_sadrzaja }}</span></li>
                            <li> <span>Lectures:</span> <span>{{ $course->broj_lekcija }}</span></li>
                            <li> <span>Created/Updated at:</span> <span>{{ $course->kreirano_dana}}</span></li>
                            <li> <span>Content size:</span> <span>{{ $course->velicina_materijala }}</span></li>
                            <li> <span>Course language:</span> <span>{{ $course->jezik}}</span></li>
                            <li> <span>Requirements:</span> <span>{{ $course->polazno_znanje}}</span></li>
                            <li> <span>Course is for:</span> <span >{{ $course->namenjen}}</span></li>
                          </ul>
                          <h4>What you'll learn</h4>
                          <p>{!! $course->kratak_sadrzaj !!}</p>
                          <h4>Description</h4>
                          <p>{!! $course->opis !!}</p>
                          
                        </div>
                        @if($course->besplatan == 1)
                      <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">ATTEND</button></a>
                      @else
                        @auth
                        @if(auth()->user()->haveAcces())
                        <a  href="{{ $course->sync_link }}" target="_blank" style="margin-left: 15px;"><button  class="mu-download-btn">ATTEND</button></a>
                        @elseif(auth()->user()->hasCourse($course->id))
                        <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">ATTEND</button></a>
                        @else
                          <a href="#mu-latest-courses" style="margin-left: 15px;color:ForestGreen;" ><button class="mu-download-btn">Buy Now</button></a>
                        @endif
                      @else
                          <a href="#mu-latest-courses" style="margin-left: 15px;color:ForestGreen;"><button class="mu-download-btn">Buy Now</button></a>
                      @endauth
                      @endif
                      </div> 
                    </div>                                   
                  </div>
                </div>
                <!-- end course content container -->
              </div>
              @include('partials.sidebar-learn')
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- dodato -->
 @include('partials.placanje-single')
@endsection
