@extends('admin.layout.template')
@section('title', 'Penilaian')
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('penilaian.create') }}" class="btn btn-primary btn-sm ">Add</a>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered ">
        <thead class="">
          <tr class=" bg-primary text-white">
            <th scope="col">No</th>
            <th scope="col">Pertanyaan</th>
            <th scope="col">Nilai</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>            
          <tr>
            <th scope="row"></th>
            <td><a href="" class="text-decoration-none text-dark"></a></td>
            <td>
                <div class="d-flex justify-content-evenly">
                    <a href="" class="btn btn-warning btn-sm ">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Delete
                    </button>
                </div>
            </td>
          </tr>
        </tbody>
      </table>
</div>

{{-- modal --}}
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Delete Job</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Yakin ingin menghapus job : <div class="fw-bold"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form action="" method="post">
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