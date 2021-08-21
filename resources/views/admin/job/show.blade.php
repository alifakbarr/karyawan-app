@extends('admin.layout.template')
@section('title')
    Job : {{ ucwords($job->nama) }}
@endsection
@section('content')
<div class="container mt-3">
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('job.edit',$job->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
        <button type="button" class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $job->id }}">
            Delete
        </button>
    </div>
    <table class="table table-bordered ">
        <tbody>
            <tr class="bg-primary text-white">
                <th class="text-center">Nama Pekerjaan</th>
            </tr>
            <tr>
                <td class="text-center fw-bold">{{ ucwords($job->nama) }}</td>
            </tr>
            <tr class="bg-primary text-white">
                <th class="text-center ">Deskripsi</th>
            </tr>
            <tr>
                <td>{!! $job->keterangan !!}</td>
            </tr>
        </tbody>
      </table>
</div>


{{-- modal --}}
<div class="modal fade" id="exampleModal{{ $job->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Delete Job</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Yakin ingin menghapus job : <div class="fw-bold">{{ ucwords($job->nama) }}</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form action="{{ route('job.destroy', $job) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary" onclick="return true">Hapus</button>
          </form>
        </div>
      </div>
      {{-- <a href="{{ route('job.delete',$job->id) }}" class="btn btn-primary ">Hapus</a> --}}
    </div>
  </div>
@endsection