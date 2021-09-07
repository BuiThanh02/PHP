@extends('front.layout.layout')

@section('title', 'tracuu')

@section('body')
    <div class="form">
        <form>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">CMND\CCCD</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="CMND" name="CMND">
                </div>
                @error('CMND')
                <div class="text-danger">
                    <span>{{ $message }}</span>
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary center">Tra cuu</button>
        </form>
    </div>
@endsection
