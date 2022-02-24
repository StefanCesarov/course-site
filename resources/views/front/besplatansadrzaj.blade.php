@extends('layouts.app-course')
@section('content')
 <!-- Page breadcrumb -->
 <section id="mu-page-breadcrumb" style="background-image: url({{ asset('/storage/site-content/code_background.png') }})">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
             <br>
           <h2>BESPLATAN MATERIJAL</h2>
           <ol class="breadcrumb">
            <li><h2>Započnite kurseve, savladajte potrebe osnove za programiranje</h2></li>  
    
          </ol>
          <br>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->


  <!-- Start from blog -->
  <section id="mu-from-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-from-blog-area">
            <!-- start title -->
            <div class="mu-title">
              <h2>Kursevi iz ponude</h2>
              <p>Kompletno besplatni kursevi i besplatni delovi kurseva</p>
            </div>
            <!-- end title -->  
            
            <!-- start from blog content   -->
            <div class="mu-from-blog-content">
              <div class="row">
              @foreach($courses as $course)
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
                      <a ><b>{{ $course->broj_lekcija }}</b> Lekcija</a>
                      <a><span><i class="fa fa-clock-o"></i><b>{{ $course->sati_sadrzaja}}</b> Sati </span></a>
                      <a href="{{ route('course-language', $course->language['slug']) }}"><span class="mu-language-btn" >{{ $course->language['name'] }}</span></a><span class="price">
                      @if($course->cena_eur == 0)
                         besplatan 
                      @else  
                          {{ $course->cena_rsd }}RSD
                        @endif
                      </span>
                    </div>
                    <div class="mu-blog-description">
                      <p>{{ Str::limit($course->opis_naziva, 87) }}</p>
                      <a class="mu-read-more-btn" href="{{ route('single-course-show', $course->id) }}" target="_blank">Saznaj više</a>
                      @if($course->besplatan == 1)
                      <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">Preuzmi</button></a>
                      @elseif($course->intro)
                      <a href="{{ $course->intro }}" target="_blank"><button class="mu-download-btn">ZAPOČNITE</button></a>              
                      @else
                      @auth
                        @if(auth()->user()->haveAcces())
                        <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">Preuzmi</button></a>
                        @elseif(auth()->user()->hasCourse($course->id))
                        <a href="{{ $course->sync_link }}" target="_blank"><button class="mu-download-btn">Preuzmi</button></a>
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
  
            <!-- end from blog content   -->

  </section>

   



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
