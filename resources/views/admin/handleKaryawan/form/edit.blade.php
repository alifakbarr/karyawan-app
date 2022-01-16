@extends('admin.layout.template')
@section('title')
    Proyek : {{ $userTask->task->judul }}
@endsection
@section('content')
    <div class="container mt-3">
        <table class="table table-bordered ">
            <tbody>
                <tr>
                    <th class="text-center bg-primary text-white">Proyek</th>
                    <td class="text-center fw-bold">{{ ucwords($userTask->task->judul) }}</td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Karyawan</th>
                    <td class="text-center fw-bold">Canisius Renandatta R.D S.Kom</td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Waktu</th>
                    <td class="text-center ">
                        <b>{{ date('d-M-Y', strtotime($userTask->task->start));}}</b> / <b>{{ date('d-M-Y', strtotime($userTask->task->deadLine)); }}</b>
                    </td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Deskripsi</th>
                    <td>{!! $userTask->task->keterangan !!}</td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Catatan</th>
                    <td>{!! $userTask->alur ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Komentar</th>
                    <td>
                        <form action="{{ route('handleKaryawan.update', $userTask->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <textarea name="keterangan" id="editor" rows="10" placeholder="Tambah komentar">
                                {{ old('keterangan') ?? $userTask->keterangan }}
                            </textarea>
                            
                    </td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Status</th>
                    <td class="text-center p-2">
                        <select class="form-select" name="progress" aria-label="Default select example">
                            <option selected>Pilih Hasil</option>
                            @foreach ($progress as $prog)
                            <option value="{{ $prog }}" {{ $prog == $userTask->progress ? 'selected' : '' }} >{{ ucwords($prog) }}</option>
                            @endforeach
                          </select>  
                    </td>
                </tr>
                <tr>
                    <th class="text-center bg-primary text-white">Nilai</th>
                    <td>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="Beri nilai skala 1-100">
                        <small class="fw-bold">*tambahkan nilai jika status proyek sudah selesai</small>
                    </td>
                </tr>
            </tbody>
          </table>
          <div class="d-flex justify-content-end">
              <button class="btn btn-sm btn-primary" type="submit">Simpan</button>
          </div>
          
        
        </form>
    </div>
@endsection