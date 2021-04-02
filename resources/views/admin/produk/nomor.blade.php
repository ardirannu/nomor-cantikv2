@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('header')
    Nomor Cantik
@endsection 
 
@section('content')
    <div class="section-body">
        @if (session('input_success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
                {{ session('input_success')}}
            </div>  
        </div>
        @endif
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah Data</button>
                <button class="btn btn-success" data-toggle="modal" data-target="#importExcel">Import Excel</button>
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
                                <th>Nomor Cantik</th>
                                <th>Operator</th>
                                <th>Jumlah Digit</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Tanggal Terjual</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nomor as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->detail_nomor }}</td>
                                {{-- menampilkan data dengan langsung memanggil funtion relasinya --}}
                                <td>{{ $data->operator}}
                                </td> 
                                <td>{{ $data->jumlah_digit }}</td>
                                <td>Rp. {{ $data->harga }}</td>
                                <td>{{ $data->status }}</td>
                                <td>{{ $data->tgl_jual }}</td>
                                <td class="text-left">
                                    <a href="#" data-id="{{ $data->id }}" class="badge badge-warning btn-edit">Edit</a>
                                    <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                                        <form action="{{ route('nomor.destroy', $data->id) }}" id="delete{{ $data->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        </form> 
                                        Hapus
                                    </a>
                                    @if ($data->status == 'Terjual')
                                        
                                    @else
                                        <a href="#" data-id="{{ $data->id }}" class="badge badge-primary swal-update-status">
                                            <form action="{{ url('admin/produk/nomor/'.$data->id.'/updatestatus') }}" id="update-status{{ $data->id }}" method="POST">
                                            @csrf
                                            @method('patch')
                                            </form>  
                                            Terjual
                                        </a>
                                    @endif
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
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('nomor.store')}}" method="POST">
                    @csrf
                    <div class="row"> 
                      <div class="col-md-12">
                        <table class="table table-sm" id="deleteRow">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Operator</th>
                                    <th>Harga</th>
                                    <th>Jumlah Digit</th>
                                    <th><a href="#" class="btn btn-sm btn-primary addRow"><i class="far fa-plus-square"></i></a></th>
                                </tr>
                            </thead>
                            <tbody id="tbodyaddrow">
                               <tr>
                               <td> 
                                    <input type="text" name="detail_nomor[]" class="form-control" required>
                                </td>
                               <td>
                                    <select name="operator[]" class="form-control" required>
                                        <option value="" hidden>Silahkan Pilih Operator!</option>
                                        <option name="operator[]" value="simpati" @if(old('operator') == 10) selected @endif>simPATI</option>
                                        <option name="operator[]" value="as" @if(old('operator') == 11) selected @endif>Kartu AS</option>
                                        <option name="operator[]" value="halo" @if(old('operator') == 12) selected @endif>Kartu Halo</option>
                                        <option name="operator[]" value="three" @if(old('operator') == 12) selected @endif>3</option>
                                        <option name="operator[]" value="smartfren" @if(old('operator') == 12) selected @endif>Smartfren</option>
                                        <option name="operator[]" value="axis" @if(old('operator') == 12) selected @endif>AXIS</option>
                                        <option name="operator[]" value="indosat" @if(old('operator') == 12) selected @endif>Indosat Ooredoo</option>
                                        <option name="operator[]" value="xl" @if(old('operator') == 12) selected @endif>XL</option>
                                    </select>
                                </td>   
                               <td>
                                    @error('harga[]') <b @error('harga[]') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror     
                                    <input type="number" name="harga[]" class="form-control" required>
                                </td>
                               <td>
                                    <select name="jumlah_digit[]" class="form-control" required>
                                        <option value="" hidden>Silahkan Pilih Jumlah Digit!</option>
                                        <option name="jumlah_digit" value="10" @if(old('jumlah_digit') == 10) selected @endif>10</option>
                                        <option name="jumlah_digit" value="11" @if(old('jumlah_digit') == 11) selected @endif>11</option>
                                        <option name="jumlah_digit" value="12" @if(old('jumlah_digit') == 12) selected @endif>12</option>
                                    </select>
                               </td>
                               <td><a href="#" class="btn btn-sm btn-danger deleteIcon"><i value="Delete" type="button" alt="Delete4" class="fas fa-trash-alt"></i></a></td>
                               </tr>
                               </tr>
                            </tbody>
                        </table> 
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

    <!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="POST" action="{{ url('admin/produk/nomor/import_excel') }}" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Import</button>
						</div>
					</div>
				</form>
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
            $('#table_id').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'pdf', 'excel', 'print'
            ]
        } );
        } );
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.js"></script>

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


        $(".swal-update-status").click(function(e){
            id = e.target.dataset.id;
            swal({
                title: "Tetapkan sebagai produk Terjual ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Produk ditetapkan Terjual!", {
                    icon: "success",
                    });
                    $(`#update-status${id}`).submit();
                } else {

                }
            })
        });

         //ajax addRow
         $('.addRow').on('click',function(){
            addRow();
        });

        function addRow()
        {
            var tr='<tr>'+
            '<td><input type="text" name="detail_nomor[]" class="form-control" required></td>'+
            '<td><select name="operator[]" class="form-control" required><option value="" hidden>Silahkan Pilih Operator!</option><option name="operator[]" value="simpati" @if(old('operator') == 10) selected @endif>simPATI</option><option name="operator[]" value="as" @if(old('operator') == 11) selected @endif>Kartu AS</option><option name="operator[]" value="halo" @if(old('operator') == 12) selected @endif>Kartu Halo</option><option name="operator[]" value="three" @if(old('operator') == 12) selected @endif>3</option><option name="operator[]" value="smartfren" @if(old('operator') == 12) selected @endif>Smartfren</option><option name="operator[]" value="axis" @if(old('operator') == 12) selected @endif>AXIS</option><option name="operator[]" value="indosat" @if(old('operator') == 12) selected @endif>Indosat Ooredoo</option><option name="operator[]" value="xl" @if(old('operator') == 12) selected @endif>XL</option></select></td> '+
            '<td><input type="number" name="harga[]" class="form-control" required></td>'+
            '<td><select name="jumlah_digit[]" class="form-control" required><option value="" hidden>Silahkan Pilih Jumlah Digit!</option><option name="jumlah_digit" value="10" @if(old('jumlah_digit') == 10) selected @endif>10</option><option name="jumlah_digit" value="11" @if(old('jumlah_digit') == 11) selected @endif>11</option><option name="jumlah_digit" value="12" @if(old('jumlah_digit') == 12) selected @endif>12</option></select></td>'+
            '<td><a href="#" class="btn btn-sm btn-danger deleteIcon"><i value="Delete" type="button" alt="Delete4" class="fas fa-trash-alt"></i></a></td>'+
            '</tr>';
            $('#tbodyaddrow').append(tr);
        };

        //method live hanya support di jquery 1.7
        //ajax remove row
        $(document).on("click", ".deleteIcon", function() {

        var indexDelAgent = $(this).index('.deleteIcon')  + 1;
        console.log("after deletion");
        console.log(indexDelAgent);

        document.getElementById("deleteRow").deleteRow(indexDelAgent);

        });

        @if($errors->any())
            $('#createModal').modal('show')
        @endif

        $('.btn-edit').on('click', function(){
            let id = $(this).data('id')
            $.ajax({
                url:`nomor/${id}/edit`,
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
                url:`nomor/${id}`,
                method:"PATCH",
                data: formData,
                success: function(data){
                    $('#editModal').modal('hide')
                    window.location.assign('nomor')
                },
                error: function(error){
                    console.log(error.responseJSON)
                    let error_log = error.responseJSON.errors;
                    if (error.status == 422 ){
                        if (typeof(error_log.detail_nomor) !== 'undefined'){
                            $('#editModal').find('[name="detail_nomor"]').prev()
                            .html('<span style="color:red">Nomor Cantik | '+ error_log.detail_nomor[0]+'</span>')
                        }else{
                            $('#editModal').find('[name="detail_nomor"]').prev().html('<span>Nomor Cantik</span>')
                        }
                        if (typeof(error_log.operator) !== 'undefined'){
                            $('#editModal').find('[name="operator"]').prev()
                            .html('<span style="color:red">Operator | '+ error_log.operator[0]+'</span>')
                        }else{
                            $('#editModal').find('[name="operator"]').prev().html('<span>Operator</span>')
                        }
                        if (typeof(error_log.harga) !== 'undefined'){
                            $('#editModal').find('[name="harga"]').prev()
                            .html('<span style="color:red">Harga | '+ error_log.harga[0]+'</span>')
                        }else{
                            $('#editModal').find('[name="harga"]').prev().html('<span>Harga</span>')
                        }
                        if (typeof(error_log.jumlah_digit) !== 'undefined'){
                            $('#editModal').find('[name="Jumlah Digit"]').prev()
                            .html('<span style="color:red">jumlah_digit | '+ error_log.jumlah_digit[0]+'</span>')
                        }else{
                            $('#editModal').find('[name="jumlah_digit"]').prev().html('<span>Jumlah Digit</span>')
                        }
                        
                    }
                }
            })
        })
    </script>
@endpush
 