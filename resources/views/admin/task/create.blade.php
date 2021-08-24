@extends('admin.layout.template')
@section('title', 'Add task')
@section('content')
    <form action="{{ route('task.store') }}" method="post">
        @csrf
        @include('admin.task.form.form')
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </div>
    </form>
@endsection