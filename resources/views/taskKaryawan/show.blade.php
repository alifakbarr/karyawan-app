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
                <th class="text-center ">Option</th>
            </tr>
            <tr>
                <td class="text-center">
                    <span>Ambil project sekarang?</span>
                    <br>

                    <form action="{{ route('taskKaryawan.store') }}" method="post">
                      @csrf
                      <button type="submit" class="btn btn-warning btn-sm">
                        Ambil
                      </button>
                    </form>
                    {{-- <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $task->id }}">
                        Ambil
                    </button> --}}
                </td>
            </tr>
        </tbody>
      </table>
</div>

{{-- modal --}}
<div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-warning">
          <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Ambil Task</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Yakin ingin mengambil task : <div class="fw-bold">{{ ucwords($task->judul) }}</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form action="{{ route('task.destroy', $task) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary" onclick="return true">Ambil</button>
          </form>
        </div>
      </div>
      {{-- <a href="{{ route('job.delete',$job->id) }}" class="btn btn-primary ">Hapus</a> --}}
    </div>
  </div>
@endsection