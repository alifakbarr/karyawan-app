@extends('admin.layout.template')
@section('title','Job')
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('job.create') }}" class="btn btn-primary btn-sm ">Add</a>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered ">
        <thead class="">
          <tr class=" bg-primary text-white">
            <th scope="col">No</th>
            <th scope="col">Job</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
          @php ($no = 1)
          @foreach ($jobs as $job)              
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td><a href="{{ route('job.show', $job->id) }}" class="text-decoration-none text-dark">{{ ucwords($job->nama) }}</a></td>
            <td>
                <div class="d-flex justify-content-evenly">
                    <a href="{{ route('job.edit',$job->id) }}" class="btn btn-warning btn-sm ">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $job->id }}">
                      Delete
                    </button>
                </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
</div>

{{-- modal --}}
<!-- Button trigger modal -->


<!-- Modal -->
@foreach ($jobs as $job)    
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


@endforeach

@endsection