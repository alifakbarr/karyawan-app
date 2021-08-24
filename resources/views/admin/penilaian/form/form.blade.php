<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Pertanyaan</th>
        <th scope="col">Nilai</th>
      </tr>
    </thead>
    <tbody>
    @php ($no = 1)
    @foreach ($kusioners as $kusioner)
      <tr>
        <th scope="row">{{ $no++ }}</th>
        <td>{{ $kusioner->pertanyaan }}</td>
        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nilai" id="pertanyaan{{ $kusioner->pertanyaan }}" value="1">
                <label class="form-check-label" for="pertanyaan{{ $kusioner->pertanyaan }}">1</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="nilai" id="inlineRadio2{{ $kusioner->id }}" value="2">
                <label class="form-check-label" for="inlineRadio2{{ $kusioner->id }}">2</label>
            </div>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>