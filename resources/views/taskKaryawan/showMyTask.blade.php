@extends('admin.layout.template')
@section('title')
    {{ ucwords($task->judul) }}
@endsection
@section('content')
<div class="container mt-3">
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('taskKaryawan.edit', $user_task_id) }}" class="btn btn-sm btn-primary text-decoration-none">Edit Catatan</a>
    </div>
    <table class="table table-bordered ">
        <tbody>
            <tr>
                <th class="text-center bg-primary text-white">Proyek</th>
                <td class="text-center fw-bold">{{ ucwords($task->judul) }}</td>
            </tr>
            <tr>
                <th class="text-center bg-primary text-white">Status</th>
                <td class="text-center"><span class="badge bg-success">Selesai</span></td>
            </tr>
            <tr class="">
                <th class="text-center bg-primary text-white">Waktu</th>
                <td class="text-center ">
                    <b>{{ date('d-M-Y', strtotime($task->start));}}</b> / <b>{{ date('d-M-Y', strtotime($task->deadLine)); }}</b>
                </td>
            </tr>
            <tr>
                <th class="bg-primary text-white text-center">Deskripsi</th>
                <td>{!! $task->keterangan !!}</td>
            </tr>
            <tr>
            <th class="text-center bg-primary text-white">Catatan</th>
                <td >{!! $user_task_id->alur ?? '<p class="text-center">Semua Halaman telah selesai, siap ditambah backend</p>' !!}</td>
            </tr>
            <tr>
                <th class="text-center bg-primary text-white">Komentar</th>
                <td>{!! $user_task_id->keterangan ?? '<p class="text-center">Tidak ada Komentar</p>' !!}</td>
            </tr>
            <tr>
                <th class="text-center bg-primary text-white">Github</th>
                <td class="text-center"><a href="#" class="badge bg-primary">Visit</a></td>
            </tr>
            {{-- <tr class="">
                <th class="text-center bg-primary text-white ">Option</th>
                <td class="text-center">
                    <span>Verifikasi project sekarang?</span>
                    <br>
                    <form action="{{ route('taskKaryawan.update', $user_task_id->id) }}" method="post">
                      @csrf
                      @method('patch')
                      <button type="submit" class="btn btn-secondary btn-sm">
                        Verifikasi
                      </button>
                    </form>
                </td>
            </tr> --}}
        </tbody>
      </table>
</div>
@endsection