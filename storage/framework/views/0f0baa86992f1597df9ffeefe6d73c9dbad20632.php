<?php
    $route = Route::getCurrentRoute()->getName();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta property="og:image" content="<?php echo e(asset('/')); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="facebook-domain-verification" content="ueh7ruc6taw507dib8zunvavcvb751" />
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(asset('img/fav/apple-touch-icon.png')); ?>" />
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('img/fav/favicon-32x32.png')); ?>" />
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('img/fav/favicon-16x16.png')); ?>" />
        <link rel="manifest" href="<?php echo e(asset('img/fav/site.webmanifest')); ?>" />
        <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
		  

		 <?php if($route == 'sale-properties'): ?>
            <title><?php echo $__env->yieldContent('seo_title'); ?> </title>
            <meta name="description" content="<?php echo $__env->yieldContent('seo_description'); ?>">
            <!--<meta name="keywords" content="<?php echo $__env->yieldContent('seo_keywords'); ?>">-->
            <meta property="og:locale" content="en_US" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php echo $__env->yieldContent('seo_title'); ?>" />
            <meta property="og:description" content="<?php echo $__env->yieldContent('seo_description'); ?>" />
            <meta property="og:url" content="<?php echo $__env->yieldContent('seo_url'); ?>" />
            <meta property="og:site_name" content="shinnyview.com" />
            <meta property="og:image" content="<?php echo $__env->yieldContent('seo_image'); ?>" />
            <meta name="twitter:card" content="summary_large_image" />
        <?php endif; ?>
		
		 <?php if($route == 'rent-properties'): ?>
            <title><?php echo $__env->yieldContent('seo_title'); ?> </title>
            <meta name="description" content="<?php echo $__env->yieldContent('seo_description'); ?>">
            <!--<meta name="keywords" content="<?php echo $__env->yieldContent('seo_keywords'); ?>">-->
            <meta property="og:locale" content="en_US" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php echo $__env->yieldContent('seo_title'); ?>" />
            <meta property="og:description" content="<?php echo $__env->yieldContent('seo_description'); ?>" />
            <meta property="og:url" content="<?php echo $__env->yieldContent('seo_url'); ?>" />
            <meta property="og:site_name" content="shinnyview.com" />
            <meta property="og:image" content="<?php echo $__env->yieldContent('seo_image'); ?>" />
            <meta name="twitter:card" content="summary_large_image" />
        <?php endif; ?>
		
		<?php if($route == 'lease-properties'): ?>
            <title><?php echo $__env->yieldContent('seo_title'); ?> </title>
            <meta name="description" content="<?php echo $__env->yieldContent('seo_description'); ?>">
            <!--<meta name="keywords" content="<?php echo $__env->yieldContent('seo_keywords'); ?>">-->
            <meta property="og:locale" content="en_US" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php echo $__env->yieldContent('seo_title'); ?>" />
            <meta property="og:description" content="<?php echo $__env->yieldContent('seo_description'); ?>" />
            <meta property="og:url" content="<?php echo $__env->yieldContent('seo_url'); ?>" />
            <meta property="og:site_name" content="shinnyview.com" />
            <meta property="og:image" content="<?php echo $__env->yieldContent('seo_image'); ?>" />
            <meta name="twitter:card" content="summary_large_image" />
        <?php endif; ?>
		
		 <?php if($route == 'type-properties'): ?>
            <title><?php echo $__env->yieldContent('seo_title'); ?> </title>
            <meta name="description" content="<?php echo $__env->yieldContent('seo_description'); ?>">
            <!--<meta name="keywords" content="<?php echo $__env->yieldContent('seo_keywords'); ?>">-->
            <meta property="og:locale" content="en_US" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php echo $__env->yieldContent('seo_title'); ?>" />
            <meta property="og:description" content="<?php echo $__env->yieldContent('seo_description'); ?>" />
            <meta property="og:url" content="<?php echo $__env->yieldContent('seo_url'); ?>" />
            <meta property="og:site_name" content="shinnyview.com" />
            <meta property="og:image" content="<?php echo $__env->yieldContent('seo_image'); ?>" />
            <meta name="twitter:card" content="summary_large_image" />
        <?php endif; ?>
        
      		
		 <?php if($route == 'city-properties'): ?>
            <title><?php echo $__env->yieldContent('seo_title'); ?> </title>
            <meta name="description" content="<?php echo $__env->yieldContent('seo_description'); ?>">
            <!--<meta name="keywords" content="<?php echo $__env->yieldContent('seo_keywords'); ?>">-->
            <meta property="og:locale" content="en_US" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php echo $__env->yieldContent('seo_title'); ?>" />
            <meta property="og:description" content="<?php echo $__env->yieldContent('seo_description'); ?>" />
            <meta property="og:url" content="<?php echo $__env->yieldContent('seo_url'); ?>" />
            <meta property="og:site_name" content="shinnyview.com" />
            <meta property="og:image" content="<?php echo $__env->yieldContent('seo_image'); ?>" />
            <meta name="twitter:card" content="summary_large_image" />
        <?php endif; ?>
		
		 <?php if($route == 'for-sale'): ?>
            <title><?php echo $__env->yieldContent('seo_title'); ?> </title>
            <meta name="description" content="<?php echo $__env->yieldContent('seo_description'); ?>">
            <!--<meta name="keywords" content="<?php echo $__env->yieldContent('seo_keywords'); ?>">-->
            <meta property="og:locale" content="en_US" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php echo $__env->yieldContent('seo_title'); ?>" />
            <meta property="og:description" content="<?php echo $__env->yieldContent('seo_description'); ?>" />
            <meta property="og:url" content="<?php echo $__env->yieldContent('seo_url'); ?>" />
            <meta property="og:site_name" content="shinnyview.com" />
            <meta property="og:image" content="<?php echo $__env->yieldContent('seo_image'); ?>" />
            <meta name="twitter:card" content="summary_large_image" />
        <?php endif; ?>
    
        <?php if($route == 'view-property'): ?>
            <title><?php echo $__env->yieldContent('seo_title'); ?> </title>
            <meta name="description" content="<?php echo $__env->yieldContent('seo_description'); ?>">
            <!--<meta name="keywords" content="<?php echo $__env->yieldContent('seo_keywords'); ?>">-->
            <meta property="og:locale" content="en_US" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php echo $__env->yieldContent('seo_title'); ?>" />
            <meta property="og:description" content="<?php echo $__env->yieldContent('seo_description'); ?>" />
            <meta property="og:url" content="<?php echo $__env->yieldContent('seo_url'); ?>" />
            <meta property="og:site_name" content="shinnyview.com" />
            <meta property="og:image" content="<?php echo $__env->yieldContent('seo_image'); ?>" />
            <meta name="twitter:card" content="summary_large_image" />
        <?php endif; ?>
		 <?php if($route == 'properties-listing'): ?>
            <title><?php echo $__env->yieldContent('seo_title'); ?> </title>
            <meta name="description" content="<?php echo $__env->yieldContent('seo_description'); ?>">
            <!--<meta name="keywords" content="<?php echo $__env->yieldContent('seo_keywords'); ?>">-->
            <meta property="og:locale" content="en_US" />
            <meta property="og:type" content="website" />
            <meta property="og:title" content="<?php echo $__env->yieldContent('seo_title'); ?>" />
            <meta property="og:description" content="<?php echo $__env->yieldContent('seo_description'); ?>" />
            <meta property="og:url" content="<?php echo $__env->yieldContent('seo_url'); ?>" />
            <meta property="og:site_name" content="shinnyview.com" />
            <meta property="og:image" content="<?php echo $__env->yieldContent('seo_image'); ?>" />
            <meta name="twitter:card" content="summary_large_image" />
        <?php endif; ?>
		
		 <?php if($route != 'view-property'): ?>    
            <title><?php echo e(isset($title) ? $title  :  "Shinnyview.com is Pakistan's Best Property Website."); ?> </title>
            <meta name="description" content=<?php echo e(isset($description) ? $description :"Shinnyview.com is Pakistan's Best Property Website, Allowing You to Buy, Rent, and Sell Properties across Pakistan."); ?>>
        <?php endif; ?>
		
        <link rel="alternate" hreflang="x-default" href="https://www.shinnyview.com/"/>
        <link rel="alternate" hreflang="en-pk" href="https://www.shinnyview.com/"/>
        <link rel="alternate" hreflang="ur-pk" href="https://www.shinnyview.com/"/>
        <link rel="stylesheet" href="<?php echo e(asset('libraries/bootstrap/bootstrap.min.css?v=1')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/main.css?v='.time())); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/responsive.css?v='.time())); ?>" />
        <script src="<?php echo e(asset('libraries/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('libraries/bootstrap/bootstrap.bundle.js')); ?>"></script>
        <script src="<?php echo e(asset('js/app.js?v=2')); ?>"></script>
	  <!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '579555880316053');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=579555880316053&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
        <link href="<?php echo e(asset('libraries/select2/select2.min.css')); ?>" rel="stylesheet" />
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <?php echo $__env->yieldPushContent('css'); ?>
        
        <link rel="icon" type="image/x-icon" href="img/favicon-16x16.png">
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('css/all.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
	  <link rel="stylesheet" href="<?php echo e(asset('css/external-style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('libraries/select2/select2.min.css')); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
        
        <?php echo \Livewire\Livewire::styles(); ?>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-190366535-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-190366535-1');
        </script>
        <script type="application/ld+json">
            {"@context":"https://schema.org","@type":"Organization","name":
            "Shinny View","description":"Shinny View, Pakistan's best property portal | Pakistan's best real estate website | No.1 Property Portal in Pakistan | best property portal in Pakistan.
            We provide high-quality service to buyers, sellers,
            landlords, and real estate 
            agents in Karachi, Lahore, Islamabad, Rawalpindi, Peshawar, and all over Pakistan. Shinny View provides high-quality properties like commercial and residential plots, lands, markets, villas, apartments, bungalows, and houses for sale, buy, and rent.
            "
             ,"url":"https://shinnyview.com","sameAs":
            ["https://www.instagram.com/shinnyview_official",
            "https://www.facebook.com/ShinnyView.PK",
            "https://twitter.com/shinnyview",
            "https://www.pinterest.com/shinny_view/",
            "https://www.youtube.com/channel/UCISLz0PnooSqUirtFnbP6AA"],
            "telephone":"+92 330 6969698","foundingDate":"2021",
            "image":
            {"@type":"ImageObject","url":"https://www.shinnyview.com/images/logo.png"},
            "logo":{"@type":"ImageObject","url":"https://www.shinnyview.com/images/logo.png"},"address":
            {"@type":"PostalAddress",
            "streetAddress":"First Floor, Office No 13,
            VIP Plaza,
            I-8 Markaz","addressLocality":"Islamabad","addressRegion":"Federal",
            "postalCode":"44000","addressCountry":{"@type":"Country","name":"Pakistan"}}}
        </script>

        <style type="text/css">
            .mobile-nav {
                display: none;
                background: #1A1102;
                position: absolute;
                z-index: 100000;
                width: 100%;
                height: 100%;
                top: 0;
            }
            .mobile-nav--head {
                margin-left: 25px;
                margin-top: 20px;
                margin-bottom: 30px;
            }
            .m-header--btn {
                display: inline-block;
                background: #685029;
                color: #FFF5E6 !important;
                padding: 10px 40px;
                font-size: 16px;
                cursor: pointer;
                text-decoration: none !important;
                transition: all .2s ease-in;
                border-radius: 100px;
            }
            .m-header--btn:hover {
                background: #413017;
            }
            .m-header--close {
                display: inline-block;
                float: right;
                margin-right: 30px;
                font-size: 28px;
                cursor: pointer;
                transition: all .2s ease-in;
                color: #A28B67;
            }
            .m-header--close:hover {
                color: #FFF5E6;
            }
            .mobile-nav ul > li > a {
                font-size: 18px;
                color: #A28B67;
                padding: 10px 0;
                padding-left: 25px;
                display: block;
                transition: all .2s ease-in;
            }
            .mobile-nav ul > li > a:hover {
                text-decoration: none;
                background: #685029;
                color: #FFF5E6;
            }

            .m-nav-cta {
                display: none;
                position: absolute;
                right: 20px;
                top: 10px;
                font-size: 24px;
            }

            .header .logo a img {
                /* width: 100%; */
                margin: 5px;
            }

            @media (max-width: 768px) {
                .m-nav-cta {
                    display: block;
                }
                .header {
                    height: 55px;
                }
                .header .logo {
                    margin-top: 7px;
                }
            }

            

        </style>
<style>
.mySlides {display:none;}
</style>
    </head>
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XBT05VCYLH"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-XBT05VCYLH');
</script>
    <body>
        <div class="main-app-wrap">
            <?php echo $__env->make('frontend.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            
            <div class="d-whatsapp-icon">
                <a href="https://api.whatsapp.com/send?phone=923306969698" target="_blank">
                    <i class="bi bi-whatsapp"></i>
                </a>
            </div>
            <?php echo $__env->make('frontend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>        
        <script src="<?php echo e(asset('libraries/select2/select2.min.js')); ?>"></script>
        <script src="<?php echo e(asset('libraries/jquery-validations/validate.js')); ?>"></script>
        <script src="<?php echo e(asset('libraries/jquery-validations/additional.min.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('libraries/sweet-alert/sweet_alert.min.js')); ?>"></script>
        
	  <script>
				var myIndex = 0;
				carousel();

				function carousel() {
				  var i;
				  var x = document.getElementsByClassName("mySlides");
				  for (i = 0; i < x.length; i++) {
					x[i].style.display = "none";  
				  }
				  myIndex++;
				  if (myIndex > x.length) {myIndex = 1}    
				  x[myIndex-1].style.display = "block";  
				  setTimeout(carousel, 5000); // Change image every 2 seconds
				}
		</script>
        <?php echo \Livewire\Livewire::scripts(); ?>

        <?php echo $__env->yieldPushContent('js'); ?>

        <!-- Google Tag Manager -->
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-N6Z5MCS');
        </script>
        <!-- End Google Tag Manager -->

        <script>
            window.livewire_app_url="<?php echo e(url('/')); ?>";
            $(document).ready(function(){
                // mobile header
                $('.header .burger-menu .icon').on('click', function(){
                    $('.header .burger-menu .mb-items').slideToggle('fast');
                });

                $('.m-nav-cta').on('click', function() {
                    $('.mobile-nav').show();
                });

                $('.m-header--close').on('click', function() {
                    $('.mobile-nav').hide();
                });

                //----------- select search Start -------------------
                    $('.search-select').select2({
                    width: 'resolve'
                    });
                    // hide icon
                    $('b[role="presentation"]').hide();
                //----------- select search End -------------------

                });

                // sticky header
                $(window).scroll(function() {
                    var scrollPos = $(this).scrollTop();
                    if(scrollPos > 100) {
                    $('.header').addClass('sticky');
                    } else {
                    $('.header').removeClass('sticky');
                    }
                });
        </script>
    </body>
</html><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/frontend/app.blade.php ENDPATH**/ ?>