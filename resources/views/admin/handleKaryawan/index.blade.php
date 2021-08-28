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
            <th scope="col">Gabung pada</th>
          </tr>
        </thead>
        <tbody>
        @php ($no = 1)
        @foreach ($karyawans as $karyawan)            
        <tr>
          <th scope="row">{{ $no++ }}</th>
          <td><a href="{{ route('handleKaryawan.show', $karyawan->id) }}" class="text-decoration-none text-dark">{{ $karyawan->nama }}</a></td>
          <td>{{ $karyawan->Job->nama ?? 'Belum memilih' }}</td>
          <td>{{ date('d-M-Y', strtotime($karyawan->created_at));}}</td>
        </tr>
        @endforeach
        </tbody>
      </table>
</div>
<div class="d-flex justify-content-center mt-4">
  {{ $karyawans->links() }}
</div>
@endsection