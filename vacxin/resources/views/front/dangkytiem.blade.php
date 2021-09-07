@extends('front.layout.layout')

@section('title', 'dangkytiem')

@section('body')
    <div class="form">
        <form action="{{ url('/dangkytiem') }}" method="POST">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">CMND\CCCD</label>
                <input type="text" class="form-control" id="CMND" name="CMND" placeholder="Nhap so can cuoc cong dan hoac chung minh nhan dan">
                @error('CMND')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Ho va ten</label>
                <input type="text" class="form-control" id="ten" name="ten" placeholder="Nhap ho va ten">
                @error('ten')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Ngay thang nam sinh</label>
                <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Nhap ngay thang nam sinh">
                @error('birthday')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Dia Chi</label>
                <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhap dia chi">
                @error('diachi')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">SDT</label>
                <input type="text" class="form-control" id="SDT" name="SDT" placeholder="nhap so dien thoai">
                @error('SDT')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Tien su di ung</label>
                <input type="text" class="form-control" id="tienxu" name="tienxu" placeholder="Nhap tien su di ung">
                @error('tienxu')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary center" name="dangky">Dang Ky</button>
        </form>
    </div>
@endsection
