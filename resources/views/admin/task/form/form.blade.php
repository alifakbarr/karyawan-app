  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label fw-bold">Nama Proyek</label>
    <input type="text" class="form-control" name="judul" id="exampleFormControlInput1" placeholder="Judul proyek" value="{{ old('judul') ?? $task->judul }}">
    @error('judul')
    <div class="nama text-danger mt-1">
      {{ $message }}
    </div>
    @enderror  
  </div>
  <div class="input-group mb-3">
        <span class="input-group-text">Mulai</span>
        <input type="date" class="form-control" placeholder="Username" aria-label="Username" name="start" value="{{ old('start') ?? $task->start }}">
        <span class="input-group-text">Akhir</span>
        <input type="date" class="form-control" placeholder="Server" aria-label="Server" name="deadLine" value="{{ old('deadLine') ?? $task->deadLine }}">
  </div>
  @error('start')
  <div class="nama text-danger mt-1">
    {{ $message }}
  </div>
  @enderror
  @error('deadLine')
  <div class="nama text-danger mt-1">
    {{ $message }}
  </div>
  @enderror
  <div class="mb-3">
    <label class="form-label fw-bold">Keterangan Proyek</label>
    <textarea class="form-control" id="editor" rows="1" name="keterangan" placeholder="keterangan proyek" >{{ old('keterangan') ?? $task->keterangan }}</textarea>
    @error('keterangan')
    <div class="nama text-danger mt-1">
      {{ $message }}
    </div>
    @enderror

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Bagian</th>
          <th scope="col">Karyawan</th>
          <th scope="col">
            <button class="btn btn-sm btn-success">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
              </svg>
            </button>
          </th>
        </tr>
      </thead>
      <tbody>
        @php ($no = 4)
        @for ($i = 0; $i < $no; $i++)  
        <tr>
          <td>
            <select class="form-select mb-1" aria-label="Default select example">
              <option selected>Pilih bagian</option>
              <option value="1">UI/UX</option>
              <option value="2">Frontend</option>
              <option value="3">Backend</option>
              <option value="4">Analisis Database</option>
            </select>
              <div class="input-group mb-1">
                  <span class="input-group-text">Mulai</span>
                  <input type="date" class="form-control" placeholder="Username" aria-label="Username">
                  <span class="input-group-text">Akhir</span>
                  <input type="date" class="form-control" placeholder="Server" aria-label="Server">
            </div>
          </td>
          <td>
            <table class="table">
                <thead>
                  
                  <tr>
                    <th scope="col">Tambah Karyawan</th>
                    <th scope="col">
                      <button class="btn btn-sm btn-success">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                      </button>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @php ($no2=2)
                  @for ($j = 0; $j < $no2; $j++)                      
                  <tr>
                    <td>
                      <select class="form-select me-2" aria-label="Default select example">
                        <option selected>Pilih Karyawan</option>
                        <option value="1">Canisius Renandatta | Senior Programmer</option>
                        <option value="2">Rachmad Firmansyah | Senior Programmer</option>
                        <option value="4">Alif Akbar Irdhobilla | Senior Programmer</option>
                        <option value="3">Wahyu Kharisma Pujiono | Programmer Mobile</option>
                        <option value="8">Anhar Setiawan | Senior Programmer</option>
                        <option value="8">Aldo Reghan | Senior Programmer</option>
                        <option value="5">Fajar Aminullah | UI/UX</option>
                        <option value="7">Muhammad Endi | UI/UX</option>
                        <option value="6">Bagus Kurniawan | Analisis Database</option>
                        <option value="6">Ulfah Malihatin | Analisis Database</option>
                      </select>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
                        </svg>
                      </button>
                    </td>
                  </tr>
                  @endfor                 
                </tbody>
              </table>
          </td>
          <td>
            <button class="btn btn-sm btn-danger">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
              </svg>
            </button>
          </td>
        </tr>
        @endfor
      </tbody>
    </table>
{{-- 
    @foreach (['belum_diambil' => "Belum Diambil", 'sudah_diambil' => "Sudah Diambil"] as $status =>$sts)      
    <div class="form-check form-check-inline">
      <input class="form-check-input" type="radio" name="status" id="" value="{{ $status }}" {{ old('status', $task->status) == $status ? "checked" : "" }}>
      <label class="form-check-label" for="">{{ $sts }}</label>
    </div>
    @endforeach --}}

</div>
