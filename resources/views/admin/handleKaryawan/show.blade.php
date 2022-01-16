@extends('admin.layout.template')
@section('title', 'Detail Karyawan')
@section('content')
<div class="d-flex justify-content-end">
  <a href="{{ route('handleKaryawan.editRole', $karyawanId->id) }}" class="btn btn-sm btn-primary">Edit Role</a>
</div>
<div class="table-responsive">
    <h2 class="text-center mb-3">Biodata Karyawan</h2>
    <table class="table table-sm mt-3 table-bordered">
        <tbody>
          <tr>
            <th scope="row">Foto</th>
            <td><img src="{{ asset('storage/'.$karyawanId->foto) }}" alt="" class="img-fluid profile"></td>
          </tr>
          <tr>
            <th scope="row">Status</th>
            <td>{{ ucwords($user->name) }}</td>
          </tr>
          <tr>
            <th scope="row">Tanggal Gabung</th>
            <td>{{ date('d-M-Y', strtotime($karyawanId->created_at));}}</td>
          </tr>
          <tr>
            <th scope="row">NIP</th>
            <td>{{ $karyawanId->nip }}</td>
          </tr>
          <tr>
            <th scope="row">Nama</th>
            <td>{{ ucwords($karyawanId->nama) }}</td>
          </tr>
          <tr>
            <th scope="row">jabatan</th>
            <td>{{ ucwords($karyawanId->Job->nama)  }}</td>
          </tr>
          <tr>
            <th scope="row">Jenis Kelamin</th>
            <td>
                @if ($karyawanId->jenis_kelamin === 'l')
                    Laki-Laki
                @else 
                    Perempuan
                @endif
            </td>
          </tr>
          <tr>
            <th scope="row">Tanggal Lahir</th>
            <td> {{ date('d-M-Y', strtotime($karyawanId->tanggal_lahir))}}<td>
          </tr>
          <tr>
            <th scope="row">Tempat Lahir</th>
            <td>{{ ucwords($karyawanId->tempat_lahir)}}</td>
          </tr>
          <tr>
            <th scope="row">No Hp</th>
            <td>{{ $karyawanId->no_hp }}</td>
          </tr>
          <tr>
            <th scope="row">Email</th>
            <td>{{ $karyawanId->email }}</td>
          </tr>
          <tr>
            <th scope="row">Alamat</th>
            <td>{{ ucwords($karyawanId->alamat) }}</td>
          </tr>
          <tr>
            <th scope="row">Gabung</th>
            <td>{{ date('d-M-Y', strtotime($karyawanId->created_at)); }}</td>
          </tr>
          {{-- <tr>
            <th scope="row">Nilai</th>
            <td>{{ round($hitung) ?? 'Tidak ada' }}</td>
          </tr> --}}
        </tbody>
    </table>
</div>
<div class="table-responsive">
  <table class="table table-bordered">
    <thead class="text-center">
      <tr class="bg-light">
        <th scope="col">Proyek</th>
        <th scope="col">Jumlah</th>
        <th scope="col">Opsi</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <tr>
        <th scope="row" class="bg-warning">Proses</th>
        <th>{{ $user_task_proses->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskProses',$karyawanId->user_id) }}" class="">Daftar Proses</a></th>
      </tr>
      <tr >
        <th scope="row" class="bg-secondary text-white">Verifikasi</th>
        <th>{{ $user_task_check->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskCheck',$karyawanId->user_id) }}" class="">Daftar Check</a></th>
      </tr>
      <tr>
        <th scope="row" class="bg-danger text-white">Revisi</th>
        <th>{{ $user_task_revisi->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskRevisi',$karyawanId->user_id) }}" class="">Daftar Revisi</a></th>

      </tr>
      <tr >
        <th scope="row" class="bg-success text-white">Selesai</th>
        <th>{{ $user_task_selesai->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskSelesai',$karyawanId->user_id) }}" class="">Daftar Selesai</a></th>

      </tr>
      <tr >
        <th scope="row" class="bg-danger text-white">Gagal</th>
        <th>{{ $user_task_gagal->count() }}</th>
        <th class=""><a href="{{ route('handleKaryawan.showTaskGagal',$karyawanId->user_id) }}" class="">Detail Gagal</a></th>
      </tr>
    </tbody>
  </table>
  <h5 class="text-center">Penilaian 4 proyek terakhir</h5>
  <div class="d-flex justify-content-center">
    <img src="{{ asset('chart/chart.png') }}" alt="">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col" width="120px">Waktu</th>
          <th scope="col">Proyek</th>
          <th scope="col">Nilai</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">20-Nov-2021</th>
          <td>Frontend Sistem Informasi Pemesanan Desain Interior Dan Exterior Rumah Berbasis Web</td>
          <td>100</td>
        </tr>
        <tr>
          <th scope="row">30-Nov-2021</th>
          <td>Frontend Sistem Informasi Penjualan Obat Pada Apotek Medika</td>
          <td>75</td>
        </tr>
        <tr>
          <th scope="row">10-Dec-2021</th>
          <td>Backend Sistem Informasi Geografis Berbasis Web Untuk Pemetaan Pariwisata Kabupaten</td>
          <td>80</td>
        </tr>
        <tr>
          <th scope="row">20-Dec-2021</th>
          <td>Backend Sistem Informasi Pariwisata di Kabupaten Kebumen Berbasis Web</td>
          <td>90</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>


@endsection