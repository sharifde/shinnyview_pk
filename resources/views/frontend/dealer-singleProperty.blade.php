@php

    use \App\Http\Controllers\globalC;
@endphp

@extends('frontend.app')

@section('content')

    <!-- dealer single -->
    <div class="dealer-single property-single main-padding">
        <div class="container">
          <div class="row">
              

  
            <!-- left details -->
            <div class="col-md-4 col-sm-4 col-xs-12">
               <div class="right-details">
  
                <!-- Dealer -->
                <div class="p-dealer quick-actions r-default b-shadow">
                  <div class="title">Dealer</div>
                  <div class="office-name">{{ $dealer->company }}</div>
                  <div class="d-name">{{ $dealer->name }}</div>
                  <a href="//api.whatsapp.com/send?phone={{$dealer->number}}" title="{{$dealer->number}}" target="_blank" class="whatsapp">
                    <i class="fab fa-whatsapp"></i> Contact Seller
                  </a>
                  <a href="mailto:{{ $dealer->email }}" title="{{ $dealer->email }}" class="email">
                    <i class="fas fa-comment-dots"></i> Send Email
                  </a>
                  <div class="mention">Mention <span>shinnyview.com</span> when Call or Message to get a good deal.</div>
                </div>
  
                <!-- share -->
                <div class="prop-share r-default b-shadow">
                  <div class="title">Share this Dealer</div>
                  <ul>
                    <li>
                        <a href="https://facebook.com/sharer/sharer.php/?u={{ urlencode(url()->full())}}" target="_blank"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/share/?url={{ urlencode(url()->full())}}" target="_blank"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="https://wa.me/?text={{ url()->full()}}" target="_blank"><i class="fab fa-whatsapp"></i></a>
                    </li>
                  </ul>
                </div>
  
  
                <!-- google ad -->
                <div class="google-add">
                  <img src="{{asset(images/ad.png')}}" alt="google Ad">
                </div>
  
              </div>
            </div>
  
            <!-- right details -->
            <div class="col-md-8 col-sm-8 col-xs-12">
               <div class="left-details">
                
                <!-- tabs  -->
                <div class="dealer-tabs b-shadow">
                  <button class="active show-all">All ({{$all_properties}})</button>
                  <button class="show-boosted">Boosted ({{$boosted_properties}})</button>
                  <button class="show-featured">Featured ({{$featured_properties}})</button>
                </div>
  
                <!-- all-properties -->
                <div class="dealer-all-properties">
                  <!-- detail card -->
                  @foreach ($dealer_properties as $dp)
                    <div class="detail-card default-card">
                        <a href="{{ route('view-property',['ptype' => $dp->propertyType, 'stype' => $dp->purpose,'city' => $dp->city,'id' => $dp->id,'slug' => $dp->slug]) }}" class=" b-shadow">
                            <div class="image">
                                <img src="{{asset(properties/gallery/'.$dp->image)}}" alt="shinnyview product" />
                                @if($dp->featured == 1)
                                    <div class="feature-d p-feature" @if($dp->boost == 1) style="left: 115px;" @endif><i class="fas fa-trophy"></i> Featured</div>
                                @endif
                                @if($dp->boost == 1)
                                    <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div>
                                @endif
                            </div>
                            <div class="ot-details">
                                <div class="p-info">
                                    <div class="p-type p-house">House for Sale</div>
                                    <div class="price">PKR: {{convertCurrency($dp->price)}}</div>
                                    <div class="title">{{$dp->name}}</div>
                                    <div class="b-info">{{$dp->city?$dp->city:''}}</div>
                                    <div class="additional-info">
                                        <div class="a-features" @if(empty($dp->bedroom)) style="width: 80%;" @endif title="{{ $dp->size }} {{ $dp->area }}"><i class="fas fa-vector-square"></i> <span>{{ $dp->size }}  {{ $dp->area }}</span></div>
                                        @if($dp->bedroom)
                                            <div class="a-features"><i class="fas fa-bed"></i> {{$dp->bedroom}} Bed</div>
                                        @endif
                                        @if($dp->bath)
                                            <div class="a-features"><i class="fas fa-bath"></i> {{$dp->bath}} Bath</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a>  
                    </div>
                  @endforeach
                    {{-- pagination --}}
                  <div class="pagination-default">
                    {{ $dealer_properties->links() }}
                  </div>

                </div>
  
                <!-- boosted-properties -->
                <div class="dealer-boosted-properties d-none">
                  <!-- detail card -->
                  @if ($boosted_properties != 0)
                    @foreach ($d_boosted_properties as $dbp)
                        <div class="detail-card default-card">
                            <a href="{{ route('view-property',['ptype' => $dbp->propertyType, 'stype' => $dbp->purpose,'city' => $dbp->city,'id' => $dbp->id,'slug' => $dbp->slug]) }}" class=" b-shadow">
                                <div class="image">
                                    <img src="{{asset(properties/gallery/'.$dbp->image)}}" alt="shinnyview product" />
                                    <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div>
                                </div>
                                <div class="ot-details">
                                    <div class="p-info">
                                        <div class="p-type p-house">House for Sale</div>
                                        <div class="price">PKR: {{convertCurrency($dbp->price)}}</div>
                                        <div class="title">{{$dbp->name}}</div>
                                        <div class="b-info">{{$dbp->city?$dbp->city:''}}</div>
                                        <div class="additional-info">
                                            <div class="a-features" @if(empty($dbp->bedroom)) style="width: 80%;" @endif title="{{ $dbp->size }} {{ $dbp->area }}"><i class="fas fa-vector-square"></i> <span>{{ $dbp->size }}  {{ $dbp->area }}</span></div>
                                            @if($dbp->bedroom)
                                                <div class="a-features"><i class="fas fa-bed"></i> {{$dbp->bedroom}} Bed</div>
                                            @endif
                                            @if($dbp->bath)
                                                <div class="a-features"><i class="fas fa-bath"></i> {{$dbp->bath}} Bath</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>  
                        </div>
                    @endforeach
                  @else
                    <div class="p-empty b-shadow">No <span>Boosted Property</span> Found.</div>
                  @endif
  
  
                  {{-- <div class="d-btn view-more-btn">
                    <button class="btn">View More</button>
                  </div> --}}
                </div>
  
                <!-- featured-properties -->
                <div class="dealer-featured-properties d-none">
                  <!-- detail card -->
                  @if ($featured_properties != 0)
                      
                    @foreach ($d_featured_properties as $dfp)
                        <div class="detail-card default-card">
                            <a href="{{ route('view-property',['ptype' => $dfp->propertyType, 'stype' => $dfp->purpose,'city' => $dfp->city,'id' => $dfp->id,'slug' => $dfp->slug]) }}" class=" b-shadow">
                                <div class="image">
                                    <img src="{{asset(properties/gallery/'.$dfp->image)}}" alt="shinnyview product" />
                                    <div class="feature-d p-feature"><i class="fas fa-trophy"></i> Featured</div>
                                </div>
                                <div class="ot-details">
                                    <div class="p-info">
                                        <div class="p-type p-house">House for Sale</div>
                                        <div class="price">PKR: {{convertCurrency($dfp->price)}}</div>
                                        <div class="title">{{$dfp->name}}</div>
                                        <div class="b-info">{{$dfp->city?$dfp->city:''}}</div>
                                        <div class="additional-info">
                                            <div class="a-features" @if(empty($dfp->bedroom)) style="width: 80%;" @endif title="{{ $dfp->size }} {{ $dfp->area }}"><i class="fas fa-vector-square"></i> <span>{{ $dfp->size }} {{ $dfp->area }}</span></div>
                                            @if($dfp->bedroom)
                                                <div class="a-features"><i class="fas fa-bed"></i> {{$dfp->bedroom}} Bed</div>
                                            @endif
                                            @if($dfp->bath)
                                                <div class="a-features"><i class="fas fa-bath"></i> {{$dfp->bath}} Bath</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </a>  
                        </div>
                    @endforeach

                  @else
                    <div class="p-empty b-shadow">No <span>Featured Property</span> Found.</div>
                  @endif
  
                  {{-- <div class="d-btn view-more-btn">
                    <button class="btn">View More</button>
                  </div> --}}
                </div>
  
              </div>
            </div>
            
            
          </div>
        </div>
      </div>


<script type="text/javascript">

    $(document).ready(function(){
      // ------------- DEALER SINGLE START -------------------
      // dealer tab active
      $('.dealer-tabs button').on('click', function(){
        $('.dealer-tabs button').removeClass('active');
        $(this).addClass('active');
      });
      // show boosted
      $('.dealer-tabs button.show-boosted').on('click', function(){
        $('.dealer-all-properties').addClass('d-none');
        $('.dealer-boosted-properties').removeClass('d-none');
        $('.dealer-featured-properties').addClass('d-none');
      });

      // show featured
      $('.dealer-tabs button.show-featured').on('click', function(){
        $('.dealer-all-properties').addClass('d-none');
        $('.dealer-boosted-properties').addClass('d-none');
        $('.dealer-featured-properties').removeClass('d-none');
        $(this).addClass('active');
      });

      // show add
      $('.dealer-tabs button.show-all').on('click', function(){
        $('.dealer-all-properties').removeClass('d-none');
        $('.dealer-boosted-properties').addClass('d-none');
        $('.dealer-featured-properties').addClass('d-none');
        $(this).addClass('active');
      });

        // ------------- DEALER SINGLE END -------------------

    });
</script>

@endsection

@push('js')

@endpush