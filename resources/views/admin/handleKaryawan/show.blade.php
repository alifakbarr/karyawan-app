@extends('admin.layout.template')
@section('title', 'Detail Karyawan')
@section('content')
<div class="table-responsive">
    <h2 class="text-center mb-3">Biodata Karyawan</h2>
    <table class="table table-sm mt-3">
        <tbody>
          <tr>
            <th scope="row">Foto</th>
            <td><img src="{{ asset('storage/'.$karyawan->foto) }}" alt="" class="img-fluid profile"></td>
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
            <th scope="row">TTanggal Lahir</th>
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
        </tbody>
    </table>
</div>

@endsection