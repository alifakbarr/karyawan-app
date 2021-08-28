  <div class="mb-3">
    <label for="nip" class="form-label">NIP</label>
    <input type="number" class="form-control" id="nip" placeholder="Masukkan NIP" name="nip" value="{{ old('nip') ?? $karyawan->nip }}">
    @error('nip')
    <div class="nama text-danger">
      {{ $message }}
    </div>
    @enderror
  </div>
  <p class="form-label">Masukkan bagian</p>
  <div class="d-flex justify-content-evenly">
  @foreach ($jobs as $job)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="job" id="{{ $job->id }}" value="{{ $job->id }}" 
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
  @error('job')
  <div class="nama text-danger">
    {{ $message }}
  </div>
  @enderror    
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama" value="{{ old('nama') ?? $karyawan->nama }}">
  </div>
  @php ($no = 1)
  <div class="mb-3">
    <p for="tanggalLahir" class="form-label">Jenis Kelamin</p>
    @foreach (['l' => "Laki-Laki", 'p' => "Perempuan"] as $jenis_kelamin =>$jk)      
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="jenis_kelamin" id="" value="{{ $jenis_kelamin }}" {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == $jenis_kelamin ? "checked" : "" }}>
      <label class="form-check-label" for="">{{ $jk }}</label>
    </div>
    @endforeach
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" id="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') ?? $karyawan->tanggal_lahir }}">
  </div>
  <div class="mb-3">
    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir" value="{{ old('tempat_lahir') ?? $karyawan->tempat_lahir }}">
  </div>
  <div class="mb-3">
    <label for="noHp" class="form-label">No Hp</label>
    <input type="text" class="form-control" id="noHp" name="no_hp" value="{{ old('no_hp') ?? $karyawan->no_hp }}">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') ?? $karyawan->email}}">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat">{{ old('alamat') ?? $karyawan->alamat }}</textarea>
  </div>
  <div class="mb-3">
    <label for="formFileSm" class="form-label">Foto</label>
    <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto" value="{{ old('foto' ?? $karyawan->foto) }}">
  </div>