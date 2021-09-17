@extends('admin.layout.template')
@section('title')
    Task : {{ $userTask->task->judul }}
@endsection
@section('content')
    <h5>Nama : {{ $karyawan->nama }}</h5>
    <div class="container mt-3">
        @if ($user->name !== 'user')    
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('taskKaryawan.edit', $userTask) }}" class="btn btn-sm btn-primary text-decoration-none">Edit Alur</a>
        </div>
        @endif
        <table class="table table-bordered ">
            <tbody>
                <tr class="">
                    <th class="text-center bg-primary text-white">Task</th>
                    <td class="text-center fw-bold">{{ ucwords($userTask->task->judul) }}</td>
                </tr>
                <tr class="">
                    <th class="text-center bg-primary text-white">Waktu</th>
                    <td class="text-center fw-bold">
                        <b>{{ date('d-M-Y', strtotime($userTask->task->start));}}</b> / <b>{{ date('d-M-Y', strtotime($userTask->task->deadLine)); }}</b>
                    </td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center " colspan="2">Deskripsi</th>
                </tr>
                <tr>
                    <td colspan="2">{!! $userTask->task->keterangan !!}</td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center " colspan="2">Alur Yang Selesai</th>
                </tr>
                <tr>
                    <td colspan="2">{!! $userTask->alur ?? '<p class="text-center">Alur belum dibuat</p>' !!}</td>
                </tr>
                <tr class="bg-primary text-white">
                    <th colspan="2" class="text-center ">Catatan</th>
                </tr>
                <tr>
                    <td colspan="2">{!! $userTask->keterangan ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
                </tr>
                <tr class="">
                    <th class="text-center bg-primary text-white">Status</th>
                    <td>
                        @if ($userTask->progress === 'proses')
                        <div class=" text-center ">
                            <button disabled="disabled" class="fw-bold bg-warning rounded text-white">{{ ucwords($userTask->progress) }}</button>
                        </div>
                        @elseif($userTask->progress === 'check')
                        <div class="text-center">
                            <button disabled="disabled" class="fw-bold bg-primary rounded text-white">{{ ucwords($userTask->progress) }}</button>
                        </div>
                        @elseif($userTask->progress === 'selesai')
                        <div class="text-center">
                            <button disabled="disabled" class="w-bold bg-secondary rounded text-white">{{ ucwords($userTask->progress) }}</button>
                        </div>
                        @elseif($userTask->progress === 'revisi')
                        <div class="text-center">
                            <button disabled="disabled" class="w-bold bg-success rounded text-white">{{ ucwords($userTask->progress) }}</button>
                        </div>
                        @elseif($userTask->progress === 'gagal')
                        <div class="text-center">
                            <button disabled="disabled" class="w-bold bg-danger rounded text-white">{{ ucwords($userTask->progress) }}</button>
                        </div>
                        @endif
                    </td>
                </tr>
                <tr class="">
                    <th class="text-center bg-primary text-white">Option</th>
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