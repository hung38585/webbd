@extends('client.shared.main')
@section('title', $new->title)
@section('content')
<div id="fh5co-couple-story" class="fh5co-section-gray">
    <div class="container" style="margin-bottom: 30px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/tin-tuc">Tin tức</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $new->title }}</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>{{ $new->title }}</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
            {!! $new->content !!}
            </div>
        </div>
    </div>
</div>
@endsection