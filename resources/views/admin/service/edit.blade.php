@extends('admin.shared.main')
@section('title','Chỉnh sửa dịch vụ')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Chỉnh sửa dịch vụ</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{route('service.update', $service->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label for="name_vi">Tên dịch vụ (Tiếng Việt): </label>
                            <input type="text" id="name_vi" class="form-control mt-2" name="name_vi" placeholder="Nhập tên dịch vụ" value="{{ $service->name_vi }}">
                            <span class="text-danger">{{ $errors->first('name_vi')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="description_vi">Mô tả (Tiếng Việt): </label>
                            <textarea class="form-control mt-1 ckeditor" name="description_vi" placeholder="Nhập mô tả" id="description_vi">{{ $service->description_vi }}</textarea>
                            <span class="text-danger">{{ $errors->first('description_vi')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label>Chọn icon hiển thị: </label>
                            <br>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input service-icon-radio" type="radio" name="icon" id="inlineRadio1" value="fas fa-paint-brush">
                                <label class="form-check-label" for="inlineRadio1"><i class="fas fa-paint-brush"></i></label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input service-icon-radio" type="radio" name="icon" id="inlineRadio2" value="icon-image">
                                <label class="form-check-label" for="inlineRadio2"><i class="icon-image"></i></label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input service-icon-radio" type="radio" name="icon" id="inlineRadio3" value="icon-video">
                                <label class="form-check-label" for="inlineRadio3"><i class="icon-video"></i></label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input service-icon-radio" type="radio" name="icon" id="inlineRadio4" value="icon-camera">
                                <label class="form-check-label" for="inlineRadio4"><i class="icon-camera"></i></label>
                            </div>
                            <div class="form-check form-check-inline mt-2">
                                <input class="form-check-input service-icon-radio" type="radio" name="icon" id="inlineRadio5" value="icon-calendar">
                                <label class="form-check-label" for="inlineRadio5"><i class="icon-calendar"></i></label>
                            </div>
                            <br>
                            <span class="text-danger">{{ $errors->first('icon')}}</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group col-md-12">
                            <label for="name_en">Tên dịch vụ (Tiếng Anh): </label>
                            <input type="text" id="name_en" class="form-control mt-2" name="name_en" placeholder="Nhập tên dịch vụ" value="{{ $service->name_en }}">
                            <span class="text-danger">{{ $errors->first('name_en')}}</span>
                        </div>
                        <div class="form-group col-md-12 mt-2">
                            <label for="description_en">Mô tả (Tiếng Anh): </label>
                            <textarea class="form-control mt-1 ckeditor" name="description_en" placeholder="Nhập mô tả" id="description_en">{{ $service->description_en }}</textarea>
                            <span class="text-danger">{{ $errors->first('description_en')}}</span>
                        </div>
                    </div>
                    <div class="form-group col-md-12 mt-2">
                        <input type="submit" class="btn btn-outline-success" value="Cập nhật">
                        <a href="{{route('service.index')}}" class="btn btn-outline-danger">Hủy bỏ</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var iconRadio = document.getElementsByClassName('service-icon-radio');
    for (var i = 0; i < iconRadio.length; i++) {
        if (iconRadio[i].value == '{{$service->icon}}') {
            iconRadio[i].checked = true;
        }        
    }
</script>
@endsection