@extends('admin.layout.template')
@section('title', 'My Task')
@section('content')
<div class="table-responsive">
    <table class="table">
        <thead class="text-center">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Task</th>
            <th scope="col">Waktu</th>
            <th scope="col">Progress</th>

            </tr>
        </thead>
        @php ($no = 1)
        <tbody class="text-center">
            @foreach ($user_task as $tsk)                
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td><a href="{{ route('taskKaryawan.showMyTask',$tsk->task->id) }}" class="text-decoration-none">{{ ucwords($tsk->task->judul) }}</a></td>
                <td>{{ date('d-M-Y', strtotime($tsk->task->start));}} / {{ date('d-M-Y', strtotime($tsk->task->deadLine)); }}</td>
                <td>
                    @if ($tsk->progress === 'proses')
                    <div class="bg-warning text-center rounded">
                        {{ ucwords($tsk->progress) }}
                    </div>
                    @elseif($tsk->progress === 'check')
                    <div class="bg-primary text-center rounded text-white">
                        {{ ucwords($tsk->progress) }}
                    </div>
                    @elseif($tsk->progress === 'revisi')
                    <div class="bg-secondary text-center rounded text-white">
                        {{ ucwords($tsk->progress) }}
                    </div>
                    @elseif($tsk->progress === 'selesai')
                    <div class="bg-success text-center rounded text-white">
                        {{ ucwords($tsk->progress) }}
                    </div>
                    @elseif($tsk->progress === 'gagal')
                    <div class="bg-danger text-center rounded text-white">
                        {{ ucwords($tsk->progress) }}
                    </div>
                    @endif
                    
                </td>

            </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection