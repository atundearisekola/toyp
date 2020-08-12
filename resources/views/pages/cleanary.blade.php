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

      <div class="row">
        <div class="col-md-12">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/logos/1.jpg" alt="First slide">
      <div class="carousel-caption  ">
     <div class="intro-text">
         
           <div class="intro-lead-in">Welcome To Toyp!</div>
          <div class="intro-heading text-uppercase" id="countdown">It's Nice To Meet You</div>
          
        </div>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/logos/1.jpg" alt="Second slide">
      <div class="carousel-caption  ">
     <div class="intro-text">
          <div class="intro-lead-in"><b>NOMINATE YOUR 2019 TEN OUTSTANDING YOUNG PERSON OF NIGERIANS</b></div>
         
        </div>
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/logos/1.jpg" alt="Third slide">
      <div class="carousel-caption ">
     <div class="intro-text">
          
          <div class="intro-heading text-uppercase" id="countdown">It's Nice To Meet You</div>
          <span id="logicbtn"></span>
        </div>
  </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
          
        </div>
      </div>


       
      </div>
    </header>

    <!-- Services -->
    <section id="services">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">CATEGORIES</h2>
            <h3 class="section-subheading text-muted">We have our customer as number one priority.</h3>
          </div>
        </div>
        <div class="row text-center">
          <div class="col-md-4">
           
            <h4 class="service-heading">Business, economic and/or entrepreneurial accomplishment.</h4>
            <p class="text-muted">We aim at providing a technology where all laundry service will be at ease and fun for our customers.</p>
          </div>
          <div class="col-md-4">
            
            <h4 class="service-heading">Political, legal and/or governmental affairs.</h4>
            <p class="text-muted">Providing a system and platform where all laundry transaction can be done online.</p>
          </div>
          <div class="col-md-4">
            
            <h4 class="service-heading">Academic leadership and/or accomplishment.</h4>
            <p class="text-muted">Asuring a reliable and secure laundry service. </p>
          </div>
          <div class="col-md-4">
           <h4 class="service-heading">Cultural achievement.</h4>
            <p class="text-muted">We aim at providing a technology where all laundry service will be at ease and fun for our customers.</p>
          </div>
          <div class="col-md-4">
            
            <h4 class="service-heading">Moral and/or environmental leadership.</h4>
            <p class="text-muted">Providing a system and platform where all laundry transaction can be done online.</p>
          </div>
          <div class="col-md-4">
            
            <h4 class="service-heading">Contribution to children, world peace and/or human rights.</h4>
            <p class="text-muted">Asuring a reliable and secure laundry service. </p>
          </div>
          <div class="col-md-4">
           <h4 class="service-heading">Humanitarian and/or voluntary leadership.</h4>
            <p class="text-muted">We aim at providing a technology where all laundry service will be at ease and fun for our customers.</p>
          </div>
          <div class="col-md-4">
            
            <h4 class="service-heading">Political, legal and/or governmental affairs.</h4>
            <p class="text-muted">Providing a system and platform where all laundry transaction can be done online.</p>
          </div>
          <div class="col-md-4">
            
            <h4 class="service-heading">Academic leadership and/or accomplishment.</h4>
            <p class="text-muted">Asuring a reliable and secure laundry service. </p>
          </div>
        </div>
      </div>
    </section>

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
            
             
              <img class="img-fluid" src={{URL::to("galleries/$gal->picurl")}} alt="">
            
            <div class="portfolio-caption">
              <h5>{{$gal->caption}}</h5>
              
            </div>
          </div>
          @endforeach
         
        </div>
        
      </div>
    </section>
 <!-- About -->
    
                
    <!-- Team -->
   

    <!-- Clients  -->
    <section class="py-5" id="team">
      <div class="container">
       <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">PARTNERS</h2>
            <h3 class="section-subheading text-muted">Our amazing partners in acheiving our aims.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/1.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/2.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/3.png" alt="">
            </a>
          </div>
           <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/4.png" alt="">
            </a>
          </div> <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/5.jpg" alt="">
            </a>
          </div> <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/6.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/7.png" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/8.png" alt="">
            </a>
          </div> <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/9.jpg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/10.gif" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/11.jpeg" alt="">
            </a>
          </div>
          <div class="col-md-3 col-sm-6">
            <a href="#">
              <img class="img-fluid d-block mx-auto" src="img/logos/12.jpeg" alt="">
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">We thank you for your support in acheiving this success.</p>
          </div>
        </div>
      </div>
      </div>
    </section>

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

    <!-- Portfolio Modals -->

    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Laundry Design</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Threads</li>
                    <li>Category: Illustration</li>
                  </ul>
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

    <!-- Modal 2 -->
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Interior & Exterior Design</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Explore</li>
                    <li>Category: Graphic Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 3 -->
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Event Planning</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Finish</li>
                    <li>Category: Identity</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 4 -->
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Product Branding and Packaging</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Lines</li>
                    <li>Category: Branding</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 5 -->
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Web & Software Development</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Southwest</li>
                    <li>Category: Website Design</li>
                  </ul>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Close Project</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal 6 -->
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
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
                  <h2 class="text-uppercase">Photography</h2>
                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                  <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                  <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                  <ul class="list-inline">
                    <li>Date: January 2017</li>
                    <li>Client: Window</li>
                    <li>Category: Photography</li>
                  </ul>
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
                            <h6><label>Category Nominated for *</label><sub class="sub">*</sub> </h6>
                            <small>Choose the best category the persom fit in.</small>
                            <select id="cat"  type="text"  class="form-control{{ $errors->has('cat') ? ' is-invalid' : '' }}" name="cat" value="{{ old('cat') }}" required autofocus>
                            @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{$cat->typename}}</option>
                            @endforeach

                            </select>
                            <p id="statusnominee"></p>
                                </div>
                                @if ($errors->has('nominee'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cat') }}</strong>
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

   
 @endsection