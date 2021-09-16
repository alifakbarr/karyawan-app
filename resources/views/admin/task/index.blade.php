@extends('admin.layout.template')
@section('title', 'Task')
@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('task.create') }}" class="btn btn-primary btn-sm ">Add</a>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered ">
        <thead class="">
          <tr class=" bg-primary text-white">
            <th scope="col">No</th>
            <th scope="col">Task</th>
            <th scope="col">Waktu</th>
            <th scope="col">Status</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
        @php ($no = 1)
        @foreach ($tasks as $task)
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td class="text-center"><a href="{{ route('task.show', $task->id) }}" class="text-decoration-none text-dark">{{ $task->judul }}</a></td>
          <td class="text-center"><a href="{{ route('task.show', $task->id) }}" class="text-decoration-none text-dark">{{ date('d-M-Y', strtotime($task->start));}} / {{ date('d-M-Y', strtotime($task->deadLine));}}</a></td>
          <td>
            <div class="d-flex justify-content-center">
              <a href="{{ route('task.show', $task->id) }}" class="text-decoration-none text-dark">
                <span class="bg-secondary rounded p-1 fw-bold text-white">
                  {{ $task->user_tasks->count() > 0 ? 'Sudah diambil' : 'Belum diambil' }}
                </span>
              </a>
            </div>
          </td>
          <td>
              <div class="d-flex justify-content-evenly">
                  <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning btn-sm ">Edit</a>
                  <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $task->id }}">
                    Delete
                  </button>
              </div>
          </td>
        </tr>
        @endforeach            
        </tbody>
      </table>
      <div class="d-flex justify-content-center mt-4">
        {{ $tasks->links() }}
      </div>
</div>

{{-- modal --}}
@foreach ($tasks as $task)
<div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Delete Job</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Yakin ingin menghapus job : <div class="fw-bold">{{ $task->judul }}</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form action="{{ route('task.destroy', $task) }}" method="post">
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