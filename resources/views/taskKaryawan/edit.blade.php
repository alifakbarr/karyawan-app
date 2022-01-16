@extends('admin.layout.template')
@section('title')
    Edit Catatan : {{ ucwords($user_task->task->judul) }}
@endsection
@section('content')
<form action="{{ route('taskKaryawan.update',$user_task->id) }}" method="POST">
    @csrf
    @method('patch')
    <div class="mt-2">
        <label for="alur" class="form-label rounded p-1 fw-bold">Catatan</label>
        <textarea class="form-control" name="alur" id="editor" rows="6" placeholder="Tambahkan catatan">{{ old('alur')?? $user_task->alur }}</textarea>
    </div>
    <div class="mt-2">
        <label for="alur" class="form-label rounded p-1 fw-bold">Github</label>
        <input type="text" class="form-control" placeholder="Masukkan link github">
    </div>
    @error('alur')
    <div class="alur text-danger mt-1">
        {{ $message }}
    </div>
    @enderror
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
    </div>
</form>
@endsection