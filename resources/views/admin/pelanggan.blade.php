@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.10.24/datatables.min.css"/>
@endpush

@section('header')
    Pelanggan
@endsection 
 
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah Data</button>
            </div>
            <div class="col-12">
                <hr>
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="table_id" class="text-center table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Alamat</th>
                                <th>No Handphone</th>
                                <th>Jenis Kelamin</th>
                                <th>Produk Yang Dibeli</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggan as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->no_hp }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                {{-- menampilkan data dengan langsung memanggil funtion relasinya --}}
                                <td>{{ $data->nomor->detail_nomor}} - {{ $data->nomor->operator->nama}} 
                                </td> 
                                <td class="text-left">
                                    <a href="#" data-id="{{ $data->id }}" class="badge badge-warning btn-edit">Edit</a>
                                    <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                                        <form action="{{ route('pelanggan.destroy', $data->id) }}" id="delete{{ $data->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        </form> 
                                        Hapus
                                    </a> 
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@section('modal')
    <div class="modal fade" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pelanggan.store')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Pelanggan 
                            @error('nama') <b @error('nama') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                          </label>
                          <input type="text" name="nama" value="{{ old('nama' ) }}" class="form-control">
                        </div> 
                        <div class="form-group">
                          <label>Alamat 
                            @error('alamat') <b @error('alamat') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                          </label>
                          <input type="text" name="alamat" value="{{ old('alamat' ) }}" class="form-control">
                        </div> 
                        <div class="form-group">
                            <label>Jenis Kelamin
                                @error('jenis_kelamin') <b @error('jenis_kelamin') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                              </label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="" hidden>Pilih Jenis Kelamin Pelanggan !</option>
                                <option name="jenis_kelamin" value="Laki-Laki" @if(old('jenis_kelamin') == "Laki-Laki") selected @endif>Laki-Laki</option>
                                <option name="jenis_kelamin" value="Perempuan" @if(old('jenis_kelamin') == "Perempuan") selected @endif>Perempuan</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label>Nomor Handphone 
                              @error('no_hp') <b @error('no_hp') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                            </label>
                            <input type="number" name="no_hp" value="{{ old('no_hp' ) }}" class="form-control">
                          </div>
                        <div class="form-group">
                            <label>Produk Yang Dibeli 
                                @error('nomor_id') <b @error('nomor_id') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                              </label>
                            <select name="nomor_id" class="form-control">
                              <option value="" hidden>Pilih Produk Yang Dibeli Pelanggan !</option>
                              @foreach ($nomor as $data_nomor)
                                <option name="nomor_id" value="{{ $data_nomor->id }}" @if(old('nomor_id') == "{{ $data_nomor->id }}") selected @endif>{{ $data_nomor->detail_nomor }} | Terjual tanggal : {{ $data_nomor->tgl_jual }}</option>
                              @endforeach
                            </select>
                        </div>   
                      </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="" method="POST" id="form-edit">
                @csrf
            <div class="modal-body">
                
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="button" class="btn btn-primary btn-update">Update</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-scripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
 
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/dt-1.10.24/datatables.min.js"></script>

    <script>
        // alert konfirmasi hapus data
        $(".swal-confirm").click(function(e){
            id = e.target.dataset.id;
            swal({
                title: "Anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Data berhasil dihapus!", {
                    icon: "success",
                    });
                    $(`#delete${id}`).submit();
                } else {

                }
            })
        });

        @if($errors->any())
            $('#createModal').modal('show')
        @endif

        $('.btn-edit').on('click', function(){
            let id = $(this).data('id')
            $.ajax({
                url:`pelanggan/${id}/edit`,
                method:"GET",
                success: function(data){
                    $('#editModal').find('.modal-body').html(data)
                    $('#editModal').modal('show')
                },
                error: function(error){
                    console.log(error)
                }
            })
        })
        
        $('.btn-update').on('click', function(){
            let id = $('#form-edit').find('#id_update').val()
            let formData = $('#form-edit').serialize()
            $.ajax({
                url:`pelanggan/${id}`,
                method:"PATCH",
                data: formData,
                success: function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('pelanggan')
                },
                error: function(error){
                    console.log(error.responseJSON)
                    let error_log = error.responseJSON.errors;
                    if (error.status == 422 ){
                        if (typeof(error_log.nama) !== 'undefined'){
                            $('#editModal').find('[name="nama"]').prev()
                            .html('<span style="color:red">Nama Pelanggan | '+ error_log.nama[0]+'</span>')
                        }else{
                            $('#editModal').find('[name="nama"]').prev().html('<span>Nama Pelanggan</span>')
                        }
                        if (typeof(error_log.alamat) !== 'undefined'){
                            $('#editModal').find('[name="alamat"]').prev()
                            .html('<span style="color:red">Alamat | '+ error_log.alamat[0]+'</span>')
                        }else{
                            $('#editModal').find('[name="alamat"]').prev().html('<span>Alamat</span>')
                        }
                        if (typeof(error_log.jenis_kelamin) !== 'undefined'){
                            $('#editModal').find('[name="jenis_kelamin"]').prev()
                            .html('<span style="color:red">Jenis Kelamin | '+ error_log.jenis_kelamin[0]+'</span>')
                        }else{
                            $('#editModal').find('[name="jenis_kelamin"]').prev().html('<span>Jenis Kelamin</span>')
                        }
                        if (typeof(error_log.no_hp) !== 'undefined'){
                            $('#editModal').find('[name="no_hp"]').prev()
                            .html('<span style="color:red">Nomor Handphone | '+ error_log.no_hp[0]+'</span>')
                        }else{
                            $('#editModal').find('[name="no_hp"]').prev().html('<span>Nomor Handphone</span>')
                        }
                        if (typeof(error_log.nomor_id) !== 'undefined'){
                            $('#editModal').find('[name="nomor_id"]').prev()
                            .html('<span style="color:red">Produk Yang Dibeli Pelanggan | '+ error_log.nomor_id[0]+'</span>')
                        }else{
                            $('#editModal').find('[name="nomor_id"]').prev().html('<span>Produk Yang Dibeli Pelanggan</span>')
                        }
                        
                    }
                }
            })
        })
    </script>
@endpush
 