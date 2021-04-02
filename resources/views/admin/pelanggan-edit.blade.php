<div class="row">
    <div class="col-md-12">
      <input type="hidden" name="id" value="{{ $pelanggan->id}}" id="id_update">
      <div class="form-group">
        <label>Nama Pelanggan 
          @error('nama') <b @error('nama') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
        </label>
        <input type="text" name="nama" value="{{ $pelanggan->nama}}" class="form-control">
      </div> 
      <div class="form-group">
        <label>Alamat 
          @error('alamat') <b @error('alamat') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
        </label>
        <input type="text" name="alamat" value="{{ $pelanggan->alamat}}" class="form-control">
      </div> 
      <div class="form-group">
          <label>Jenis Kelamin
              @error('jenis_kelamin') <b @error('jenis_kelamin') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
            </label>
          <select name="jenis_kelamin" class="form-control">
              <option value="" hidden>Pilih Jenis Kelamin Pelanggan !</option>
              <option name="jenis_kelamin" value="Laki-Laki" {{ $pelanggan->jenis_kelamin == "Laki-Laki" ? 'selected' : '' }}>Laki-Laki</option>
              <option name="jenis_kelamin" value="Perempuan" {{ $pelanggan->jenis_kelamin == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
          </select>
      </div>
      <div class="form-group">
          <label>Nomor Handphone 
            @error('no_hp') <b @error('no_hp') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
          </label>
          <input type="number" name="no_hp" value="{{ $pelanggan->no_hp}}" class="form-control">
        </div>
      <div class="form-group">
          <label>Produk Yang Dibeli 
              @error('nomor_id') <b @error('nomor_id') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
            </label>
          <select name="nomor_id" class="form-control">
            <option value="" hidden>Pilih Produk Yang Dibeli Pelanggan !</option>
            @foreach ($nomor as $data_nomor)
              <option name="nomor_id" value="{{ $data_nomor->id }}" >{{ $data_nomor->detail_nomor }} | Terjual tanggal : {{ $data_nomor->tgl_jual }}</option>
            @endforeach
          </select>
      </div>  
    </div>
  </div>