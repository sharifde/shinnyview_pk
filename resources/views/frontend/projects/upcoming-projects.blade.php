@extends('frontend.app')
@section('content')
    
    <!-- official-projects -->
    <div class="offical-projects  main-padding">
        <div class="container">
          <div class="row">
  
            <!-- main heading -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="project-titles">
                <div class="title">Upcoming Projects</div>
                <div class="s-title">here's the list or our upcoming projects</div>
              </div>
            </div>
  
            <!-- project details -->
            @forelse ($projects as $p)
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="project-default-card default-card b-shadow" style="background: #fff;">
                        <div class="image">
                            <img src="{{asset( $p->image )}}" alt="project-image">
                        </div>
                        
                        <div class="p-info">
                            <div class="title">{{$p->name}}</div>
                            <div class="b-info">{{$p->cityName}}</div>
                        </div>
                    </div>
                </div>
            @empty
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="p-empty b-shadow">No <span>Upcoming Project</span> Found.</div>
              </div>
            @endforelse
  
  
          </div>
        </div>
    </div>

@endsection