@extends('admin.shared.main')
@section('title','Tin tức')
@section('content')
<div class="container-fluid px-4">
    <div class="row ml-1 col-md-12 mt-2">
        @if (Session::has('message'))
        <p class="alert alert-success notification">{{ Session::get('message')}}</p>
        @elseif(Session::has('err'))
        <p class="alert alert-danger notification">{{ Session::get('err')}}</p>
        @endif
    </div>
    <h1 class="mt-4">Tin tức</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{route('new.create')}}" class="btn btn-outline-success mb-2 mt-2">Tạo tin tức</a>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Hình ảnh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($news as $key => $new)
                    <tr>
                        <td>{{ $new->title }}</td>
                        <!-- <td>{!!  \Illuminate\Support\Str::limit($new->content, 430) !!}</td> -->
                        <td>{!! \Illuminate\Support\Str::limit(preg_replace('/<input .*src="\/ckfinder\/userfiles\/images\/.*" type="image" \/>/', '', $new->content), 200) !!}</td>
                        <td><img src="{{asset('images/' . $new->image)}}" alt="" style="width: 100px; height:80px;"></td>
                        <td style="width: 90px;">
                            <a href="{{route('new.edit',$new->id)}}" class="ml-1 btn" style="width:40px; padding: 4px"><i class="fa fa-edit "></i></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn delete-modal text-danger" data-id="{{$new->id}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 10px; padding: 7px 15px;">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- paginate -->
        <div class="col-md-12">
            {{$news->links('admin.product.paginate')}}
        </div>
    </div>
</div>
<form action="{{route('new.destroy', 1)}}" method="POST">
    @csrf
    @method('DELETE')
    @include('admin.shared.modal_delete')
</form>
@endsection