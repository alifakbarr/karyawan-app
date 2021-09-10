@extends('admin.layout.template')
@section('title')
    Edit Progres : {{ ucwords($user_task->task->judul) }}
@endsection
@section('content')
<form action="{{ route('taskKaryawan.update',$user_task->id) }}" method="POST">
    @csrf
    @method('patch')
    <div class="mt-3">
        <label for="alur" class="form-label bg-info  rounded p-1">Progres Alur</label>
        <textarea class="form-control" name="alur" id="editor" rows="6" placeholder="Progres alur">{{ old('alur')?? $user_task->alur }}</textarea>
    </div>
    @error('alur')
    <div class="alur text-danger mt-1">
        {{ $message }}
    </div>
    @enderror
    <div class="d-flex justify-content-end mt-1">
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
    </div>
</form>
@endsection