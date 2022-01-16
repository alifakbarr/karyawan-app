<div class="">
    <label for="nama" class="form-label fw-bold">Nama</label>
    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Jabatan" value="{{old('nama')?? $job->nama}}" >
</div>
@error('nama')
<div class="nama text-danger mt-1">
    {{ $message }}
</div>
@enderror
<div class="mt-3">
    <label for="keterangan" class="form-label fw-bold">Deskripsi</label>
    <textarea class="form-control" name="keterangan" id="editor" rows="3" placeholder="Deskripsi jabatan">{{ old('keterangan')?? $job->keterangan }}</textarea>
</div>
@error('keterangan')
<div class="keterangan text-danger mt-1">
    {{ $message }}
</div>
@enderror
<div class="d-flex justify-content-end mt-3">
    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
</div>