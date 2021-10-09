@extends('client.shared.main')
@section('title', __('wedding.feedback'))
@section('content')
<div id="fh5co-testimonial" class="fh5co-section-gray">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ __('wedding.home_page') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('wedding.feedback') }}</li>
            </ol>
        </nav>
        <div class="row" style="margin-bottom: 100px;">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>{{ __('wedding.bride_feed') }}</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 animate-box">
                    <div class="wrap-testimony">
                        <div class="owl-carousel-fullwidth">
                            @if (count($feedbacks) > 0)
                            <div class="item">
                                @foreach ($feedbacks as $key => $feedback)
                                <div class="testimony-slide active text-center">
                                    <figure>
                                        <img src="{{asset('images/' . $feedback->image)}}" alt="Cảm nhận của cô dâu về Thạch Anh studio">
                                    </figure>
                                    <span>{{ $feedback->name }} <a href="#" class="twitter">Twitter</a></span>
                                    <blockquote>
                                        <p>
                                            @if(Session::has('website_language') && Session::get('website_language') == 'en')
                                            {!! $feedback->description_en !!}
                                            @else
                                            {!! $feedback->description_vi !!}
                                            @endif
                                        </p>
                                    </blockquote>
                                </div>
                                @if ($key % 2 != 0 && $key < count($feedbacks) - 1) </div>
                                    <div class="item">
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="item">
                                        <div class="testimony-slide active text-center" style="width: 100%;">
                                            <blockquote>
                                                <p>{{ __('wedding.feedback_note') }}</p>
                                            </blockquote>
                                        </div>
                                    </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
    @endsection