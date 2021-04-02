<div class="row"> 
    <div class="col-md-12">
        {{-- form input hidden untuk mengakali untuk mendapatkan id dari data yg sedang diedit --}}
        <input type="hidden" name="id" value="{{ $nomor->id}}" id="id_update">
        <div class="form-group">
            <label>Nomor Cantik (Contoh format : 0812-3456-7890)
              @error('detail_nomor') <b @error('detail_nomor') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
            </label>
            <input type="text" name="detail_nomor" value="{{ $nomor->detail_nomor }}" class="form-control">
          </div> 
          <div class="form-group">
              <label>Operator 
                  @error('operator') <b @error('operator') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                </label> 
                <select name="operator" class="form-control">
                  <option value="" hidden>Silahkan Pilih Jumlah Digit!</option>
                  <option name="operator" value="simpati" {{ $nomor->operator == "simpati" ? 'selected' : '' }}>simPATI</option>
                  <option name="operator" value="as" {{ $nomor->operator == "as" ? 'selected' : '' }}>Kartu AS</option>
                  <option name="operator" value="halo" {{ $nomor->operator == "halo" ? 'selected' : '' }}>Kartu Halo</option>
                  <option name="operator" value="three" {{ $nomor->operator == "three" ? 'selected' : '' }}>3</option>
                  <option name="operator" value="smartfren" {{ $nomor->operator == "smartfren" ? 'selected' : '' }}>Smartfren</option>
                  <option name="operator" value="axis" {{ $nomor->operator == "axis" ? 'selected' : '' }}>AXIS</option>
                  <option name="operator" value="indosat" {{ $nomor->operator == "indosat" ? 'selected' : '' }}>Indosat Ooredoo</option>
                  <option name="operator" value="xl" {{ $nomor->operator == "xl" ? 'selected' : '' }}>XL</option>
                </select>
          </div>
          <div class="form-group">
              <label>Harga
                @error('harga') <b @error('harga') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
              </label>
              <input type="number" name="harga" value="{{ $nomor->harga }}" class="form-control">
          </div>
          <div class="form-group">
              <label>Jumlah Digit 
                  @error('jumlah_digit') <b @error('jumlah_digit') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                </label>
              <select name="jumlah_digit" class="form-control">
                <option value="" hidden>Silahkan Pilih Jumlah Digit!</option>
                <option name="jumlah_digit" value="10" {{ $nomor->jumlah_digit == 10 ? 'selected' : '' }}>10</option>
                <option name="jumlah_digit" value="11" {{ $nomor->jumlah_digit == 11 ? 'selected' : '' }}>11</option>
                <option name="jumlah_digit" value="12" {{ $nomor->jumlah_digit == 12 ? 'selected' : '' }}>12</option>
              </select>
          </div>
    </div>
  </div>