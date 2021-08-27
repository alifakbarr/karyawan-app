@extends('admin.layout.template')
@section('title', 'Add Profile Karyawan')
@section('content')
<form action="{{ route('karyawan.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    @include('profilPage.form.form')
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
    </div>
</form>
@endsection