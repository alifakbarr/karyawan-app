@extends('admin.layout.template')
@section('title', 'Tambah Penilaian')
@section('content')
    <form action="{{ route('penilaian.store') }}" method="post">
        @csrf
        @include('admin.penilaian.form.form')
        <div class="d-flex justify-content-end">
            <button class="btn btn-sm btn-primary">
                Simpan
            </button>
        </div>
    </form>
@endsection