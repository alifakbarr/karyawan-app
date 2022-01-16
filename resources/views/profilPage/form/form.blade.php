  <div class="mb-3">
    <label for="nip" class="form-label fw-bold">NIP</label>
    <input type="number" class="form-control" id="nip" placeholder="Masukkan NIP" name="nip" value="{{ old('nip') ?? $karyawan->nip }}" required>
    {{-- @error('nip')
    <div class="nama text-danger">
      {{ $message }}
    </div>
    @enderror --}}
  </div>
  <div class="mb-3">
    <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama" value="{{ old('nama') ?? $karyawan->nama }}" required>
  </div>
  <p class="form-label fw-bold">Masukkan bagian</p>
  <div class="d-flex justify-content-evenly flex-wrap">
  @foreach ($jobs as $job)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="job" id="{{ $job->id }}" value="{{ $job->id }}" required
        @if (!$karyawan->Job)
        
        @else
        {{ $karyawan->Job->id === $job->id ? 'checked':''}}
        @endif
        >
        <label class="form-check-label" for="{{ $job->id }}">
          {{ $job->nama }}
        </label>
      </div>
   @endforeach
  </div> 
  {{-- @error('job')
  <div class="nama text-danger">
    {{ $message }}
  </div>
  @enderror     --}}
  @php ($no = 1)
  <div class="mb-3">
    <p for="tanggalLahir" class="form-label fw-bold">Jenis Kelamin</p>
    @foreach (['l' => "Laki-Laki", 'p' => "Perempuan"] as $jenis_kelamin =>$jk)      
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" required name="jenis_kelamin" id="" value="{{ $jenis_kelamin }}" {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == $jenis_kelamin ? "checked" : "" }}>
      <label class="form-check-label" for="">{{ $jk }}</label>
    </div>
    @endforeach
  </div>
  <div class="mb-3">
    <label for="date" class="form-label fw-bold">Tanggal Lahir</label>
    <input type="date" class="form-control" id="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $karyawan->tanggal_lahir }}" required>
  </div>
  <div class="mb-3">
    <label for="tempatLahir" class="form-label fw-bold">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $karyawan->tempat_lahir }}" required>
  </div>
  <div class="mb-3">
    <label for="noHp" class="form-label fw-bold">No Hp</label>
    <input type="text" class="form-control" id="noHp" name="no_hp" value="{{ old('no_hp') ?? $karyawan->no_hp }}" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label fw-bold">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $karyawan->email}}" required>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label fw-bold">Alamat</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat" required>{{ old('alamat') ?? $karyawan->alamat }}</textarea>
  </div>
  <div class="mb-3">
    <label for="formFileSm" class="form-label fw-bold">Foto</label>
    <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto" value="{{ old('foto' ?? $karyawan->foto) }}">
  </div>