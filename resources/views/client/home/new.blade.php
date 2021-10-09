@extends('client.shared.main')
@section('title','Tin tức')
@section('content')
<div id="fh5co-couple-story" class="fh5co-section-gray">
    <div class="container" style="margin-bottom: 30px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Tin tức</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading animate-box">
                <h2>Tin tức</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <ul class="timeline animate-box">
                    @foreach ($news as $key => $new)
                    <li class="animate-box {{ $key%2 == 1 ? 'timeline-inverted' : '' }}">
                        <div class="timeline-badge" style="background-image:url({{asset('images/' . $new->image)}});"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                            </div>
                            <div class="timeline-body">
                            <a href="{{url('/tin-tuc/' . $new->slug)}}" style="font-weight: bold;">{{ $new->title }}</a>
                            <!-- {!! \Illuminate\Support\Str::limit($new->content, 200) !!} -->
                            {!! \Illuminate\Support\Str::limit(preg_replace('/<input .*src="\/ckfinder\/userfiles\/images\/.*" type="image" \/>/', '', $new->content), 200) !!}
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