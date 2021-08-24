@extends('admin.layout.template')
@section('title')
    Edit Task {{ $task->judul }}
@endsection
@section('content')
    <form action="{{ route('task.update', $task->id) }}" method="post">
        @csrf
        @method('patch')
        @include('admin.task.form.form')
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
    </form>
@endsection