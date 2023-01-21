<!-- footer -->
<div class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-3 col-sm-4 col-xs-6">
          <div class="f-title">Site Links</div>
          <ul>
            <li><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('/about-us')}}">About Us</a></li>
            <li><a href="{{url('/blog')}}">Blog</a></li>
            <li><a href="{{url('/application-for-investment')}}">Investment Application</a></li>
            <li><a href="{{url('/application-house-plots')}}">House &amp; Plot Application</a></li>
            <li><a href="{{url('/faq')}}">FAQs</a></li>
            <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
          </ul>
        </div>

        <div class="col-md-5 col-sm-8 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="f-title">Legal</div>
                    <ul>
                        <li><a href="{{url('/terms-conditions')}}">Terms of Service</a></li>
                        <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                        <li><a href="{{route('refund')}}">Refund Policy</a></li>
                        <li><a href="{{url('/complaint-policy')}}">Complaint Policy</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="f-title">Mobile Apps</div>
                    <div class="row sv-apps">
                        <div class="col-md-12 col-sm-12 col-xs-6">
                        <div class="d-app">
                            <a href="https://play.google.com/store/apps/details?id=com.shinnyview.shinnyview" target="_blank">  
                            <img src="{{asset('images/play-store.png')}}" alt="Google Play Store">
                            </a>
                        </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-6">
                        <div class="d-app">
                            <a href="https://apps.apple.com/us/app/shinny-view/id1599870223#?platform=iphone" target="_blank">
                            <img src="{{asset('images/app-store.png')}}" alt="App Store">
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
          <div class="f-title tab-title">Our Offices</div>
          <div class="row">
            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="of-details">
                <div class="o-title">Main Office</div>
                <div class="address">First Floor, Office No 13, VIP Plaza, I-8 Markaz, Islamabad</div>
                <div class="phone-num">051-8744933, 0330-6969698</div>
                <div class="email">www.shinnyview.com, info@shinnyview.com</div>
              </div>
            </div>

            <div class="col-md-12 col-sm-6 col-xs-12">
              <div class="of-details h-office">
                <div class="o-title">Head Office</div>
                <div class="address">6-9 The Square, Stockley Park, UB11 1FW London United Kingdom</div>
                <div class="phone-num">+44 (0) 203 290 2948</div>
                <!--<div class="email">www.shinnyview.co.uk, info@shinnyview.com</div>-->
              </div>
            </div>
          </div>
          
        </div>
        

      </div>
    </div>
  </div>

  <!-- footer nav -->
  <div class="footer-nav">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-8 col-xs-12">
          <div class="copyright">
            <p><i class="fas fa-copyright"></i> 2021 Shinny View Limited. All rights reserved.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="copyright projected" style="text-align: center;">
            <p>Projected By: <a href="http://shinyproxima.com/" target="_blank">Shiny Proxima</a></p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="social-links">
            <ul>
              <li><a href="https://www.facebook.com/ShinnyView.PK" target="_blank"><i class="fab fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/shinnyview" target="_blank"><i class="fab fa-twitter"></i></a></li>
              <li><a href="https://www.instagram.com/shinnyview_official/" target="_blank"><i class="fab fa-instagram"></i></a></li>
              <li><a href="https://www.youtube.com/channel/UC5D93IRh-GQ0m9KzH8sJAnQ" target="_blank"><i class="fab fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>


{{-- <footer class="bg-theme-dark">
    <div class="px-4 px-md-4 px-lg-5 py-5">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="site-intro">
                    <img src="{{asset('images/white-logo.png')}}" width="220px" />
                    <p class="text-white mt-4 mb-0 text-justify pe-xl-5">
                        Shinny View is Pakistan's largest online real estate portal and property website. Shinny View provides high-quality properties like commercial and residential plots, lands, markets, villas, apartments, bungalows, and houses for sale, buy, and rent. We provide high-quality service to buyers, sellers, landlords, and real estate agents in Karachi, Lahore, Islamabad, Rawalpindi, Peshawar, and all over Pakistan.
                    </p>
                </div>
                <div class="mt-4">
                    <a class="text-decoration-none" href="https://www.facebook.com/ShinnyView.PK">
                        <img class="footer-icon" src="{{asset('images/social-icons/facebook.png')}}" alt="">
                    </a>

                    <a class="text-decoration-none" href="https://twitter.com/shinnyview">
                        <img class="footer-icon" src="{{asset('images/social-icons/twitter.png')}}" alt="">
                    </a>

                    <a class="text-decoration-none"  href="https://www.instagram.com/shinnyview_official/">
                        <img class="footer-icon" src="{{asset('images/social-icons/Instagram.png')}}" alt="">
                    </a>

                    <a  class="text-decoration-none" href="https://www.linkedin.com/in/shinny-view-980a89206/">
                        <img class="footer-icon" src="{{asset('images/social-icons/in.png')}}" alt="">
                    </a>
                    <a class="text-decoration-none" href="https://www.youtube.com/channel/UC5D93IRh-GQ0m9KzH8sJAnQ">
                        <img class="footer-new" src="{{asset('images/social-icons/youtube.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 mt-md-0 mt-4">
                <h4 class="txb-color f-bold text-uppercase">Useful Links</h4>
                <ul class="utf-footer-links-item list-unstyled mt-4 mb-0 links-help">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{route('application.invest')}}">Investment Application</a></li>
                    <li><a href="{{route('application.house_plot')}}">House & Plots Application</a></li>
                    <li><a href="{{url('/')}}/blog" target="_blank">Blogs</a></li>
                    <li><a href="{{route('about')}}">About Us</a></li>
                    <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                    <li><a href="{{route('terms.conditions')}}">Terms Conditions </a></li>
                    <li><a href="{{route('contact.us')}}">Contact us</a></li>
                    <li><a href="{{route('faq')}}">FAQ </a></li>
                    <li><a href="{{route('complaint.policy')}}" class="pb-0">Complaint Policy</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mt-md-0 mt-4 ps-xl-5">
                <h4 class="txb-color f-bold">MAIN OFFICE</h4>
                <ul class="utf-footer-links-item address list-unstyled mt-4 mb-0">
                    <li><a href="https://goo.gl/maps/AQodFg21n6ujFGu39" class="mh-105">First Floor, Office No 13, <br />VIP Plaza, <br /> I-8 Markaz,<br /> Islamabad</a></li>
                    <li><a href="mail:info@shinnyview.com"> info@shinnyview.com</a></li>
                    <li><a href="tel:051-2285143">051-8744933 </a></li>
                    <li><a href="tel:0330-6969698">0330-6969698</a></li>
                    <li><a href="{{url('/')}}">www.shinnyview.com</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mt-md-0 mt-4">
               <h4 class="txb-color f-bold">HEAD OFFICE</h4>
                <ul class="utf-footer-links-item address list-unstyled mt-4 mb-0">
                    <li class="mh-105"><a href="https://www.google.com/maps/place/No+6,+Stockley+Park,+9+The+Square,+Hayes,+Uxbridge+UB11+1FW,+UK/@51.5087858,-0.4390975,17z/data=!3m1!4b1!4m5!3m4!1s0x48767270b375ab45:0x23e8ae95ed8578d!8m2!3d51.5087858!4d-0.4369088">
                    6-9 The Square,
                    Stockley Park,<br />
                    UB11 1FW<br /> London <br /> United Kingdom</a></li>
                    <li><a href="mail:info@shinnyview.com"> info@shinnyview.com</a></li>
                    <li><a href="tel:+44 020 3290 2948">+44 (0) 203 290 2948</a></li>
                    <li><a href="www.shinnyview.com">www.shinnyview.co.uk</a></li>
                </ul>
            </div>
        </div>
    </div> --}}

    {{-- <div class="bg-theme py-2 copy-right">
        <div class="container text-center"> --}}
           {{-- <p class="mb-0 f-bold">&copy; <?php echo date("Y"); ?> Shinny View Limited. All rights reserved.</p> --}}
           {{-- <p class="mb-0 f-bold">&copy; 2021 Shinny View Limited. All rights reserved.</p>
        </div>
    </div>
</footer> --}}