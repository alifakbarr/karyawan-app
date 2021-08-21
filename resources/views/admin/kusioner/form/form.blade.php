<div class="">
    <label for="exampleFormControlInput1" class="form-label">Kusioner</label>
    <input type="text" class="form-control" name="pertanyaan" id="exampleFormControlInput1" placeholder="Masukkan kusioner">
</div>
@error('pertanyaan')
<div class="nama text-danger mt-1">
    {{ $message }}
</div>
@enderror
