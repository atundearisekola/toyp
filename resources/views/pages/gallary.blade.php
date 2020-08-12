@extends('welcome')


@section('title')
TOYP
@endsection


@section('body')
<style type="text/css">
  .timer{
    padding: 5px;
    margin: 5px;
    background: lightgreen;
    
  }
</style>
    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in"><b>NOMINATE YOUR 2019 TEN OUTSTANDING YOUNG PERSON OF NIGERIANS</b></div>
           <div class="intro-lead-in">Welcome To Toyp!</div>
          <div class="intro-heading text-uppercase" id="countdown">It's Nice To Meet You</div>
          <span id="logicbtn"></span>
        </div>
      </div>
    </header>

    <!-- Services -->
   

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">GALLERY</h2>
            <h3 class="section-subheading text-muted">Giving the the view of our past activities.</h3>
          </div>
        </div>
        <div class="row">
        @foreach($gals as $gal)

          <div class="col-md-4 col-sm-6 portfolio-item">
            
            
             <a href="javascript:void(0)" onclick="expandimg('{{$gal->picurl}}','{{$gal->caption}}')"> <img class="img-fluid" src={{URL::to("galleries/$gal->picurl")}} alt=""></a>
            
            <div class="portfolio-caption">
              <h4>{{$gal->caption}}</h4>
              
            </div>
          </div>
          @endforeach


         
        </div>
        <div class="row">
          <div class="col-md-12">
            {{$gals->links()}}
          </div>
        </div>

      </div>
    </section>

   

    <!-- Clients 
    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/envato.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/designmodo.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/themeforest.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/creative-market.jpg" alt="">
            </a>
          </div>
        </div>
      </div>
    </section>
-->
    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">Let us know how we can help you and also improve our service delivery.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Toyp 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

  
     <!-- Nominat -->
    <div class=" modal fade" id="nominate" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-12 ">
                <div class="modal-body">
                 <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">2019 JCI TOYP of NIGERIA NOMINATION FORM</h2>
                  <p class="item-intro text-muted">Nomination for the Ten Outstanding Young Persons in Nigeria for 2019.</p>

                  <form action="{{route('nominate')}}" method="post" enctype="multipart/form-data">
                 @csrf


                 <div class="form-group row">
                           
                            <div class="col-md-12">
                            <div class="input-group">
                                   <span class="input-group-addon label-info ">Upload Laundry Picture</span>
                                    <input type="file"  id="laundryimg"  name="laundryimg"  />
                                </div>

                                @if ($errors->has('laundryimg'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('laundryimg') }}</strong>
                                    </span>
                                @endif
                            </div>
                       




 
                           
                            <div class="col-md-12">
                            <h6><label>Name of Nominator</label><sub class="sub">*</sub> </h6>
                            <small>Person nominating</small>
                            <input id="nominator" placeholder="Enter your name" type="text"  class="form-control{{ $errors->has('nominator') ? ' is-invalid' : '' }}" name="nominator" value="{{ old('nominator') }}" required autofocus>
                            <p id="statusnominator"></p>
                                </div>
                                @if ($errors->has('nominator'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nominator') }}</strong>
                                    </span>
                                @endif
                            </div>
                      
                           
                            <div class="col-md-12">
                            <h6><label>Name of Nominee (First Name followed by Last Name)</label><sub class="sub">*</sub> </h6>
                            <small>Person being nominated</small>
                            <input id="nominee" placeholder="Enter nominee name" type="text"  class="form-control{{ $errors->has('nominee') ? ' is-invalid' : '' }}" name="nominee" value="{{ old('nominee') }}" required autofocus>
                            <p id="statusnominee"></p>
                                </div>
                                @if ($errors->has('nominee'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nominee') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                           
                            <div class="col-md-12">
                            <h6><label>Email Address</label><sub class="sub">*</sub> </h6>
                            <small>Nominees' email address ( for correspondence)</small>
                            <input id="nemail" placeholder="Enter nominee email" type="text"  class="form-control{{ $errors->has('nemail') ? ' is-invalid' : '' }}" name="nemail" value="{{ old('nemail') }}" required autofocus>
                            <p id="statusnemail"></p>
                                </div>
                                @if ($errors->has('nemail'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nemail') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="bootstrap-iso">
 
   <div class="col-md-12 col-sm-6 col-xs-12">

    <!-- Form code begins -->
    
      <div class="form-group"> <!-- Date input -->
        <label class="control-label" for="date">Date</label>
        <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
      </div>
     
     <!-- Form code ends --> 

     
 </div>
</div>
     
                       
                           
                            <div class="col-md-12">
                            <h6><label>Occupation</label><sub class="sub">*</sub> </h6>
                            <small>Nominees' current role, Company, and additional information that might be useful</small>
                            <input id="occupation" placeholder="Enter nominee occupation" type="text"  class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" name="occupation" value="{{ old('occupation') }}" required autofocus>
                            <p id="statusoccupation"></p>
                                </div>
                                @if ($errors->has('occupation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('occupation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        

                         
                           
                         

                             <div class="col-md-12">
                            
                                 <h6><label>Nominee Gender *</label><sub class="sub">*</sub> </h6>
                            <small>Choose the nominee gender.</small>
                                <select id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender"  required autofocus>
                                
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                </select> 
                                

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                           
                            <div class="col-md-12">
                            <h6><label>Biography/Citation of the Nominee</label><sub class="sub">*</sub> </h6>
                            <small>You may also drop a URL link (LinkedIn etc)</small>
                            <textarea id="bio" placeholder="Enter nominee biography" type="text"  class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}" name="bio" value="{{ old('bio') }}" required autofocus></textarea>
                            <p id="statusbio"></p>
                                </div>
                                @if ($errors->has('bio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="col-md-12">
                           <input type="submit" name="nominate" value="Nominate" class="btn btn-primary btn-lg btn-block">
                        </div>

    


</form>

                



                
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


     <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="enlarge" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase" id="v"></h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" id="extendimg" src="img/portfolio/01-full.jpg" alt="">
                  <p id="excaption">Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   
 @endsection