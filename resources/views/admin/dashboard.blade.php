@extends('admin.layout')
@section('content')

<div class="row mt-4">
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-receipt-cutoff text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0">{{$total_sale_property}}</h5>
        <p class="mb-0 f-medium">Sales Properties</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-key text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0">{{$total_rent_property}}</h5>
        <p class="mb-0 f-medium">Rent Properties</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-pencil-square text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0">{{$total_lease_property}}</h5>
        <p class="mb-0 f-medium">Lease Properties</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-building text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0">{{$total_sale_property+$total_rent_property+$total_lease_property}}</h5>
        <p class="mb-0 f-medium">All Properties</p>
      </div>
    </div>
  </div>
  {{-- total_active_projects --}}
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-bookmark-check text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0">{{$total_active_projects}}</h5>
        <p class="mb-0 f-medium">Active Projects</p>
      </div>
    </div>
  </div>
  {{-- total_upcoming_projects --}}
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-bookmark-x text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0">{{$total_upcoming_projects}}</h5>
        <p class="mb-0 f-medium">Upcoming Projects</p>
      </div>
    </div>
  </div>
  {{-- total_active_dealers --}}
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-person-check-fill text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0">{{$total_active_dealers}}</h5>
        <p class="mb-0 f-medium">Active Prime Dealers</p>
      </div>
    </div>
  </div>
  {{-- total_inactive_dealers --}}
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="bi bi-person-x-fill text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0">{{$total_inactive_dealers}}</h5>
        <p class="mb-0 f-medium">Inactive Prime Dealers</p>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-4 mb-4">
    <div class="bg-theme-dark dashboard-tile py-3 px-3 d-flex flex-wrap align-items-center">
      <div class="icon-tile rounded-circle d-flex me-3
        align-items-center justify-content-center">
        <i class="fas fa-solid fa-bell text-white"></i>
      </div>
      <div class="ms-auto text-white text-end tile-detail">
        <h5 class="f-bold mb-0">{{$total_inactive_dealers}}</h5>
        <p class="mb-0 f-medium">Notifications</p>
      </div>
    </div>


</div>

@endsection