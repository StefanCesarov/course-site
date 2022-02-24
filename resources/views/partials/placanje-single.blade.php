  <!-- Start latest course section -->
  <section id="mu-latest-courses">
    <div id="how-to-lock" class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="mu-latest-courses-area">
            <!-- Start Title -->
            <div class="mu-title">
              <h2>Get the course</h2>
              <h3 style="color:white"><span><i class="fa fa-money"></i></span> 30-Days Money Back Guarantee <span><i class="fa fa-hourglass"></i></span> Lifetime Access <span><i class="fa fa-clock-o"></i></span> 24/7 Access</h3>

              <h3 style="color:white"><span><i class="fa fa-book"></i></span> Real world skills <span><i class="fa fa-code"></i></span>  Real world projects <span><i class="fa fa-laptop"></i></span> HD content</h3>
            </div>
            <!-- End Title -->
            <!-- Start latest course content -->
            <div class="mu-latest-courses-content">
              <div class="col-lg-8 col-md-8 col-xs-8">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">
                    <a><img src="{{ asset('/storage/site-content/nalog-za-uplatu-single.jpg') }}" alt="img"></a>
                    <figcaption class="mu-latest-course-imgcaption">
                      <a>Course code: <b id="kursID" value="{{ $course->id }}">00{{ $course->id }}</b></a>
                      <span><a>Course price: <b id="cenaID" value="{{ $course->cena_eur }}">{{ $course->cena_eur}} $</b></a></span>
                    </figcaption>
                  </figure>
                </div>
              </div>

              <!-- PayPal proba -->
              <div class="col-lg-4 col-md-4 col-xs-4">
                <div class="mu-latest-course-single">
                  <figure class="mu-latest-course-img">

                  
                  @auth
                  <input type="hidden" id="userID" value="{{ Auth()->user()->id }}">
                  <a><img style="max-height: 190px" src="{{ asset('/storage/site-content/paypal-topic1.png') }}" alt="img"></a>
                  <figcaption class="mu-latest-course-imgcaption">
                        <!-- Include the PayPal JavaScript SDK; replace "test" with your own sandbox Business account app client ID -->
                    <div id="smart-button-container">
                          <div style="text-align: center;">
                            <div id="paypal-button-container"></div>
                          </div>
                        </div>
                        <script src="https://www.paypal.com/sdk/js?client-id=AceP4bDRDPFTeebGK1QyMdch_yIZUSb39JD0w4Q_KLeTE31cpWvMT49hmYSY_1GFyyokXYvkrSIPfG8u&enable-funding=venmo&currency=EUR" data-sdk-integration-source="button-factory"></script>
                      <script>
                        function initPayPalButton() {
                          paypal.Buttons({
                            style: {
                              shape: 'pill',
                              color: 'blue',
                              layout: 'vertical',
                              label: 'paypal',
                              
                            },

                            createOrder: function(data, actions) {
                              let cena = document.getElementById("cenaID").getAttribute("value")
                              return actions.order.create({
                                purchase_units: [{"description":"Pretplata za sajt sce-kursevi.com","amount":{"currency_code":"EUR","value":`${cena}`}}]
                              });
                            },

                            onApprove: function(data, actions) {
                              return actions.order.capture().then(function(orderData) {
                                
                                // Full available details
                                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));

                                // Show a success message within this page, e.g.
                                const element = document.getElementById('paypal-button-container');
                                element.innerHTML = '';
                                element.innerHTML = '<h3>Hvala na uplati! Kurs je sada dostupan! Osvezite stranicu.</h3>';

                                // Or go to another URL:  actions.redirect('thank_you.html');
                                let id = document.getElementById("userID").getAttribute("value");
                                let kursID = document.getElementById("kursID").getAttribute("value")
                                let _token = $('meta[name="csrf-token"]').attr('content');

                                    $.ajax({
                                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                      url: "/preuzimanje-placanje/dodela-prava/pojedinacan-kurs",
                                      type:"POST",
                                      data:{
                                        id:id,
                                        kursID:kursID,
                                      },
                                      success:function(response){
                                        console.log(response);
                                        if(response) {
                                          console.log(response.success);
                                        }
                                      },
                                      error: function(error) {
                                      console.log(error);
                                      }
                                    });
                                
                              });
                            },

                            onError: function(err) {
                              console.log(err);
                            }
                          }).render('#paypal-button-container');
                        }
                        initPayPalButton();
                      </script>

  <!-- PayPal end script -->

                        <a>Cena:</a>
                        <span><a><b>{{ $course->cena_eur }}€</b></a></span>
                    </figcaption>

                  @else
                  <a><img style="max-height: 340px" src="{{ asset('/storage/site-content/paypal-topic.png') }}" alt="img"></a>
                  <figcaption class="mu-latest-course-imgcaption">
                    <a href="{{ route('register') }}" > <b>Register</b>  /&nbsp;</a><a href="{{ route('login') }}" > <b>Login</b>  to pay</a>
                  </figcaption>
    
                  
                  @endauth

               </figure>
    
                </div>
              </div>

              <!-- end PayPal proba -->
            </div>


            <!-- End latest course content -->

          </div>
        </div>
      </div>
    </div>
    <br>
  </section>
  <!-- End latest course section -->