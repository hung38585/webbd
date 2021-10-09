@extends('client.shared.main')
@section('title', __('wedding.contact'))
@section('content')
<div id="fh5co-testimonial" class="fh5co-section-gray">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ __('wedding.home_page') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('wedding.contact') }}</li>
            </ol>
        </nav>
        <div class="fh5co-contact-info row" style="margin-bottom: 100px;">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-md-offset-2 fh5co-heading animate-box">
                <h2>{{ __('wedding.contact_info') }}</h2>
            <ul>
                <li class="address">{{ $infomation->address }}</li>
                <li class="phone">{{ $infomation->phone }}</li>
                <li class="email">{{ $infomation->mail }}</li>
                <li style="padding: 0;"><i class="fab fa-facebook-square" style="font-size: 24px; padding-right: 24px;"></i> <a href="{{ $infomation->facebook }}" target="_blank">Facebook</a></li>
            </ul>
            </div>
        </div>
    </div>
</div>
@endsection