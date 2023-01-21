@foreach ($plans as $p)
    <div class="pdetail-plan-card">
        <a href="{{asset('storage/app/'.$p->image)}}" data-fancybox="1-bed">
            <div class="image">
                <img src="{{asset('storage/app/'.$p->image)}}" alt="property-plan">
                <div class="numbers">{{$p->name}}</div>
            </div>
            <div class="btm-info">
                <div class="title">{{$p->size}}</div>
                <div class="type">{{$p->price}}</div>
            </div>
        </a>
    </div>
@endforeach