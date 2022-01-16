@extends('admin.layout.template')
@section('title', 'Edit Profile ')
@section('content')
<form action="{{ route('karyawan.update',$karyawan->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('patch')
    @include('profilPage.form.form')
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
    </div>
</form>
@endsection