  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Task</label>
    <input type="text" class="form-control" name="judul" id="exampleFormControlInput1" placeholder="Judul task" value="{{ old('judul') ?? $task->judul }}">
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
    <label class="form-label">Keterangan</label>
    <textarea class="form-control" id="editor" rows="3" name="keterangan" placeholder="keterangan task" >{{ old('keterangan') ?? $task->keterangan }}</textarea>
    @error('keterangan')
    <div class="nama text-danger mt-1">
      {{ $message }}
    </div>
    @enderror
</div>
