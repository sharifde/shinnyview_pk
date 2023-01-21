@extends('frontend.app')
@section('content')


    <!-- pricing -->
    <div class="pricing main-padding">
        <div class="container">
          <div class="row">
  
            <!-- main heading -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="project-titles">
                <div class="title">Advert Plans</div>
              </div>
            </div>
			  
            {{-- Advert details --}}
			<div class="container">
		         <div class="row pricing">
					@php
					 $count = 0;
					 @endphp
					@foreach($plans as $key=> $row)
					 @php $count++; @endphp
					 @if($count == 4)
					 	<hr style="margin-top: 20px">
					 @endif
					<div class="col-lg-4 mb_30">
						<div class="card mb-5 mb-lg-0">
							<div class="card-body">
								<h5 class="card-title text-muted text-uppercase text-center" style="color: <?php echo $row->color ?> !important">{{ $row->name }}</h5>
								<h6 class="card-price text-center">
									Rs {{ $row->price }}
									<span class="period">/{{ $row->days }}{{ 'Days' }}</span>
								</h6>
								<hr>
								<ul class="fa-ul">
									<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ 'Valid for ' }}{{ $row->days }} {{ 'Days' }}</li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ 'Size: ' }}{{ $row->size }} </li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->design_name.': ' }}{{ $row->design_price }} </li>
								</ul>
								<a href="{{route('packages')}}" class="btn btn-block btn-primary" style="width: 100% !important; background: <?php echo $row->color ?>;">
									@if($row->name == 'Free')
									{{ 'Enroll Now' }}
									@else
									{{ 'Buy Now' }}
									@endif
								</a>
							</div>
						</div>
					</div>
					@endforeach

		</div>
	</div>
			 
            <!-- main heading -->
            <!--<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="project-titles branch-title">
                  <div class="title">Buy Plan</div>
                </div>
            </div>-->

            {{-- bank details --}}
           <!-- <div class="bank-details">
                {{-- meezan bank --}}
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="price b-shadow">
                        <div class="top-title">
                            <div class="title"><img src="{{asset('public')}}/images/meezan-bank.png" alt="meezan-bank"></div>
                        </div>
                        <div class="price-info">
                            <ul>
                                <li><i class="bi bi-check"></i> Account No: 03030106534465</li>
                                <li><i class="bi bi-check"></i> Name: Shinnyview SMC PVT LTD</li>
                                <li><i class="bi bi-check"></i> Branch Code: (0303)</li>
                                <li><i class="bi bi-check"></i> Branch: F-7 Jinnah Supermarket-ISD</li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- easypasa --}}
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="price b-shadow">
                        <div class="top-title">
                            <div class="title"><img src="{{asset('public')}}/images/easypasa.png" alt="easypasa"></div>
                        </div>
                        <div class="price-info">
                            <ul>
                                <li><i class="bi bi-check"></i> Account No: 0330 69 69 69 8</li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- instruction --}}
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="price b-shadow">
                        <div class="top-title">
                            <div class="title">Instruction for Payment</div>
                        </div>
                        <div class="price-info">
                            <ul>
                                <li><i class="bi bi-check"></i> Transfer Actual Amount into our Business Account of Meezan Bank and EasyPasa Account</li>
                                <li><i class="bi bi-check"></i> Take a screenshot of the completed transaction</li>
                                <li><i class="bi bi-check"></i> WhatsApp the screenshot to: <a href="//api.whatsapp.com/send?phone=03306969698" target="_blank">03306969698</a></li>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
-->
            {{-- contact us --}}
            <!--<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="price-contact">
                    <div class="d-btn">
                        <a href="{{route('contact.us')}}" class="btn">Contact Us</a>
                    </div>
                </div>
            </div>-->
            
  
  
          </div>
        </div>
    </div>

@endsection


@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function(){
    //     // show popup
    //     $('.pricing .price .price-info ul li a.show-popup').on('click', function(){
    //             $('.price-popup').css('display','block');
    //     });
    //     // hide popup
    //     $('.popup .popup-content .icon').on('click', function(){
    //             $('.price-popup').css('display','none');
    //     });
    //     $('.popup .overlay').on('click', function(){
    //             $('.price-popup').css('display','none');
    //     });
        
    // });
</script>
@endpush