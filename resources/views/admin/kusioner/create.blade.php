@extends('admin.layout.template')
@section('title', 'Add Kusioner')
@section('content')
    <form action="{{ route('kusioner.store') }}" method="POST">
        @csrf
        @include('admin.kusioner.form.form')
    </form>
@endsection