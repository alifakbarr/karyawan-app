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
                <td class="text-center ">
                   <b>{{ date('d-M-Y', strtotime($task->start));}}</b> Sampai <b>{{ date('d-M-Y', strtotime($task->deadLine)); }}</b></td>
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
                <td>{!! $user_task_id->alur ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
            </tr>
            <tr class="bg-primary text-white">
                <th class="text-center ">Catatan</th>
            </tr>
            <tr>
                <td>{!! $user_task_id->keterangan ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
            </tr>
            <tr class="bg-primary text-white">
                <th class="text-center ">Option</th>
            </tr>
            <tr>
                <td class="text-center">
                    <span>Check project sekarang?</span>
                    <br>
                    <form action="{{ route('taskKaryawan.update', $user_task_id->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <button type="submit" class="btn btn-primary btn-sm">
                        Check
                      </button>
                    </form>
                </td>
            </tr>
        </tbody>
      </table>
</div>
@endsection