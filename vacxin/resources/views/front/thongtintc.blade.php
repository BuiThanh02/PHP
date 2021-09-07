@extends('front.layout.layout')

@section('title', 'thongtintc')

@section('body')
    <div class="form">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">CMND\CCCD</th>
                <th scope="col">Ho va Ten</th>
                <th scope="col">Ngay thang nam sinh</th>
                <th scope="col">Dia chi</th>
                <th scope="col">SDT</th>
                <th scope="col">Tien xu di ung</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ Auth::list()-> CMND}}</td>
                <td>{{ Auth::list()-> ten}}</td>
                <td>{{ Auth::list()-> birthday}}</td>
                <td>{{ Auth::list()-> diachi}}</td>
                <td>{{ Auth::list()-> SDT}}</td>
                <td>{{ Auth::list()-> tienxu}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
