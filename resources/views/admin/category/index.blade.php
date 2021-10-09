@extends('admin.shared.main')
@section('title','Danh mục')
@section('content')
<div class="container-fluid px-4">
    <div class="row ml-1 col-md-12 mt-2">
        @if (Session::has('message'))
        <p class="alert alert-success notification">{{ Session::get('message')}}</p>
        @elseif(Session::has('err'))
        <p class="alert alert-danger notification">{{ Session::get('err')}}</p>
        @endif
    </div>
    <h1 class="mt-4">Danh mục</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{route('category.create')}}" class="btn btn-outline-success mb-2 mt-2">Tạo danh mục</a>
                </div>
                <div class="col-md-3">
                </div>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->name }}</td>
                        <td colspan="5">
                            <a href="{{route('category.edit',$category->id)}}" class="ml-1 btn" style="width:40px; padding: 4px"><i class="fa fa-edit "></i></a>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn delete-modal text-danger" data-id="{{$category->id}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="width: 10px; padding: 7px 15px;">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<form action="{{route('category.destroy', 1)}}" method="POST">
    @csrf
    @method('DELETE')
    @include('admin.shared.modal_delete')
</form>
@endsection