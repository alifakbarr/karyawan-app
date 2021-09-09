@extends('admin.layout.template')
@section('title')
    {{ ucwords($task->judul) }}
@endsection
@section('content')
<div class="container mt-3">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('taskKaryawan.edit', $user_task_id) }}" class="btn btn-sm btn-primary text-decoration-none">Edit Alur</a>
    </div>
    <table class="table table-bordered ">
        <tbody>
            <tr class="bg-primary text-white">
                <th class="text-center">Task</th>
            </tr>
            <tr>
                <td class="text-center fw-bold">{{ ucwords($task->judul) }}</td>
            </tr>
            <tr class="bg-primary text-white">
                <th class="text-center">Waktu</th>
            </tr>
            <tr>
                <td class="text-center fw-bold">
                    <span class="bg-success p-1 rounded">{{ date('d-M-Y', strtotime($task->start));}}</span> Sampai <span class="bg-danger p-1 rounded">{{ date('d-M-Y', strtotime($task->deadLine)); }}</span></td>
            </tr>
            <tr class="bg-primary text-white">
                <th class="text-center ">Deskripsi</th>
            </tr>
            <tr>
                <td>{!! $task->keterangan !!}</td>
            </tr>
            <tr class="bg-primary text-white">
                <th class="text-center ">Progres alur yang sudah di kerjakan</th>
            </tr>
            <tr>
                <td>{!! $user_task_id->alur ? '' : 'Belum diisi' !!}</td>
            </tr>
            <tr class="bg-primary text-white">
                <th class="text-center ">Option</th>
            </tr>
            <tr>
                <td class="text-center">
                    <span>Ambil project sekarang?</span>
                    <br>
                    <form action="{{ route('userTask.store', $task->id) }}" method="post">
                      @csrf
                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                      <input type="hidden" name="task_id" value="{{ $task->id }}">
                      <input type="hidden" name="progress" value="proses">
                      <button type="submit" class="btn btn-warning btn-sm">
                        Ambil
                      </button>
                    </form>
                </td>
            </tr>
        </tbody>
      </table>
</div>
@endsection