@extends('admin.layout.template')
@section('title', 'Admin')
@section('content')
<div class="table-responsive">
    <table class="table table-hover table-sm">
        <thead  class="bg-primary text-white">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Job</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
        @php ($no = 1)
        @foreach ($karyawans as $karyawan)            
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td>{{ $karyawan->nama }}</td>
          <td>{{ $karyawan->Job->nama }}</td>
          <td>
              <a href="{{ route('adminPage', $karyawan->id) }}" class="btn btn-sm btn-warning">Edit</a>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
</div>
@endsection