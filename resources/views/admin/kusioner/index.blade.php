@extends('admin.layout.template')
@section('title', 'Kusioner')
@section('content')
    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('kusioner.create') }}" class="btn btn-primary btn-sm">Add</a>
    </div>
    <table class="table">
        <thead>
          <tr class="bg-primary text-white">
            <th scope="col">No</th>
            <th scope="col">Kusioner</th>
            <th scope="col">Option</th>
          </tr>
        </thead>
        <tbody>
            @php ($no = 1)
            @foreach ($kusioners as $kusioner)
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ ucFirst($kusioner->pertanyaan) }}</td>
                <td>
                    <a href="{{ route('kusioner.edit', $kusioner->id) }}" class="btn btn-sm btn-warning me-1">Edit</a>
                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $kusioner->id }}">
                        Delete
                    </button>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>

{{-- modal --}}
@foreach ($kusioners as $kusioner)    
  <div class="modal fade" id="exampleModal{{ $kusioner->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h5 class="modal-title text-white fw-bold" id="exampleModalLabel">Delete kusioner</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Yakin ingin menghapus kusioner : <div class="fw-bold">{{ ucFirst($kusioner->pertanyaan) }}</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <form action="{{ route('kusioner.destroy', $kusioner) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-primary" onclick="return true">Hapus</button>
          </form>
        </div>
      </div>
      {{-- <a href="{{ route('kusioner.delete',$kusioner->id) }}" class="btn btn-primary ">Hapus</a> --}}
    </div>
  </div>


@endforeach
@endsection