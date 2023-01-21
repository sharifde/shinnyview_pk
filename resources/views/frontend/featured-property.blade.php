@php
    use \App\Http\Controllers\globalC;
@endphp

@extends('frontend.app')

@section('content')
    
  <!-- property-listing -->
  <div class="property-listing main-padding">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <!-- search -->

          <div class="global-search h-search b-shadow bg-white properties-listing-page">
            <form method="get" action="{{route('properties-listing')}}" class="property-filters">
                <div class="s-select s-large">
                <select name="city" class="p-city search-select">
                    <option value="">Select City</option>
                    @foreach ($cities as $c)
                        <option value="{{$c->id}}" @if(isset($cityid) && $cityid == $c->id) selected="selected" @endif>{{$c->name}}</option>
                    @endforeach
                </select>
                <i class="fas fa-angle-down"></i>
                </div>

                <div class="s-select s-large">
                <select name="purpose" class="p-purpose search-select">
                    <option value="">Select Purpose</option>
                    @foreach ($purpose as $p)
                        <option value="{{$p->id}}">{{$p->name}}</option>
                    @endforeach
                </select>
                <i class="fas fa-angle-down"></i>
                </div>
        
                <div class="s-select">
                    <select name="subtype" class="p-purpose search-select">
                        <option value="">Select Type</option>
                        <optgroup label="Residential Properties">
                            <option value="1">House</option>
                            <option value="2">Plot</option>
                            <option value="3">Apartment</option>
                            <option value="4">Form House</option>
                            <option value="5">Office</option>
                            <option value="6">Room</option>
                            <option value="10">On Lease</option>
                        </optgroup>
                        <optgroup label="Commercial Properties">
                            <option value="5">Office</option>
                            <option value="2">Plot</option>
                            <option value="7">Shop</option>
                            <option value="8">Building</option>
                            <option value="9">Warehouse</option>
                            <option value="10">On Lease</option>
                        </optgroup>
                        <optgroup label="Land">
                            <option value="11">Agriculture</option>
                            <option value="12">Industrial</option>
                        </optgroup>
                    </select>
                    <i class="fas fa-angle-down"></i>
                </div>

                <div class="s-select">
                <select name="beds" class="p-beds search-select">
                    <option value="">Select Beds</option>
                    @foreach ($beds as $b)
                        <option value="{{$b->bedroom}}">{{$b->bedroom}} Beds</option>
                    @endforeach
                </select>
                <i class="fas fa-angle-down"></i>
                </div>

                <div class="s-select">
                <select name="baths" class="p-baths search-select">
                    <option value="">Select Bath</option>
                    @foreach ($bath as $b)
                        <option value="{{$b->bath}}">{{$b->bath}} Baths</option>
                    @endforeach
                </select>
                <i class="fas fa-angle-down"></i>
                </div>
        
                <div class="s-select s-input mb-margin">
                <input name="min" type="text" class="p-min" placeholder="Min Price">
                </div>
                <div class="s-select s-input mb-margin">
                <input name="max" type="text" class="p-max" placeholder="Max Price">
                </div>
        
                <div class="d-btn mb-margin">
                <button class="btn">Search</button>
                </div>
            </form>

          </div>
        </div>


        <div class="prop-list-data">

          @foreach ($properties as $p)
              <div class="col-md-3 col-sm-4 col-xs-12">
              <div class="default-card">
                  <a href="{{ route('view-property',['ptype' => $p->propertyType, 'stype' => $p->purpose,'city' => $p->city,'id' => $p->id,'slug' => $p->slug]) }}" class=" b-shadow">
                    <div class="image">
                        <img src="{{asset('properties/gallery/'.$p->image)}}" alt="{{ $p->name }}">
                        {{-- <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div> --}}
                        @if($p->featured == 1)
                            <div class="feature-d p-feature" @if($p->featured == 1) style="left: 115px;" @endif><i class="fas fa-trophy"></i> Featured</div>
                        @endif
                        
                        <div class="p-type {{ strtolower( str_replace(' ', '-', $p->property_type_name) ) }}">{{$p->property_type_name}} for {{$p->purpose}} </div>
                    </div>
                    
                    <div class="p-info">
                        <div class="price">PKR: {{ convertCurrency($p->price) }}</div>
                        <div class="title">@if(isset($p->address)){{ $p->address }},@endif {{$p->name}}</div>
                        <div class="b-info"> {{$p->city}}</div>
                    </div>
                    
                    <div class="additional-info">
                      <div class="a-features" @if(empty($p->bedroom)) style="width: 80%;" @endif title="{{ $p->size }} {{ $p->area }}"><i class="fas fa-vector-square"></i> <span>{{ $p->size }} {{ $p->area }}</span></div>
                      @if($p->bedroom)
                          <div class="a-features"><i class="fas fa-bed"></i> {{$p->bedroom}} Bed</div>
                      @endif
                      @if($p->bath)
                          <div class="a-features"><i class="fas fa-bath"></i> {{$p->bath}} Bath</div>
                      @endif
                    </div>
                  </a>
              </div>
              </div>
          @endforeach

            @if($properties->hasPages())
            <div class="pagination-default">
                {{$properties->withQueryString()->onEachSide(1)->links()}}
            </div>
            @endif

        </div>

      </div>
    </div>
  </div>

@endsection
<script>
  // search property
  function searchProperty(el){
    var el_html = $(el).html();
    
    var postData = {
      "_token": "{{ csrf_token() }}",
      city: $('.p-city').val(),
      purpose: $('.p-purpose').val(),
      beds: $('.p-beds').val(),
      baths: $('.p-baths').val(),
      min: $('.p-min').val(),
      max: $('.p-max').val(),
    };
    $(el).html('Searching...');
    $.ajax({
        url: livewire_app_url + '/search-properties',
        data: postData,
        type: 'GET',
        success: function(res) {
            console.log(res);
            if(res != ""){
              $('.prop-list-data').html(res);
            } else {
              swal("Sorry, No Property found Please try different Criteria.");
            }
            $(el).html(el_html);
        },
        error: function (jqXHR, exception) {
            displayErrors(jqXHR, exception);
            $(el).html(el_html);
        }
    });
  }
</script>