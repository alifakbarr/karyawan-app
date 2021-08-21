@extends('admin.layout.template')
@section('title', 'Add Kusioner')
@section('content')
    <form action="{{ route('kusioner.store') }}" method="POST">
        @csrf
        @include('admin.kusioner.form.form')
        <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>
    </form>
@endsection