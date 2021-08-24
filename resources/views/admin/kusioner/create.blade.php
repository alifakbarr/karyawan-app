@extends('admin.layout.template')
@section('title', 'Add Kusioner')
@section('content')
    <form action="{{ route('kusioner.store') }}" method="POST">
        @csrf
        @include('admin.kusioner.form.form')
        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>
        </div>
    </form>
@endsection