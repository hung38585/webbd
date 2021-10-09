@extends('client.shared.main')
@section('title','Về Chúng tôi')
@section('content')
<div id="fh5co-couple-story" class="fh5co-section-gray">
    <div class="container" style="margin-bottom: 30px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giới thiệu</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>Về chúng tôi</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <ul class="timeline animate-box">
                    @foreach ($abouts as $key => $about)
                    <li class="animate-box {{ $key%2 == 1 ? 'timeline-inverted' : '' }}">
                        <div class="timeline-badge" style="background-image:url({{asset('images/' . $about->image)}});"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                            </div>
                            <div class="timeline-body">
                            {!! $about->content, 750 !!}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection