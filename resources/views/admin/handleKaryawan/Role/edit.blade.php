@extends('admin.layout.template')
@section('title')
    {{ $karyawan->nama }}
@endsection
@section('content')
    <h3>Edit Role</h3>
    {{ $karyawan->user()->name }}
    <form action="{{ route('handleKaryawan.updateRole') }}" method="post">
        @csrf
        <select class="form-select" name="progress" aria-label="Default select example">
            <option selected>Pilih Hasil</option>
            @foreach ($roles as $role)
            <option value="{{ $role }}" {{ $role == $karyawan->user->name ? 'selected' : '' }} >{{ ucwords($role) }}</option>
            @endforeach
          </select>  
    </form>
@endsection