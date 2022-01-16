@extends('admin/layout/template')
@section('title')
    Task : {{ $karyawan->nama }}
@endsection
@section('content')
    
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
            @foreach ($userTask as $task)
            <tr>
              <th scope="row">{{ $no++ }}</th>
              <td><a href="{{ route('handleKaryawan.showTaskKaryawan', $task->id) }}" class="text-decoration-none text-dark">{{ $task->task->judul }}</a></td>
              <td><a href="{{ route('handleKaryawan.showTaskKaryawan', $task->id) }}" class="text-decoration-none text-dark">{{ date('d-M-Y', strtotime($task->task->start));}} / {{ date('d-M-Y', strtotime($task->task->deadLine));}}</a></td>
              <td>
                <div class="d-flex justify-content-center">
                  <a href="{{ route('handleKaryawan.showTaskKaryawan', $task->id) }}" class="text-decoration-none text-dark">
                    @if ($task->progress === 'proses')
                    <div class="bg-warning text-center rounded p-1 fw-bold">
                        {{ ucwords($task->progress) }}
                    </div>
                    @elseif($task->progress === 'check')
                    <div class="bg-secondary text-center rounded text-white p-1 fw-bold">
                        Verifikasi
                    </div>
                    @elseif($task->progress === 'selesai')
                    <div class="bg-secondary text-center rounded text-white p-1 fw-bold">
                        {{ ucwords($task->progress) }}
                    </div>
                    @elseif($task->progress === 'revisi')
                    <div class="bg-success text-center rounded text-white p-1 fw-bold">
                        {{ ucwords($task->progress) }}
                    </div>
                    @elseif($task->progress === 'gagal')
                    <div class="bg-danger text-center rounded text-white p-1 fw-bold">
                        {{ ucwords($task->progress) }}
                    </div>
                    @endif
                  </a>
                </div>
              </td>
            </tr>
            @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center mt-4">
            {{ $userTask->links() }}
          </div>
    </div>
@endsection
