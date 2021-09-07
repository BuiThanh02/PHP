@extends('front.layout.layout')

@section('title', 'dangnhap')

@section('body')
    <div class="form">
        <form action="{{ url('/dangnhap') }}" method="POST">
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email">
                </div>
                @error('email')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Mat Khau</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="matkhau" name="matkhau">
                </div>
                @error('matkhau')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary center">Dang Nhap</button>
        </form>
    </div>
@endsection
