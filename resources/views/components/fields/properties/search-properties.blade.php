{{-- @php
 use App\Http\Controllers\globalController;
 use Carbon\Carbon;
@endphp --}}
@php
    use \App\Http\Controllers\globalC;
@endphp
{{-- @if (count((array)$properties) > 0) --}}
    @foreach ($properties as $p)
        <div class="col-md-3 col-sm-4 col-xs-12">
            <div class="default-card">
                <a href="{{ route('view-property',['ptype' => $p->propertyType, 'stype' => $p->purpose,'city' => $p->city,'id' => $p->id,'slug' => $p->slug]) }}" class=" b-shadow">
                <div class="image">
                    <img src="{{asset('properties/gallery/'.$p->image)}}" alt="{{ $p->name }}">
                    @if($p->featured == 1)
                        <div class="feature-d p-feature" @if($p->boost == 1) style="left: 115px;" @endif><i class="fas fa-trophy"></i> Featured</div>
                    @endif
                    @if($p->boost == 1)
                        <div class="feature-d p-boosted"><i class="fas fa-angle-double-up"></i> Boosted</div>
                    @endif
                    <div class="p-type p-house">House for Sale</div>
                </div>
                
                <div class="p-info">
                    <div class="price">PKR: {{ convertCurrency($p->price) }}</div>
                    <div class="title">{{$p->name}}</div>
                    <div class="b-info">{{$p->city}}</div>
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

    <div class="pagination-default">
        {{ $properties->links() }}
    </div>
    
{{-- @endif --}}