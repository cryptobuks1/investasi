@extends('layouts.frontend')

@section('body-content')
<!-- Banner -->
<div class="page-banner">
    <div class="container">
        <div class="parallax-mask"></div>
        <div class="section-name">
            <h2>Top Up Dompet</h2>
            <div class="short-text">
                <h5><a href="{{route('index')}}">Home</a>
                    <i class="fa fa-angle-double-right"></i><a href="{{route('my-wallet')}}">Dompet Saya</a>
                    <i class="fa fa-angle-double-right"></i>Top Up Dompet
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- contact wrapper -->
<div class="contact-page-wrapper">
    <div class="container">
        <div class="row">

        </div>
    </div>
</div>
@endsection