@php
    use \App\Http\Controllers\globalC;
@endphp

@extends('frontend.app')
@section('seo_title'){{(isset($seo_title)) ? $seo_title : $seo_title}}@endsection
@section('seo_keywords'){{(isset($seo->seo_keyword)) ? $seo->seo_keyword : 'plots, plot, housing, housing society, plotting, housing society islamabad, plot for sale in lahore, housing society lahore, plot sale in lahore'}}@endsection
@section('seo_description'){{(isset($seo_description)) ? $seo_description : $seo_description}}@endsection
@section('seo_url'){{url()->current()}}@endsection

@section('content')
    
  <!-- property-listing -->
  <div class="property-listing main-padding">
    <div class="container">
      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <!-- search -->

          <div class="global-search h-search b-shadow bg-white properties-listing-page">
            <form method="get" action="{{route('properties-listing')}}" class="property-filters">
			  <div style="margin: 10px 0px;">
					<div class="s-select s-large">
						 <select name="city" class="p-city search-select">
							<!--<option value="">Select City</option>-->
							@foreach ($cities as $c)
								<option class="cid" value="{{$c->id}}" @if(isset($scity) && $scity == $c->id) selected="selected" @endif>{{$c->name}}</option>
							@endforeach
						 </select>
					  <i class="fas fa-angle-down"></i>
					</div>

					<div class="s-select s-loc">
					<input type="text" name="search" id="loc_search" placeholder="Search Location..." class="form-control" value="@if($c_search) {{ $c_search }}@endif">
					</div>
					<div id="loc_search_list"></div>
				</div>

                <div class="s-select s-large">
                <select name="purpose" class="p-purpose search-select">
                    <option value="">Select Purpose</option>
                    @foreach ($purpose as $p)
                        <option value="{{$p->id}}" @if(isset($spurpose) && $spurpose == $p->id) selected="selected" @endif>{{$p->name}}</option>
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
                        <option value="{{$b->bedroom}}" @if(isset($sbeds) && $sbeds == $b->bedroom) selected="selected" @endif>{{$b->bedroom}} Beds</option>
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
                <button class="btn">Search @if($p_count) <b>({{ $p_count }})</b> @endif</button>
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
                            <div class="feature-d p-feature" @if($p->boost == 1) style="left: 115px;" @endif><i class="fas fa-trophy"></i> Featured</div>
                        @endif
                        @if($p->boost == 1)
                            <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div>
                        @endif
                        <div class="p-type {{ strtolower( str_replace(' ', '-', $p->property_type_name) ) }}">{{$p->property_type_name}} for {{$p->purpose}} </div>
                    </div>
                    
                    <div class="p-info">
                        <div class="price">PKR: {{ convertCurrency($p->price) }}</div>
                        <div class="title"> {{$p->name}}</div>
                        <div class="b-info"> @if(isset($p->address)){{ $p->address }},@endif {{$p->city}}</div>
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

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	  <script type="text/javascript">
            // jQuery wait till the page is fullt loaded
            $(document).ready(function () {
                // keyup function looks at the keys typed on the search box
                $('#loc_search').on('keyup',function() {
                    // the text typed in the input field is assigned to a variable 
                    var query = $(this).val();
					var cid = $('.cid').val();
                    // call to an ajax function
                    $.ajax({
                        // assign a controller function to perform search action - route name is search
                        url:"{{ route('Autocomplte.getAutocomplte') }}",
                        // since we are getting data methos is assigned as GET
                        type:"GET",
                        // data are sent the server
                        data:{'search':query, cid: cid},
                        // if search is succcessfully done, this callback function is called
                        success:function (data) {
                            // print the search results in the div called country_list(id)
                            $('#loc_search_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                // initiate a click function on each search result
                $(document).on('click', 'li', function(){
                    // declare the value in the input field to a variable
                    var value = $(this).text();
                    // assign the value to the search box
                    $('#loc_search').val(value);
                    // after click is done, search results segment is made empty
                    $('#loc_search_list').html("");
                });
            });
		  
		  $(document).ready(function() {
			$("select").change(function(){
				var cid = $(this).val();
						$('#loc_search').on('keyup',function() {
                    // the text typed in the input field is assigned to a variable 
                    var query = $(this).val();
                    // call to an ajax function
                    $.ajax({
                        // assign a controller function to perform search action - route name is search
                        url:"{{ route('Autocomplte.getAutocomplte') }}",
                        // since we are getting data methos is assigned as GET
                        type:"GET",
                        // data are sent the server
                        data:{'search':query, cid: cid},
                        // if search is succcessfully done, this callback function is called
                        success:function (data) {
                            // print the search results in the div called country_list(id)
                            $('#loc_search_list').html(data);
                        }
                    })
                    // end of ajax call
                });

                // initiate a click function on each search result
                $(document).on('click', 'li', function(){
                    // declare the value in the input field to a variable
                    var value = $(this).text();
                    // assign the value to the search box
                    $('#loc_search').val(value);
                    // after click is done, search results segment is made empty
                    $('#loc_search_list').html("");
                });
					
				});
		});
		  
        </script>

