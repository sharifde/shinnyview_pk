@extends('frontend.app')
@section('content')
    
    <!-- official-projects -->
    <div class="offical-projects  main-padding">
        <div class="container">
          <div class="row">
  
            <!-- main heading -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="project-titles">
                <div class="title">Active Projects</div>
                <div class="s-title">here's the list or our active projects</div>
              </div>
            </div>
  
            <!-- project details -->
            @forelse ($projects as $p)
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="project-default-card default-card">
                        <a href="{{route('project-single', ['id' => $p->id])}}" class=" b-shadow">
                            <div class="image">
                                <img src="{{asset($p->image)}}" alt="project-image">
                            </div>
                            
                            <div class="p-info">
                                <div class="project-logo">
                                    <img src="{{asset($p->logo)}}" alt="logo">
                                </div>
                                <div class="project-info">
                                    <div class="price">{{$p->name}}</div>
                                    {{-- <div class="title">PKR {{ convertCurrency($p->min_price) }} lac - 2.12 Cr</div> --}}
                                    <div class="title">PKR {{ $p->min_price }} - {{ $p->max_price }}</div>
                                    <div class="b-info">{{$p->cityName}}</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-md-12 col-sm-12 col-xs-12"> 
                    <div class="p-empty b-shadow">No <span>Active Project</span> Found.</div>
                </div>
            @endforelse
  
  
          </div>
        </div>
    </div>

@endsection