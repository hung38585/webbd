@extends('admin.shared.main')
@section('title','Đổi mật khẩu')
@section('content')
<div class="container-fluid px-4">
    <div class="row ml-1 col-md-12 mt-2">
        @if (Session::has('message'))
        <p class="alert alert-success notification">{{ Session::get('message')}}</p>
        @elseif(Session::has('err'))
        <p class="alert alert-danger notification">{{ Session::get('err')}}</p>
        @endif
        @if ($errors->has('new_password'))
        <p class="alert alert-danger notification">{{ $errors->first('new_password') }}</p>
        @endif
    </div>
    <div class="card">
        <div class="card-body">
        <div class="cotainer mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header text-center">Đổi mật khẩu</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.changepassword') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Mật khẩu hiện tại:</label>
                                <input type="password" name="current_password" placeholder="Mật khẩu" id="current_password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Mật khẩu mới:</label>
                                <input type="password" name="new_password" placeholder="Mật khẩu" id="new_password" class="form-control" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nhập lại mật khẩu mới:</label>
                                <input type="password" name="again_password" placeholder="Mật khẩu" id="again_password" class="form-control" required>
                            </div>
                            <div class="col-md-3 d-grid mx-auto">
                                <button type="submit" class="btn btn-success col-md-12">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
        </div>    
    </div>
</div>
@endsection