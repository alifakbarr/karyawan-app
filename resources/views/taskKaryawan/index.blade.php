@extends('admin.layout.template')
@section('title', 'Tasks')
@section('content')
<div class="d-flex justify-content-end mb-2">
  <a href="{{ route('taskKaryawan.myTask',Auth::user()->id) }}" class="btn btn-sm btn-primary">My Task</a>
</div>
<div class="table-responsive">
    <table class="table table-hover table-bordered ">
        <thead class="text-center">
          <tr class=" bg-primary text-white">
            <th scope="col">No</th>
            <th scope="col">Task</th>
            <th scope="col">Waktu</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody class="text-center">
        @php ($no = 1)
        @foreach ($tasks as $task)
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td><a href="{{ route('taskKaryawan.show', $task->id) }}" class="text-decoration-none text-dark">{{ $task->judul }}</a></td>
          <td><a href="{{ route('taskKaryawan.show', $task->id) }}" class="text-decoration-none text-dark">{{ date('d-M-Y', strtotime($task->start));}} Sampai {{ date('d-M-Y', strtotime($task->deadLine));}}</a></td>
          <td>
            <div class="d-flex justify-content-center">
              <a href="{{ route('taskKaryawan.show', $task->id) }}" class="text-decoration-none text-dark">
                <span class="bg-secondary rounded p-1 fw-bold text-white">
                  {{-- mengecek apakah sudah ada di table user_task --}}
                  {{ $task->user_tasks->count() > 0 ? 'Telah Diambil' : 'Belum Diambil' }}
                </span>
              </a>
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
@endsection