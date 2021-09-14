@extends('admin.layout.template')
@section('title')
    {{ $karyawan->nama }}
@endsection
@section('content')
    <h3>Edit Role</h3>
    <form action="{{ route('handleKaryawan.updateRole',$roleId->model_id) }}" method="get">
        @csrf
        @method('patch')
        <select class="form-select" name="role_id" aria-label="Default select example">
            <option selected>Pilih Role</option>
            @if ($user->name ==='admin')
                <option value="1" {{ $user->name ? 'selected' : '' }} >Admin</option>
                <option value="2">HeadOf</option>
                <option value="3">User</option>
            @elseIf($user->name === 'headOf')
                <option value="2" {{ $user->name ? 'selected' : '' }} >HeadOf</option>
                <option value="1">Admin</option>
                <option value="3">User</option>
            @elseIf($user->name === 'user')
                <option value="3" {{ $user->name ? 'selected' : '' }} >User</option>
                <option value="1">Admin</option>
                <option value="2">HeadOf</option>
            @endif
            {{-- @foreach ($roles as $role)
            <option value="{{ $role }}" {{ $role == $user->name ? 'selected' : '' }} >{{ ucwords($role) }}</option>
            @endforeach --}}
          </select>  
          <div class="d-flex justify-content-end mt-2">
              <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
          </div>
    </form>
@endsection