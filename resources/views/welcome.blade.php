@extends('layouts.app')

@section('content')

@section('header_of_landing')


@endsection

<body id="page-top">
    <!-- Navigation-->
    
    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-heading">EVERY ANIMAL NEEDS SHELTER. 
              </div>
            <div class="masthead-heading text-uppercase">Let’s help each other build them a better home.</div>
           <div class="masthead-subheading"> You can chip in with money & effort!</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger"  data-toggle="modal" data-target="#modalDonation">DONATE NOW!</a>

            
        </div>
    </header>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">How to adopt a Pet</h2>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        {{-- <i class="fas fa-circle fa-stack-2x text-primary"></i> --}}
                       <img src="http://petshare1.test/assets/images/adoptPet.png" alt="" height="124" width="124">
                    </span>
                    <h4 class="my-3">Choose A Pet</h4>
                    {{-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> --}}
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <img src="http://petshare1.test/assets/images/booking.png" alt="" height="124" width="124">
                    </span>
                    <h4 class="my-3">Book an appointment for meeting the pet.</h4>
                    {{-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> --}}
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <img src="http://petshare1.test/assets/images/bgcheck.png" alt="" height="124" width="124">
                    </span>
                    <h4 class="my-3">Background Check</h4>
                    {{-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> --}}
                </div>

                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <img src="  http://petshare1.test/assets/images/takecare.png" alt="" height="124" width="124">
                    </span>
                    <h4 class="my-3">Take Care of it.</h4>
                    {{-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p> --}}
                </div>


              
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Bring a new Pet Home.</h2>

                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="/availablepets">ADOPT NOW!</a>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt="" />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Threads</div>
                            <div class="portfolio-caption-subheading text-muted">Illustration</div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Events</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/a1.png" alt=""/></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>Sept. 29 to October 06, 2013</h4>
                            <h4 class="subheading">9th Animal Welfare Week Celebration</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">9th Animal Welfare Week Celebration (Sept. 29 to October 06, 2013) - Bureau of Animal Industry held at Quezon Memorial Circle
                            Theme: "Sa Bansang Progresibo, Pagpapahalaga sa Hayop ay Aktibo"</p></div>
                    </div>
                </li>

                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/a4.png" alt="" /></div>
                    <div class="timeline-panel">
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/a2.png" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>January 2011</h4>
                            <h4 class="subheading">PET PROJECT art exhibit </h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">(Filipinio Artists Realist Movement)</p></div>
                    </div>
                </li>

                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/a3.jpg" alt="" /></div>
                    <div class="timeline-panel">
                </li>

                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/a5.png" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>July 13 2013</h4>
                            <h4 class="subheading">PSPCA Free Mass Anti-Rabies Vaccination
                            </h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">Insert Description</p></div>
                    </div>
                </li>

                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/a6.png" alt="" /></div>
                    <div class="timeline-panel">
                        
                    </div>
                </li>


                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/a7.png" alt="" /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading">
                            <h4>July 13 2013</h4>
                            <h4 class="subheading">By Bust Operation@ San Simon, Pampanga</h4>
                        </div>
                        <div class="timeline-body"><p class="text-muted">Insert Description</p></div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/a8.png" alt="" /></div>
           
                </li>

                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/a9.png" alt="" /></div>
           
                </li>


                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Be Part
                            <br />
                            Of Our
                            <br />
                            Story!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/1.jpg" alt="" />
                        <h4>Kay Garland</h4>
                        <p class="text-muted">Lead Designer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/2.jpg" alt="" />
                        <h4>Larry Parker</h4>
                        <p class="text-muted">Lead Marketer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="assets/img/team/3.jpg" alt="" />
                        <h4>Diana Petersen</h4>
                        <p class="text-muted">Lead Developer</p>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
            
                
            </div>
            
        </div>
    </section>
    <!-- Clients-->
    <section class="page-section" id="client">
    <div class="py-5">
        <div class="container text-center">
            <div class="row">
                {{-- <div class="col-md-12 col-sm-6 my-3">
                    The PSPCA bought a lot in preparation for the construction of a bigger animal shelter. Since the shelter we are using now is the hospital ward, we cannot accommodate all abandoned and rescued animals. We wish to be able to provide a bigger and better home for them but we cannot do this alone. We need your help.
                    <a href="#!"><img class="img-fluid d-block mx-auto" src="." alt="" /></a>
                </div> --}}
               
                    <h2 class="section-heading text-uppercase text-center"> Feedbacks</h2>
               
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/designmodo." alt="" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid d-block mx-auto" src="assets/img/logos/themeforest." alt="" /></a>
                </div>
                <div class="col-md-12 col-sm-12 my-3">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>


                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="assets/img/feedbacks/f1.png" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="assets/img/feedbacks/f2.png" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="assets/img/feedbacks/f3.png" alt="Third slide">
                          </div>

                          <div class="carousel-item ">
                            <img class="d-block w-100" src="assets/img/feedbacks/f4.png" alt="Fourth slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="assets/img/feedbacks/f5.png" alt="Fifth slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="assets/img/feedbacks/f6.png" alt="Sixth slide">
                          </div>

                          <div class="carousel-item">
                            <img class="d-block w-100" src="assets/img/feedbacks/f7.png" alt="Seventh slide">
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
    </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted"></h3>
            </div>
            <h3 class="section-heading text-uppercase"><i class="fas fa fa-map-marker mr-3" style="color:#D31B2E"></i>  C.M. Recto Ave.,Quiapo Manila (In front of UE Recto gate)</h2>
                <h3 class="section-heading text-uppercase"><i class="fas fa fa-phone mr-3" style="color:#D31B2E"></i>(02) 82939698 2044 / 02-7339427</h3>
              
                <h3 class="section-heading text-uppercase"><i class="fas fa fa-paper-plane mr-3" style="color:#D31B2E"></i>phil.spca@gmail.com</h3>  
            </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-right">
                    <a class="mr-3" href="#!">Privacy Policy</a>
                    <a href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Portfolio Modals-->
    <!-- Modal 1-->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="close-modal" data-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="modal-body">
                                <!-- Project Details Go Here-->
                                <h2 class="text-uppercase">Project Name</h2>
                                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/01-full.jpg" alt="" />
                                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                <ul class="list-inline">
                                    <li>Date: January 2020</li>
                                    <li>Client: Threads</li>
                                    <li>Category: Illustration</li>
                                </ul>
                                <button class="btn btn-primary" data-dismiss="modal" type="button">
                                    <i class="fas fa-times mr-1"></i>
                                    Close Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   

</body>
@endsection


 {{--
<style>
   
    #body{
        /* width:400px; */
        background: url('assets/images/landing_page.png')100%;
        background-size: 100% 100%;


    }
    h3,p{
        font-size: 22px;
    }
    h3{
        color: #fdc370;
    }

    @media all (max-width: 500px){
   #body{
        /* width:400px; */
        background: url('assets/images/mobile_landing.png')100%;
        background-repeat: repeat-y;
        background-size: 100% 100%;
             
    }
    img{
        margin: auto;
        height:179.77px;
        width:188.17px;
    }
    h3{
    font-size: 20px;
    }
    #carousel_div{
        /* height:220px;
        width:262px; */
    }
 
}
    

</style>

<div class="box" style="height:2693px;">
    <div class="container-fluid"
        style="margin-top:5%; background-color:black; border-color:black; width: 90%; height:15%;" id="carousel_div">
    
        <div id="carouselExampleIndicators" class="carousel slide " data-ride="carousel" style="padding-top:140px;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                @foreach($contents->take(3) as $content) 
                <div class="carousel-item active">
                <img class="d-block img-fluid" src="assets/images/{{$contents[0]->content_image}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <p>{{$contents[0]->content_title}}</p>
                        <p>{{$contents[0]->content_description}}</p>
                    </div>
                </div>
                {{-- @endforeach --}}
                 {{--<div class="carousel-item">
                    <img class="d-block img-fluid" src="assets/images/{{$contents[1]->content_image}}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <p>{{$contents[1]->content_title}}</p>
                        <p>{{$contents[1]->content_description}}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="assets/images/{{$contents[2]->content_image}}" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <p>{{$contents[2]->content_title}}</p>
                        <p>{{$contents[2]->content_description}}</p>
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
    <div class="container-fluid">
        <p>@csrf</p>
        <div class="row" style="margin-left: 200px; margin-top: 500px;">
            @foreach($contents->slice(3,3) as $content)
            <div class="col-md-3 ml-5" style=" text-center">
            <img src="assets/images/{{$content->content_image}}" alt=""
                    class="img-circle elevation-5 img-fluid ml-5">
                <h3 class="text-center mt-5 ml-4 pr-5">
                    {{$content->content_description}}
                </h3>
            </div>
            @endforeach
            <div class=" col-md-3" style="margin-right:160px;">
                <img src="{{ asset('assets/images/report.png') }}" alt="AdminLTE Logo" height="332px" width="317ppx"
                    class=" img-circle elevation-5 img-fluid">
                <h3 class="text-center mt-5 mr-5 pr-5">
                    REPORT ANIMAL
                    <br> CRUELTY
                    <br> OR
                    <br>RESCUE ANIMALS.
                </h3>
            </div>
            <div class="col-md-3">
                <img src="{{ asset('assets/images/donate.png') }}" alt="AdminLTE Logo" height="332px" width="317ppx"
                    class=" img-circle elevation-5  img-fluid">
                <h3 class="text-center mt-5 mr-5 pr-5">
                    DONATE TO HELP
                    <br> THE ANIMALS.
                </h3>
            </div> 
        </div>
        
    </div>
 
</div>--}}