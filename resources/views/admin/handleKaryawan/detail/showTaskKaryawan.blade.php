@extends('admin.layout.template')
@section('title')
    Proyek : {{ $userTask->task->judul }}
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
                    <th class="text-center bg-primary text-white">Proyek</th>
                    <td class="text-center fw-bold">{{ ucwords($userTask->task->judul) }}</td>
                </tr>
                <tr class="">
                    <th class="text-center bg-primary text-white">Waktu</th>
                    <td class="text-center">
                        <b>{{ date('d-M-Y', strtotime($userTask->task->start));}}</b> / <b>{{ date('d-M-Y', strtotime($userTask->task->deadLine)); }}</b>
                    </td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Deskripsi</th>
                    <td colspan="2">{!! $userTask->task->keterangan !!}</td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Catatan</th>
                    <td colspan="2">{!! $userTask->alur ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Komentar</th>
                    <td colspan="2">{!! $userTask->keterangan ?? '<p class="text-center">Tidak ada komentar</p>' !!}</td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Nilai</th>
                    <td colspan="2" class="text-center">
                        Nilai belum ditambahkan
                    </td>
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
                            <button disabled="disabled" class="fw-bold bg-secondary rounded text-white">Verifikasi</button>
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
                <tr>
                    <th class="text-center bg-primary text-white">Github</th>
                    <td colspan="2">
                        <div class="text-center">
                            <a class="badge bg-primary">Visit</a>
                        </div>
                    </td>
                </tr>
                <tr class="">
                    <th class="text-center bg-primary text-white">Option</th>
                    <td class="text-center">
                        <span>Tambah komentar / beri nilai </span>
                        <br>
                        <a href="{{ route('handleKaryawan.edit',$userTask->id) }}" class="badge bg-warning text-dark">Edit</a>
                    </td>
                </tr>
            </tbody>
          </table>
    </div>
@endsection