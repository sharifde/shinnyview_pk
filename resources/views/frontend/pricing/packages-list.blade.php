@extends('frontend.app')
@section('content')


    <!-- pricing -->
    <div class="pricing main-padding">
        <div class="container">
          <div class="row">
  
            <!-- main heading -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="project-titles">
                <div class="title">Packages Plans</div>
              </div>
            </div>
			  
			{{-- Packages details --}}
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
									<span class="period">/{{ $row->days }}&nbsp;{{ 'Days' }}</span>
								</h6>
								<hr>
								<ul class="fa-ul">
									<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->property }} {{ ' Property Allowed' }}</li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ 'Valid for ' }}{{ $row->days }} {{ 'Days' }}</li>
									<li><span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->picture }} {{ ' Property Pictures Allowed' }}</li>
									<li>
										@if($row->video_link > 0)
										<span class="fa-li"><i class="fas fa-check"></i></span>{{ $row->video_link }} {{ ' Property Videos Link are Allowed' }}
										@else
										<span class="fa-li"><i class="fas fa-times"></i></span>{{ 'Property Videos Link are not Allowed' }}
										@endif
									</li>
									<li>
										@if($row->feature_property > 0)
										<span class="fa-li"><i class="fas fa-check"></i></span>
										{{ $row->feature_property.' Featured Property Allowed' }}
										@else
										<span class="fa-li"><i class="fas fa-times"></i></span>
										{{ 'Featured Property not Allowed' }}
										@endif
									</li>
									<li>
										@if($row->boosted_property > 0)
										<span class="fa-li"><i class="fas fa-check"></i></span>
										{{ $row->feature_property.' Boosted Property Allowed' }}
										@else
										<span class="fa-li"><i class="fas fa-times"></i></span>
										{{ 'Boosted Property not Allowed' }}
										@endif
									</li>
									<li>
										@if($row->option1)
										<span class="fa-li"><i class="fas fa-check"></i></span>
										{{ $row->option1 }}
										@endif
									</li>
									<li>
										@if($row->option2)
										<span class="fa-li"><i class="fas fa-check"></i></span>
										{{ $row->option2 }}
										@endif
									</li>
									<li>
										@if($row->option3)
										<span class="fa-li"><i class="fas fa-check"></i></span>
										{{ $row->option3 }}
										@endif
									</li>
								</ul>
								<a href="<?php if(isset(Auth::user()->id)) { echo route('packages');}else {echo route('login');}?>" class="btn btn-block btn-primary" style="width: 100% !important; background: <?php echo $row->color ?>; <?php if($row->name == 'Free' && isset(Auth::user()->id)) { echo 'display:none';}?>">
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

            {{-- contact us --}}
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="price-contact">
                    <div class="d-btn">
                        <a href="{{route('contact.us')}}" class="btn">Contact Us</a>
                    </div>
                </div>
            </div>
            
  
  
          </div>
        </div>
    </div>

@endsection
