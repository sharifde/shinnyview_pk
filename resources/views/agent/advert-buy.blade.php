@extends('agent.layout')
@section('content')

<div class="py-4">
    <div class="bg-white card-body-content">
        <div class="search-form-header bg-theme-dark">
            <h5 class="mb-0 text-white px-4 py-3 text-center f-medium">Buy Advertisment
                <span class="txb-color">Plan</span>
            </h5>
        </div>
        <form class="row px-4 py-4 form-main-wrap"  action="{{route('packagestore')}}" method="POST">
            @csrf
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
            	<div class="row">
					@if($adverts)
					   @php $i=0; @endphp
						@foreach($adverts as $a_plan)
							@if($a_plan->name != 'Free')
							   @php $i++; @endphp
						<tr>
                                    <td class="py-2 px-3">
										<br>
                                        <p class="mb-3" style="margin-top:<?php if($a_plan->name == 'Prime Dealer') echo '-10px'; elseif($a_plan->name == 'Prime Dealer') echo '-35px'?>"><span style="background-color: <?php if($a_plan->name == 'Main Banner') echo 'deepskyblue;'; elseif($a_plan->name == 'Prime Dealer') echo 'forestgreen;';elseif($a_plan->name == 'Boost Property') echo 'purple;';elseif($a_plan->name == 'Feature Property') echo 'orangered;';?> padding: 4px 25px;"><b style="color:white">{{ $a_plan->name }} ({{$a_plan->design_price}})</b></span> Advertise your business with <b style="color: darkgoldenrod; text-decoration-line: underline">{{$a_plan->design_price}}</b> {{ $a_plan->name }} on our Home page for <?php echo $a_plan->days?> days<b style="float: right;">PKR: {{ $a_plan->price }}</b></p>
                                        <div style="width: 55px; margin-left: 70%; margin-top: -50px; padding: 2px 16px; margin-bottom: 17px;" >	
											<label class="f-medium">
												Qty 
											</label>
											<input style="width: 50px" required type="number" value="1" placeholder="Quantity" name="quantity[]" >
										 </div>
										<label class="f-medium" style="margin-left: 80%; margin-top: -6%;">
												Choose Plan 
											</label>
										<div id="checker" style="margin-left: 50%; margin-top:-4%">
										<input style="margin-top: -1.5%; margin-left: 34%;" type="checkbox" name="add-ons[]" id="add-dj" data-price="{{ $a_plan->price}}" value="{{ $a_plan->id}}" >
										</div>
										<hr style="border: 0.2px solid #BC985F;">
										 
										<input type="hidden" name="type" value="Advert Plan">
										<input type="hidden" id="amt" class="container" name="amt[]" >
                                    </td>
									
									
                                    
                                </tr>
							@endif
						@endforeach
					@endif
					<textarea id="field_results" style="display: none" name="ads_id"></textarea>
								<div class="search-form-header bg-theme-dark" style="padding: 10px 25px; margin-top: -16px;">
									<strong style="color: white; float: left">Total</strong>
										<b id="result" class="container" style="color: white; margin-left: 84%;">0</b>
								</div>
					
            </div>
                	
                    <button style="margin-left:88%; margin-top: 30px" type="submit"  class="border-0 f-medium rounded-btn  px-3 py-2 bg-theme text-white" id="checkBtn">Buy Now</button>
          
        </form>
    </div>
</div>
<script>
	
	$(document).ready(function() {
  function validate() {
    var sum = 0;
    sum += +$('#go input:checked').data('price') || 0;
    sum += +$('#place option:selected').data('price') || 0;
    //loop through checked checkbox
    $('#checker input:checked').each(function() {
      sum += +$(this).data('price') //get dataprice add in sum
    })


    $('#result').html( sum === 0 ? '' : 'PKR: ' + sum );
	  $('#amt').val( sum === 0 ? '' : 'Rs: ' + sum );
  }
  validate();

  $('#go input, #place, #checker input').on('change', function() {
    validate();
  });

});
	
$(document).ready(function () {
    $('#checkBtn').click(function() {
      checked = $("input[type=checkbox]:checked").length;

      if(!checked) {
        alert("You must check at least one checkbox.");
        return false;
      }

    });
});
</script>
@endsection
