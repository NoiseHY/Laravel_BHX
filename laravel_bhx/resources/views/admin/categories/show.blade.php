@extends('admin.categories.layout')

@section('content')

<h2>Chi tiết loại sản phẩm {{$categories->TenSP}}</h2>
<ul class="list-group">
  <li class="list-group-item">Mã sản phẩm : {{$categories->MaLoai}}</li>
  <li class="list-group-item">Tên sản phẩm : {{$categories->TenLoai}}</li>
  <li class="list-group-item">Tên sản phẩm : {{$categories->MoTa}}</li>


</ul>

@endsection