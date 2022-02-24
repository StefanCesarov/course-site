@extends('layouts.app-course')
@section('content')

<section id="mu-course-content">
    <div class="container">
    <div class="mu-title">
      <h2 class='cust-content-title'>{{ $getFramework->name}} Courses</h2>
    </div>
    <div class="row">
       <div class="col-md-12">
         <div class="mu-course-content-area">
            <div class="row">
              <div class="col-md-9">
                <!-- start course content container -->
                <div class="mu-course-container mu-blog-archive">
                  <div class="row">
                @foreach($courses as $course)
                @if($loop->iteration % 2 == 0)
                <div class="row">
                @endif
                <div class="col-md-6 col-sm-6"> 
                  <article class="mu-blog-single-item">
                    <figure class="mu-blog-single-img">
                      <a href="{{ route('single-course-show', $course->id) }}" target="_blank"><img src="{{ asset('/storage/Course/'.$course->putanja_slike) }}" alt="img"></a>
                      <figcaption class="mu-blog-caption">
                        <h3><a href="{{ route('single-course-show', $course->id) }}">{{ $course->naziv }}</a></h3>
                      </figcaption>                      
                    </figure>
                    <div class="mu-blog-meta">
                    <a><b>{{ $course->broj_lekcija }}</b> Lectures</a>
                      <a><span><i class="fa fa-clock-o"></i><b>{{ $course->sati_sadrzaja}}</b>Hours </span></a>
                          <button class="mu-language-btn" >{{ $course->language['name'] }}</button>
                          </span></a><span class="price">
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
                      <p>{{ $course->opis_naziva }}</p>
                      <a class="mu-read-more-btn" href="{{ route('single-course-show', $course->id) }}" target="_blank">Read more</a>
                      @if($course->besplatan == 1)
                      <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">ATTEND</button></a>
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
                @if($loop->iteration % 2 == 0)
                </div>
                @endif
                @endforeach
                  </div>
                </div>

                {{ $courses->links() }}
                <!-- end course content container -->
              </div>
              @include('partials.sidebar-learn')
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

@endsection