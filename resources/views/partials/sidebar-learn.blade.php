<div class="col-md-3">
                <!-- start sidebar -->
                <aside class="mu-sidebar">
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Learn language</h3>
                    <ul class="mu-sidebar-catg  mu-sidebar-archives">
                    @foreach($languages as $language)
                      <li><a href="{{ route('course-language', $language->slug) }}">{{ $language->name }}</a></li>
                    @endforeach
                    </ul>
                  </div>
                  <!-- end single sidebar -->
                 
                  <!-- start single sidebar -->
                  <div class="mu-single-sidebar">
                    <h3>Learn framework</h3>
                    <ul class="mu-sidebar-catg mu-sidebar-archives">
                      @foreach($frameworks as $framework)  
                      <li><a href="{{ route('course-framework', $framework->name) }}">{{ $framework->name }}</a></li>
                      @endforeach
                    </ul>
                  </div>
                  <!-- end single sidebar -->
                  <!-- start single sidebar -->

                  <!-- end single sidebar -->
                </aside>
                <!-- / end sidebar -->
</div>