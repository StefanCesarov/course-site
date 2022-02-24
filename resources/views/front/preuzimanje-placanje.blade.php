@extends('layouts.app-course')
@section('content')


  <!-- Start latest course section -->
  @include('partials.placanje')

   <!-- Start about us -->
   <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>Preuzimanje i praćenje kurseva</h2>              
                  </div>
                  <!-- End Title -->
                  <p>Preuzimanje kurseva je veoma jednostavno. <b>Kliknite na dugme 'Preuzmi'</b> nakon otključavanja koje će vas odvesti do materijala za preuzimanje. Klikom na detalji kursa možete detaljnije pogledati sadržaj kursa, šta kurs sve obuhvata kao i sve ostale potrebne informacije. Pored toga navedeni su podaci o veličini materijala koji se preuzima. Takođe svaki kurs sadrži i link ka kursu na Udemy platformi koji zapravo preuzimate. Za praćenje kurseva, kao i za programiranje uopšte, potrebno je osnovno znanje engleskog jezika.</p>
                  <p>Koraci:</p>
                  <ul>
                    <li>Preuzimanje torrent fajla.</li>
                    <li>Preuzimanje celokupnog materija.</li>
                    <li>Preuzti materijal će sadržati forldere sa podlekcijama, koje sadrže titlovane video tutorijale, titlove možete čak prevesti i na srpski, link ka github sekciji kursa, ostali propratni materijal za praćenje kursa.</li>
                    <li><b>Kako bi uspešno savladali veštine najbolje je da ponovite svaki korak koji vidite na tutorijalu, odnosno da prateći tutorijal pravite aplikaciju.</b></li>
                    <li>Pređite kurs, savladajte potrebne veštine i počnite da zarađujete!</li>
                  </ul>
                  <p>Za bilo kakva pitanja možete nas kontaktirati putem maila sce.kursevi@gmail.com</p>
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
            <!--Kako pronaci odgovarajuci kurs-->
            <div class="row" style="padding-top: 20px">
              <div class="col-lg-10 col-md-10">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h2>Kako pronaći pravi kurs</h2>
                  </div>
                  <p>Pravi kurs programiranja možete pronaći najpre na osnovu ličnih preferenci. Možete razmisliti da li ste neko ko je perfekcionista i više obraća pažnju na estetiku i detalje, u tom slučaju svakako neki od <b>frontend kurseva</b> bi bio pravo rešenje za vas. </p>
                  <p>Ukoliko ste skloniji logici i orijentisani ka funkionalnostima odnosno bitnija vam je suština od forme, svako ste više <b>backend</b> tip programera. </p>   
                  <p>Naravno tu je i treća opcija - <b>fullstack</b>, ukoliko imate široke aspekte interesovanja, važno vam je sagledavanje kompletne slike, bitna vam je i forma i suština, fullstack je pun pogodak. Naravno fullstack programeri su i najtraženiji s obzirom da svaki poslodavac, bilo to firma, klijent ili neko drugi, pre svega želi jednu osobu koja može da mu pokrije što više različitih poslovnih i tehničhik zahteva.</p>
                  <p>Neki od praktičnih saveta:</p>
                  <ul>
                    <li><b>Istražite oglase</b> za IT poslove. U footeru sajta možete pronaći sajtove za oglašavanje</li>
                    <li>Pogledajte <b>koje programerske veštine su najtraženije.</b></li>
                    <li>Ukoliko vas interesuje WEB programiranje, orijentišite se ka framework kursevima programiranja.</li>
                    <li>Razmislite o odnosu vaših interesovanja i zahteva tržišta, na osnovu toga donesite najbolju odluku.</li>
                    <li><b>Ukoliko vam programiranje nije interesantno</b> a vaš motiv je isključivo <b>što brža i veća zarada</b>, najbolje da se fokusirate na front-end framework React ili Angular, uz osnovno prelaženje JavaScript-a, HTML-a i CSS-a, a za čije savladavanje možete koristiti i web sajt <a href="https://www.w3schools.com/" target="_blanck">w3schools.com</a>. Intenzivnijim radom možete savladati ove veštine čak i za mesec dana.</li>
                    <li>Istražite freelacne ponudu poslova, gde takođe možete unovčiti stečena znanja.</li>
                    <li>Pređite kurseve, savladajte potrebne veštine i počnite da zarađujete!</li>
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
    </div>
  </section>
  <!-- End about us -->

@endsection