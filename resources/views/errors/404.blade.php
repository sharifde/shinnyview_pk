<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800');
@import url('https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800');
.error-page{
    width: 50%;
    margin: auto;
    /* margin-top: 150px; */
    position: relative;
    top: 25%;
    text-align: center;
    font-family: 'Poppins', 'sans-serif';
}
.error-page .main-heading{
    font-size: 150px;
    font-family: 'Raleway';
    font-weight: 800;
}
.error-page .sub-heading{
    font-size: 30px;
    margin: 10px 0;
}
.error-page .heading-desc{
    width: 50%;
    margin: auto;
    font-size: 15px;
}
.error-page .link{}
.error-page .link a{
    text-decoration: none;
    background: #BC985F;
    color: #fff;
    font-weight: 400;
    padding: 11px 30px;
    display: inline-block;
    border-radius: 10px;
    margin-top: 20px;
    text-transform: uppercase;
    font-size: 15px;
    letter-spacing: 2px;
}
.error-page .link a:hover{
    background: #1B1A2F;
    transition: all .2s ease-in-out;
}
</style>

<div class="error-page">
    <div class="main-heading">Oops!</div>
    <div class="sub-heading">404 - Page Not Found</div>
    <div class="heading-desc">The page you are looking for might have been removed had its name changed or is temporarily unavailable.</div>
    <div class="link">
        <a href="https://shinnyview.com/">visit homepage</a>
    </div>
</div>




{{-- @extends('errors::minimal') --}}

{{-- @section('title', __('Not Found'))
@section('code', '404') --}}

{{-- @section('message', __('Not Found')) --}}
