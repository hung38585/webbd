@extends('admin.shared.main')
@section('title','Cẩm nang')
@section('content')
<div class="container-fluid px-4">
    <div class="row ml-1 col-md-12 mt-2">
        @if (Session::has('message'))
        <p class="alert alert-success notification">{{ Session::get('message')}}</p>
        @elseif(Session::has('err'))
        <p class="alert alert-danger notification">{{ Session::get('err')}}</p>
        @endif
    </div>
    <h1 class="mt-4">Cẩm nang</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{route('share.create')}}" class="btn btn-outline-success mb-2 mt-2">Tạo cẩm nang</a>
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
                    @foreach($shares as $key => $share)
                    <tr>
                        <td>{{ $share->title }}</td>
                        <!-- <td>{!!  \Illuminate\Support\Str::limit($share->content, 430) !!}</td> -->
                        <td>{!! \Illuminate\Support\Str::limit(preg_replace('/<input .*src="\/ckfinder\/userfiles\/images\/.*" type="image" \/>/', '', $share->content), 200) !!}</td>
                        <td><img src="{{asset('images/' . $share->image)}}" alt="" style="width: 100px; height:80px;"></td>
                        <td style="width: 90px;">
                            <a href="{{route('share.edit',$share->id)}}" class="ml-1 btn" style="width:40px; padding: 4px"><i class="fa fa-edit "></i></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn delete-modal text-danger" data-id="{{$share->id}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 10px; padding: 7px 15px;">
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
            {{$shares->links('admin.product.paginate')}}
        </div>
    </div>
</div>
<form action="{{route('share.destroy', 1)}}" method="POST">
    @csrf
    @method('DELETE')
    @include('admin.shared.modal_delete')
</form>
@endsection