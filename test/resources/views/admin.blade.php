@extends('layout.layout')

@section('title', 'admin')

@section('body')
    <div class="form">
        <div class="top_19">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
        </div>
        @foreach($product as $p)
            <div class="card" style="width: 18rem;">
                <img src="/img/{{ $p->imgFullNameGallery }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">
                        Name: {{$p->name}}<br>
                        Price: {{$p->price}}
                    </p>
                </div>
            </div>
        @endforeach
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data" id="form">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter product name" required="required">
                <span class="text-danger error-text name_error"></span>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter product price" required="required">
                <span class="text-danger error-text name_error"></span>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="imgFullNameGallery" class="form-control" required="required">
                <span class="text-danger error-text image_error"></span>
            </div>
            <button type="submit" class="btn btn-primary center">Add</button>
        </form>
    </div>
@endsection
