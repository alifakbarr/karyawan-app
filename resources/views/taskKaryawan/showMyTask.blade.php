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
            <tr>
                <th class="text-center bg-primary text-white">Task</th>
                <td class="text-center fw-bold">{{ ucwords($task->judul) }}</td>
            </tr>
            <tr class="">
                <th class="text-center bg-primary text-white">Waktu</th>
                <td class="text-center ">
                    <b>{{ date('d-M-Y', strtotime($task->start));}}</b> / <b>{{ date('d-M-Y', strtotime($task->deadLine)); }}</b>
                </td>
            </tr>
            <tr class="">
                <th class="bg-primary text-white text-center" colspan="2">Deskripsi</th>
            </tr>
            <tr>
                <td colspan="2">{!! $task->keterangan !!}</td>
            </tr>
            <tr class="">
                <th colspan="2" class="text-center bg-primary text-white">Alur Selesai</th>
            </tr>
            <tr>
                <td colspan="2" >{!! $user_task_id->alur ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
            </tr>
            <tr class="">
                <th class="text-center bg-primary text-white" colspan="2">Catatan</th>
            </tr>
            <tr>
                <td colspan="2">{!! $user_task_id->keterangan ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
            </tr>
            <tr class="">
                <th class="text-center bg-primary text-white ">Option</th>
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