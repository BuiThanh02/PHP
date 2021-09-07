@extends('front.layout.layout')

@section('title', 'thongtin')

@section('body')
    <div class="form">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">CMND\CCCD</th>
                <th scope="col">Ho va Ten</th>
                <th scope="col">Email</th>
                <th scope="col">Ngay thang nam sinh</th>
                <th scope="col">Dia chi</th>
                <th scope="col">SDT</th>
                <th scope="col">Tien xu di ung</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ Auth::user()-> CMND}}</td>
                <td>{{ Auth::user()-> ten}}</td>
                <td>{{ Auth::user()-> email}}</td>
                <td>{{ Auth::user()-> birthday}}</td>
                <td>{{ Auth::user()-> diachi}}</td>
                <td>{{ Auth::user()-> SDT}}</td>
                <td>{{ Auth::user()-> tienxu}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
