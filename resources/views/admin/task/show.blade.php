@extends('admin.layout.template')
@section('title')
    {{ $task->judul }}
@endsection
@section('content')
<div class="container mt-3">
    <table class="table table-bordered ">
        <tbody>
            <tr class="">
                <th class="text-center bg-primary text-white">Task</th>
                <td class="text-center fw-bold">{{ ucwords($task->judul) }}</td>
            </tr>
            <tr class="">
                <th class="text-center bg-primary text-white">Pengambil</th>
                <td class="text-center"> {{ ucwords($karyawan->nama) }}</td>
            </tr>
            <tr class="">
                <th class="text-center bg-primary text-white">Waktu</th>
                <td class="text-center ">
                    <b>{{ date('d-M-Y', strtotime($task->start));}}</b> / <b>{{ date('d-M-Y', strtotime($task->deadLine)); }}</b>
                </td>
            </tr>
            <tr class="bg-primary text-white">
                <th colspan="2" class="text-center ">Deskripsi</th>
            </tr>
            <tr>
                <td colspan="2">{!! $task->keterangan !!}</td>
            </tr>
        </tbody>
      </table>
</div>
@endsection