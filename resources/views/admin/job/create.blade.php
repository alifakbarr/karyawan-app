@extends('admin.layout.template')
@section('title','Tambah Jabatan')
@section('content')
<form action="{{ route('job.store') }}" method="post">
    @csrf
    @include('admin/job/form/form')
</form>
@endsection