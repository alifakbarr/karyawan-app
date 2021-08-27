  <div class="mb-3">
    <label for="nip" class="form-label">NIP</label>
    <input type="number" class="form-control" id="nip" placeholder="Masukkan NIP" name="nip">
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
        <input class="form-check-input" type="radio" name="job" id="{{ $job->id }}" value="{{ $job->id }}">
        <label class="form-check-label" for="{{ $job->id }}">
          {{ $job->nama }}
        </label>
      </div>
   @endforeach
  </div>     
  <div class="mb-3">
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama" placeholder="Masukkan nama" name="nama">
  </div>
  @php ($no = 1)
  <div class="mb-3">
    <p for="tanggalLahir" class="form-label">Jenis Kelamin</p>
    @foreach (['l' => "Laki-Laki", 'p' => "Perempuan"] as $jenis_kelamin =>$jk)      
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="jenis_kelamin" id="" value="{{ $jenis_kelamin }}" {{ old('jenis_kelamin', $karyawan->jenis_kelamin) == $jenis_kelamin ? "selected" : "" }}>
      <label class="form-check-label" for="">{{ $jk }}</label>
    </div>
    @endforeach
  </div>
  <div class="mb-3">
    <label for="date" class="form-label">Tanggal Lahir</label>
    <input type="date" class="form-control" id="date" name="tanggal_lahir">
  </div>
  <div class="mb-3">
    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
    <input type="text" class="form-control" id="tempatLahir" name="tempat_lahir">
  </div>
  <div class="mb-3">
    <label for="noHp" class="form-label">No Hp</label>
    <input type="text" class="form-control" id="noHp" name="no_hp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamat"></textarea>
  </div>
  <div class="mb-3">
    <label for="formFileSm" class="form-label">Foto</label>
    <input class="form-control form-control-sm" id="formFileSm" type="file" name="foto">
  </div>