@extends('admin.layout.template')
@section('title')
    {{ $task->judul }}
@endsection
@section('content')
<div class="container mt-3">
    <table class="table table-bordered ">
        <tbody>
            <tr class="bg-primary text-white">
                <th class="text-center">Task</th>
            </tr>
            <tr>
                <td class="text-center fw-bold">{{ ucwords($task->judul) }}</td>
            </tr>
            <tr class="bg-primary text-white">
                <th class="text-center">Pengambil</th>
            </tr>
            <tr>
                <td class="text-center"> {{ ucwords($karyawan->nama) }}</td>
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
        </tbody>
      </table>
</div>
@endsection