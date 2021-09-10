@extends('admin.layout.template')
@section('title', 'My Task')
@section('content')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Task</th>
            <th scope="col">Waktu</th>
            <th scope="col">Progress</th>

            </tr>
        </thead>
        @php ($no = 1)
        <tbody>
            @foreach ($user_task as $tsk)                
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td><a href="{{ route('taskKaryawan.showMyTask',$tsk->task->id) }}">{{ $tsk->task->judul }}</a></td>
                <td>{{ date('d-M-Y', strtotime($tsk->task->start));}} Sampai {{ date('d-M-Y', strtotime($tsk->task->deadLine)); }}</td>
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
                    @elseif($tsk->progress === 'revisi')
                    <div class="bg-success text-center rounded text-white">
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