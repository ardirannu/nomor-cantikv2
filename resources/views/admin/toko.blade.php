@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.10.24/datatables.min.css"/>
@endpush

@section('header')
    Informasi Toko
@endsection 

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
              @can('tombol_superadmin')
                  <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah Data</button>
              @endcan
            </div>
            <div class="col-12">
                <hr>
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    @can('table_superadmin')
                    <table id="table_id" class="text-center table table-striped" >
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama Toko</th>
                              <th>Alamat</th>
                              <th>Detail Rekening</th>
                              <th>Link Tokopedia</th>
                              <th>Link Lazada</th>
                              <th>Link Shopee</th>
                              <th>Link Bukalapak</th>
                              <th>Nomor Whatsapp</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach ($toko as $no => $data)
                          <tr>
                              <td>{{ $no+1 }}</td>
                              <td>{{ $data->nama }}</td>
                              <td>{{ $data->alamat }}</td>
                              <td>{{ $data->detail_rekening }}</td>
                              <td>{{ $data->link_tokped }}</td>
                              <td>{{ $data->link_lazada }}</td>
                              <td>{{ $data->link_shopee }}</td>
                              <td>{{ $data->link_bukalapak }}</td>
                              <td>{{ $data->no_whatsapp }}</td>
                              <td>
                                  <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                                      <form action="{{ route('toko.destroy', $data->id) }}" id="delete{{ $data->id }}" method="POST">
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
                    @endcan
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
                <form action="{{ route('toko.store')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Nama Toko
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
                          <label>Detail Rekening
                            @error('detail_rekening') <b @error('detail_rekening') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                          </label>
                          <input type="text" name="detail_rekening" value="{{ old('detail_rekening' ) }}" class="form-control">
                        </div>  
                        <div class="form-group">
                          <label>Link Tokopedia
                            @error('link_tokped') <b @error('link_tokped') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                          </label>
                          <input type="text" name="link_tokped" value="{{ old('link_tokped' ) }}" class="form-control">
                        </div>  
                        <div class="form-group">
                          <label>Link Lazada
                            @error('link_lazada') <b @error('link_lazada') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                          </label>
                          <input type="text" name="link_lazada" value="{{ old('link_lazada' ) }}" class="form-control">
                        </div>  
                        <div class="form-group">
                          <label>Link Shopee
                            @error('link_shopee') <b @error('link_shopee') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                          </label>
                          <input type="text" name="link_shopee" value="{{ old('link_shopee' ) }}" class="form-control">
                        </div>  
                        <div class="form-group">
                          <label>Link Bukalapak
                            @error('link_bukalapak') <b @error('link_bukalapak') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                          </label>
                          <input type="text" name="link_bukalapak" value="{{ old('link_bukalapak' ) }}" class="form-control">
                        </div>  
                        <div class="form-group">
                          <label>Nomor Whatsapp ( Awali dengan angka 62 ! )
                            @error('no_whatsapp') <b @error('no_whatsapp') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror
                          </label>
                          <input type="number" name="no_whatsapp" value="{{ old('no_whatsapp' ) }}" class="form-control">
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
        
    </script>
@endpush
 