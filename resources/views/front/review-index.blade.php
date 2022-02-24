@extends('layouts.app-course')
@section('content')

<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-page-breadcrumb-area">
           <h2>Describe the experience</h2>
           <ol class="breadcrumb">
            <li><a href="#">Reviews</a></li>            
            <li class="active">Your experience is valuable to us!</li>
          </ol>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End breadcrumb -->

 <!-- Start contact  -->
 <section id="mu-contact">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="mu-contact-area">
          <!-- start title -->
          <div class="mu-title">
            <h2>Write a Review!</h2>
            <p>Share your experience while following the courses, in order to continue with the continuous improvement of the service!</p>
          </div>
          <!-- end title -->
          <!-- start contact content -->
          <div class="mu-contact-content">           
            <div class="row">
              <div class="col-md-6">
                <div class="mu-contact-left">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                    @auth
                  <form class="contactform" action="{{route('review.create') }}" method ='POST'>  
                  @csrf
                  <p class="comment-form-author">
                      <label for="author">Name <span class="required">*</span></label>
                      <input type="text" value="{{ Auth()->user()->name }}" required size="30" value="" name="author">
                    </p>                
                      <p class="comment-form-url">
                      <label for="subject">Title <span class="required">*</span></label>
                      <input type="text" required name="subject">  
                    </p>
                    <p class="comment-form-comment">
                      <label for="comment">Comment <span class="required">*</span></label>
                      <textarea required="required" required rows="8" cols="65" name="comment"></textarea>
                    </p>                
                    <p class="form-submit">
                    <button type="submit" name="submit" class="mu-post-btn">Send
                    </button>
                    </p>        
                  </form>
                  @else
                  <h1>Please login to write review!</h1>
                  @endauth
                </div>
              </div>
              <div class="col-md-6">
                <div class="mu-contact-right">
                <img src="{{ asset('/storage/site-content/REVIEWslika.jpg') }}" width="100%" height="100%"></img>
                </div>
              </div>
            </div>
          </div>
          <!-- end contact content -->
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- End contact  -->
 

@endsection