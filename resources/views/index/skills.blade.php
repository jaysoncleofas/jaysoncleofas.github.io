<div class="fluid-container skills_container pb-4">
   <div class="container">
      <section id="skills" class="pt-5 pb-3">
         <h2 class="h2-responsive section-heading text-center pb-2 wow bounceInDown">What i do?</h2>
         <p class="text-center pb-1 wow bounceInDown">Powerful and useful technologies.</p>
         <div class="row">
            <div id="carousel-example-2" class="carousel carousel-example-2 slide carousel-fade" data-ride="carousel">
               <!--/.Controls-->
               <div class="controls-top">
                  <a class="btn-floating wow fadeInLeft" href="#carousel-example-2" data-slide="prev">
                     <i class="fa fa-chevron-left"></i>
                  </a>
                  <a class="btn-floating wow fadeInRight" href="#carousel-example-2" data-slide="next">
                     <i class="fa fa-chevron-right"></i>
                  </a>
               </div>
               <!--Indicators-->
               <ol class="carousel-indicators wow bounceInUp">
                  @foreach( $skills->chunk(8) as $skill )
                  <li data-target="#carousel-example-2" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                  @endforeach
               </ol>
               <!--Slides-->
               <div class="carousel-inner" role="listbox">
                  @foreach( $skills->chunk(8) as $skill )
                  <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                     <div class="row">
                        @foreach( $skill as $data )
                        <div class="col-sm-3 mb-3">
                           <div class="card mt-2">
                              <div class="card-block" style="margin-bottom:0px;">
                                 <div class="form-header indigo">
                                    {{ $data->skill }}
                                 </div>
                                 <div class="card-body">
                                    <div class="view overlay hm-white-light mb-2">
                                       <img class="img-fluid mx-auto" src="{{ asset('images/'. $data->image ) }}" alt="{{ $data->title }}" style="">
                                       <a href="https://www.google.com.ph/search?q={{ $data->skill }}" target="_blank">
                                          <div class="mask"></div>
                                       </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </section>
   </div>
</div>
