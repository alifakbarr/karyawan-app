@extends('admin.layout.template')
@section('title')
    Task : {{ $userTask->task->judul }}
@endsection
@section('content')
    <h5>Nama : {{ $karyawan->nama }}</h5>
    <div class="container mt-3">
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('taskKaryawan.edit', $userTask) }}" class="btn btn-sm btn-primary text-decoration-none">Edit Alur</a>
        </div>
        <table class="table table-bordered ">
            <tbody>
                <tr class="bg-primary text-white">
                    <th class="text-center">Task</th>
                </tr>
                <tr>
                    <td class="text-center fw-bold">{{ ucwords($userTask->task->judul) }}</td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center">Waktu</th>
                </tr>
                <tr>
                    <td class="text-center fw-bold">
                        <span class="bg-success p-1 rounded">{{ date('d-M-Y', strtotime($userTask->task->start));}}</span> Sampai <span class="bg-danger p-1 rounded">{{ date('d-M-Y', strtotime($userTask->task->deadLine)); }}</span></td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center ">Deskripsi</th>
                </tr>
                <tr>
                    <td>{!! $userTask->task->keterangan !!}</td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center ">Progres alur yang sudah di kerjakan</th>
                </tr>
                <tr>
                    <td>{!! $userTask->alur ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center ">Catatan</th>
                </tr>
                <tr>
                    <td>{!! $userTask->keterangan ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center ">Option</th>
                </tr>
                <tr>
                    <td class="text-center">
                        <span>Edit catatan ?</span>
                        <br>
                        <a href="{{ route('handleKaryawan.edit',$userTask->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            </tbody>
          </table>
    </div>
@endsection