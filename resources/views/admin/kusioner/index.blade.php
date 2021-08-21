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
                    <a href="{{ route('kusioner.edit', $kusioner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
@endsection