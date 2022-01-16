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
                    {{ date('d-M-Y', strtotime($task->start));}} / {{ date('d-M-Y', strtotime($task->deadLine)); }}
                </td>
            </tr>
            <tr>
                <th class="text-center bg-primary text-white">Deskripsi</th>
                <td >{!! $task->keterangan !!}</td>
            </tr>
            <tr class="">
                <th class="text-center bg-primary text-white">Status</th>
                <td class="text-center">
                    <span class="badge bg-warning">Proses</span>
                </td>
            </tr>
            <tr class="">
                <th class="text-center bg-primary text-white">Catatan</th>
                <td class="text-center">
                    <p>Semua halaman telah selesai, siap untuk ditambah backend</p>
                </td>
            </tr>
            <tr class="">
                <th class="text-center bg-primary text-white">Komentar</th>
                <td class="text-center">
                    <p>Tidak ada komentar</p>
                </td>
            </tr>
            {{-- <tr class="">
                <th class="text-center bg-primary text-white">Nilai</th>
                <td class="text-center">
                    80
                </td>
            </tr> --}}
            <tr class="">
                <th class="text-center bg-primary text-white">Github</th>
                <td class="text-center">
                    <a class="badge bg-primary">Visit</a>
                </td>
            </tr>

        </tbody>
      </table>
</div>
@endsection