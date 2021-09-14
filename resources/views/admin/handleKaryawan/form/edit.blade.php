@extends('admin.layout.template')
@section('title')
    Task : {{ $userTask->task->judul }}
@endsection
@section('content')
    <h5>Nama : {{ $karyawan->nama }}</h5>
    <div class="container mt-3">
        <table class="table table-bordered ">
            <tbody>
                <tr class="bg-primary text-white">
                    <th class="text-center">Task</th>
                </tr>
                <tr>
                    <td class="text-center fw-bold">{{ ucwords($userTask->task->judul) }}</td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center">Waktu</th>
                </tr>
                <tr>
                    <td class="text-center fw-bold">
                        <span class="bg-success p-1 rounded">{{ date('d-M-Y', strtotime($userTask->task->start));}}</span> Sampai <span class="bg-danger p-1 rounded">{{ date('d-M-Y', strtotime($userTask->task->deadLine)); }}</span></td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center ">Deskripsi</th>
                </tr>
                <tr>
                    <td>{!! $userTask->task->keterangan !!}</td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center ">Progres alur yang sudah di kerjakan</th>
                </tr>
                <tr>
                    <td>{!! $userTask->alur ?? '<p class="text-center">Tidak ada catatan</p>' !!}</td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center ">Catatan</th>
                </tr>
                <tr>
                    <td>
                        <form action="{{ route('handleKaryawan.update', $userTask->id) }}" method="post">
                            @csrf
                            @method('patch')
                            <textarea name="keterangan" id="editor" rows="10" placeholder="Tambah catatan">
                                {{ old('keterangan') ?? $userTask->keterangan }}
                            </textarea>
                            
                    </td>
                </tr>
                <tr class="bg-primary text-white">
                    <th class="text-center ">Status</th>
                </tr>
                <tr>
                    <td class="text-center p-2">
                        <select class="form-select" name="progress" aria-label="Default select example">
                            <option selected>Pilih Hasil</option>
                            @foreach ($progress as $prog)
                            <option value="{{ $prog }}" {{ $prog == $userTask->progress ? 'selected' : '' }} >{{ ucwords($prog) }}</option>
                            @endforeach
                          </select>  
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