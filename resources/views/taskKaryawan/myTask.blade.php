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
            <th scope="col">Handle</th>
            </tr>
        </thead>
        @php ($no = 1)
        <tbody>
            @foreach ($user->tasks as $tsk)                
            <tr>
                <td scope="row">{{ $no++ }}</td>
                <td>{{ $tsk->judul }}</td>
                <td>{{ $tsk->start }} Sampai {{ $tsk->deadLine }}</td>
                <td>{{ $tsk->status }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection