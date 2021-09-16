@extends('admin.layout.template')
@section('title')
    Not Found
@endsection
@section('content')
<div class="container p-5">
    <div class="d-flex justify-content-center align-items-center">
     <img src="{{ asset('icon/not-found.svg') }}" alt="" width="60px">
     </div> 
     <h3 class="text-center mt-4">Hasil Tidak ditemukan</h3>
</div>
@endsection