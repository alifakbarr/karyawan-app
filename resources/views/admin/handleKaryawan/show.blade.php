@extends('admin.layout.template')
@section('title', 'Detail Karyawan')
@section('content')
<div class="d-flex justify-content-end">
  <a href="{{ route('handleKaryawan.editRole', $karyawan->id) }}" class="btn btn-sm btn-primary">Edit Role</a>
</div>
<div class="table-responsive">
    <h2 class="text-center mb-3">Biodata Karyawan</h2>
    <table class="table table-sm mt-3">
        <tbody>
          <tr>
            <th scope="row">Foto</th>
            <td><img src="{{ asset('storage/'.$karyawan->foto) }}" alt="" class="img-fluid profile"></td>
          </tr>
          <tr>
            <th scope="row">Status</th>
            <td>{{ ucwords($user->name) }}</td>
          </tr>
          <tr>
            <th scope="row">Tanggal Gabung</th>
            <td>{{ date('d-M-Y', strtotime($karyawan->created_at));}}</td>
          </tr>
          <tr>
            <th scope="row">NIP</th>
            <td>{{ $karyawan->nip }}</td>
          </tr>
          <tr>
            <th scope="row">Nama</th>
            <td>{{ ucwords($karyawan->nama) }}</td>
          </tr>
          <tr>
            <th scope="row">jabatan</th>
            <td>{{ ucwords($karyawan->Job->nama)  }}</td>
          </tr>
          <tr>
            <th scope="row">Jenis Kelamin</th>
            <td>
                @if ($karyawan->jenis_kelamin === 'l')
                    Laki-Laki
                @else 
                    Perempuan
                @endif
            </td>
          </tr>
          <tr>
            <th scope="row">Tanggal Lahir</th>
            <td> {{ date('d-M-Y', strtotime($karyawan->tanggal_lahir))}}<td>
          </tr>
          <tr>
            <th scope="row">Tempat Lahir</th>
            <td>{{ ucwords($karyawan->tempat_lahir)}}</td>
          </tr>
          <tr>
            <th scope="row">No Hp</th>
            <td>{{ $karyawan->no_hp }}</td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td>{{ $karyawan->email }}</td>
          </tr>
          <tr>
            <th scope="row">Alamat</th>
            <td>{{ ucwords($karyawan->alamat) }}</td>
          </tr>
          <tr>
            <th scope="row">Gabung</th>
            <td>{{ date('d-M-Y', strtotime($karyawan->created_at)); }}</td>
          </tr>
          <tr>
            <th scope="row">Nilai</th>
            <td>{{ $hitung ?? 'Tidak ada' }}</td>
          </tr>
        </tbody>
    </table>
</div>
<div class="table-responsive">
  <table class="table">
    <thead>
      <tr class="bg-light">
        <th scope="col">Project</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row" class="bg-warning">Proses</th>
        <th>{{ $user_task_proses->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskProses',$karyawanId->user_id) }}" class="btn btn-sm btn-warning">Detail Proses</a></th>
      </tr>
      <tr >
        <th scope="row" class="bg-primary text-white">Check</th>
        <th>{{ $user_task_check->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskCheck',$karyawanId->user_id) }}" class="btn btn-sm btn-primary">Detail Check</a></th>
      </tr>
      <tr>
        <th scope="row" class="bg-secondary text-white">Revisi</th>
        <th>{{ $user_task_revisi->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskRevisi',$karyawanId->user_id) }}" class="btn btn-sm btn-secondary">Detail Revisi</a></th>

      </tr>
      <tr >
        <th scope="row" class="bg-success text-white">Selesai</th>
        <th>{{ $user_task_selesai->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskSelesai',$karyawanId->user_id) }}" class="btn btn-sm btn-success">Detail Selesai</a></th>

      </tr>
      <tr >
        <th scope="row" class="bg-danger text-white">Gagal</th>
        <th>{{ $user_task_gagal->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskGagal',$karyawanId->user_id) }}" class="btn btn-sm btn-danger">Detail Gagal</a></th>
      </tr>
    </tbody>
  </table>
</div>
@endsection