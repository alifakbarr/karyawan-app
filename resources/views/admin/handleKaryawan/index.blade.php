@extends('admin.layout.template')
@section('title')
    {{ Auth::user()->name }}
@endsection
@section('content')
<div class="table-responsive">
    <table class="table table-hover table-sm">
        <thead  class="bg-primary text-white text-center">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Job</th>
            <th scope="col">Opsi</th>
          </tr>
        </thead>
        <tbody class="text-center">
        @php ($no = 1)
        @foreach ($karyawans as $karyawan)            
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td><a href="{{ route('handleKaryawan.show', $karyawan->user_id) }}" class="text-decoration-none text-dark">{{ ucwords($karyawan->nama) }}</a></td>
          <td>{{ $karyawan->Job->nama ?? 'Belum memilih' }}</td>
          <td>
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $karyawan->id }}">
              Delete
            </button>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
</div>
<div class="d-flex justify-content-center mt-4">
  {{ $karyawans->links() }}
</div>


{{-- modal --}}
@foreach ($karyawans as $karyawan)
<div class="modal fade" id="exampleModal{{ $karyawan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Delete Job</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Yakin ingin menghapus Karyawan : <div class="fw-bold">{{ $karyawan->nama }}</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="{{ route('handleKaryawan.delete', $karyawan->id) }}" class="btn btn-primary">Delete</a>
        </div>
      </div>
      {{-- <a href="{{ route('job.delete',$job->id) }}" class="btn btn-primary ">Hapus</a> --}}
    </div>
  </div>
@endforeach
@endsection