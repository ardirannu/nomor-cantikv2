<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" type="img/png" href="{{ asset('assets/nomorcantik/img/logo.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/nomorcantik/css/style.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Zahira Cell | Website Nomor Cantik | Makassar</title>
</head>

<body>
    <!-- Jumbotron -->
    <section>
        <div class="jumbotron jumbotron-fluid">
            <div class=" d-md-none d-md-block d-xl-none">
                <div class="row text-center">
                    <div class="col">
                        <img src="{{ asset('assets/nomorcantik/img/ZahiraCell.svg') }}" class="zcell">
                    </div>
                </div>
                <div class="row text-center mt-2">
                    <div class="col">
                        <img src="{{ asset('assets/nomorcantik/img/caraMudah.svg') }}">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <img src="{{ asset('assets/nomorcantik/img/nomor.svg') }}" class="nomorZahira">
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Modal Cara pembelian -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cara Pembelian Nomor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>1. Konfirmasi terlebih dahulu nomor yang anda
                                inginkan lewat WhatsAPP yang tercantum di panel halaman utama</td>
                        </tr>
                        <br>
                        <tr>
                            <td>2. Transfer Via Bank Rek BCA: {{ $toko->detail_rekening }}</td>
                        </tr>
                        <tr>
                            <td>
                                3. Kemudian WA nomor yang dipilih, disertai nama,
                                alamat lengkap, dan nomor telepon anda ke +{{ $toko->no_whatsapp }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                4. Setelah kami menerima konfirmasi pembayaran,
                                nomor yang anda pesan akan kami segera kirim
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--end Jumbotron  -->

    <!-- berdasarkan operator -->
    <section class="widgetOperator">
        <div class="container">
            <div class="card text-white bg-operator text-center">
                <div class="card-header text-center">
                    <a href="{{ route('operator.data', 'simpati') }}"><img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuSimpati.svg') }}" class="simpati mr-2"></a>
                    <a href="{{ route('operator.data', 'as') }}"><img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuAS.svg') }}" class="kartuAS mr-2"></a>
                    <a href="{{ route('operator.data', 'halo') }}"><img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuHalo.svg') }}" class="kartuHalo mr-2"></a>
                    <a href="{{ route('operator.data', 'three') }}"><img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuTri.svg') }}" class="tri"></a>
                    <a href="{{ route('operator.data', 'smartfren') }}"><img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuSmart.svg') }}" class="smart mr-2"></a>
                    <a href="{{ route('operator.data', 'axis') }}"><img src="{{ asset('assets/nomorcantik/img/logoProvider/axis 2.svg') }}" class="axis mr-2"></a>
                    <a href="{{ route('operator.data', 'indosat') }}"><img src="{{ asset('assets/nomorcantik/img/logoProvider/indosat(1).svg') }}" class="indosat mr-2"></a>
                    <a href="{{ route('operator.data', 'xl') }}"><img src="{{ asset('assets/nomorcantik/img/logoProvider/xl(1).svg') }}" class="xl"></a>
                </div>
                <div class="card-header text-center">
                    <div class="linkNav">
                        <a href="">Halaman Utama</a>
                        <a href="" class="ml-4" data-toggle="modal" data-target="#exampleModal">Cara Pembelian</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('search')}}" method="GET">
                        <div class="form-inline justify-content-center">
                            <input type="text" name="nomor" class="inputNomor mr-2 mt-2" placeholder="Masukkan nomor">
                            <div class="dropdown mr-2 mt-2">
                                <select name="operator" class="dropdown-select">
                                    <option selected disabled>Pilih Operator</option>
                                    <option name="operator" value="simpati">simPATI</option>
                                    <option name="operator" value="as">Kartu AS</option>
                                    <option name="operator" value="halo">Kartu Halo</option>
                                    <option name="operator" value="three">3</option>
                                    <option name="operator" value="smartfren">Smartfren</option>
                                    <option name="operator" value="axis">AXIS</option>
                                    <option name="operator" value="indosat">Indosat Ooredoo</option>
                                    <option name="operator" value="xl">XL</option>
                                </select>
                            </div>
                            <div class="dropdown mr-2 mt-2">
                                <select name="posisi" class="dropdown-select">
                                    <option selected disabled>Pilih Posisi</option>
                                    <option value="depan">Depan</option>
                                    <option value="tengah">Tengah</option>
                                    <option value="belakang">Belakang</option>
                                </select> 
                            </div>
                            <div class="dropdown mr-2 mt-2">
                                <select name="kisaran" class="dropdown-select">
                                    <option selected disabled>Pilih Kisaran Harga</option>
                                    <option value="1">Rp. 100.000 - 300.000</option>
                                    <option value="2">Rp. 300.000 - 500.000</option>
                                    <option value="3">Rp. 500.000 - 1.000.000</option>
                                    <option value="4">Rp. 1.000.000 - 3.000.000</option>
                                    <option value="5">Diatas Rp. 3.000.000</option>
                                </select>
                            </div>
                            <div class="dropdown mr-2 mt-2">
                                <select name="digit" class="dropdown-select">
                                    <option selected disabled>Pilihi digit</option>
                                    <option value="10">10</option>
                                    <option value=11>11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="dropdown mr-2 mt-2">
                                <select name="orderby" class="dropdown-select">
                                    <option selected disabled>Urutkan Harga</option>
                                    <option value="1">Termurah -> Termahal</option>
                                    <option value="2">Termahal -> Termurah</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mt-2">Cari Nomor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->

    <!-- KoleksiTerbaik -->
    <section class="mt-5">
        <div class="row justify-content-center">
            <div class="col-md-2 d-none d-xl-block">
                <div class="row text-center">
                    <div class="col">
                        <h4 class="text-white">Koleksi Terbaik</h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($nomor_terbaik as $data_nomor_terbaik)
                    <button type="button" data-id="{{ $data_nomor_terbaik->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_nomor_terbaik->detail_nomor}}
                    </button>
                    @endforeach
                </div>
            </div>
            <div class="col-md-5">
                <div class="row justify-content-center text-center">
                    <div class="col">
                        <img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuSimpati.svg') }}">
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    @foreach ($nomor_simpati as $data_nomor_simpati)
                    <button type="button" data-id="{{ $data_nomor_simpati->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_nomor_simpati->detail_nomor}}
                    </button>
                    @endforeach
                </div>

                <div class="row justify-content-center text-center mt-5">
                    <div class="col">
                        <a href="">
                        <img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuAS.svg') }}">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    @foreach ($nomor_kartu_as as $data_nomor_kartu_as)
                    <button type="button" data-id="{{ $data_nomor_kartu_as->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_nomor_kartu_as->detail_nomor}}
                    </button>
                    @endforeach
                </div>
                <div class="row justify-content-center text-center mt-5">
                    <div class="col">
                        <a href="">
                        <img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuHalo.svg') }}">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    @foreach ($nomor_kartu_halo as $data_nomor_kartu_halo)
                    <button type="button" data-id="{{ $data_nomor_kartu_halo->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_nomor_kartu_halo->detail_nomor}}
                    </button>
                    @endforeach
                </div>
                <div class="row justify-content-center text-center mt-5">
                    <div class="col">
                        <a href=""></a>
                        <img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuTri.svg') }}">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    @foreach ($nomor_three as $data_three)
                    <button type="button" data-id="{{ $data_three->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_three->detail_nomor}}
                    </button>
                    @endforeach
                </div>
                <div class="row justify-content-center text-center mt-5">
                    <div class="col">
                        <a href="">
                        <img src="{{ asset('assets/nomorcantik/img/logoProvider/kartuSmart.svg') }}">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    @foreach ($nomor_smartfren as $data_smartfren)
                    <button type="button" data-id="{{ $data_smartfren->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_smartfren->detail_nomor}}
                    </button>
                    @endforeach
                </div>
                <div class="row justify-content-center text-center mt-5">
                    <div class="col">
                        <a href="">
                        <img src="{{ asset('assets/nomorcantik/img/logoProvider/axis 2.svg') }}" style="width: 7rem;">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    @foreach ($nomor_axis as $data_axis)
                    <button type="button" data-id="{{ $data_axis->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_axis->detail_nomor}}
                    </button>
                    @endforeach
                </div>
                <div class="row justify-content-center text-center mt-5">
                    <div class="col">
                        <a href="">
                        <img src="{{ asset('assets/nomorcantik/img/logoProvider/indosat(1).svg') }}">
                        </a>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    @foreach ($nomor_indosat as $data_indosat)
                    <button type="button" data-id="{{ $data_indosat->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_indosat->detail_nomor}}
                    </button>
                    @endforeach
                </div>
                <div class="row justify-content-center text-center mt-5">
                    <div class="col">
                        <a href="">
                        <img src="{{ asset('assets/nomorcantik/img/logoProvider/xl(1).svg') }}">
                        <a href=""></a>
                    </div>
                </div>
                <div class="row justify-content-center mt-2">
                    @foreach ($nomor_xl as $data_xl)
                    <button type="button" data-id="{{ $data_xl->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_xl->detail_nomor}}
                    </button>
                    @endforeach
                </div>
            </div>

            <!-- KoleksiMurah -->
            <div class="col-md-2 d-none d-xl-block">
                <div class="row text-center">
                    <div class="col">
                        <h4 class="text-white">Koleksi Murah</h4>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($nomor_termurah as $data_nomor_termurah)
                    <button type="button" data-id="{{ $data_nomor_termurah->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                        {{ $data_nomor_termurah->detail_nomor}}
                    </button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalNomor" tabindex="-1" role="document" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content bgModal modal-data">
                   
                </div>
            </div>
        </div>

    </section>
    <!-- end -->

    <!-- footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col col-md-3 zahiraCell">
                    <h5 class="font-weight-bolder text-white">{{ $toko->nama }}</h5>
                    <p class="font-weight-lighter text-white alamat">{{ $toko->alamat }}</p>
                </div>
                <div class="col-12 col-md-3 rekBCA">
                    <h5 class="font-weight-bolder text-white">Rekening BCA</h5>
                    <p class="font-weight-lighter text-white">{{ $toko->detail_rekening }}</p>
                </div>
                <div class="col-12 col-md-3 cs">
                    <h5 class="font-weight-bolder text-white">Costumer Service</h5>
                    <p class="font-weight-lighter text-white">+{{ $toko->no_whatsapp }}</p>
                </div>
                <div class="col col-md-3 temukanKami">
                    <h5 class="font-weight-bolder text-white">Temukan Kami</h5>
                   <div class="row text-center">
                        <div class="col"><a target="_blank" href="{{ $toko->link_tokped }}"><img src="{{ asset('assets/nomorcantik/img/tokopedia.png') }}" class="tokopedia"></a></div>
                        <div class="col"><a target="_blank" href="{{ $toko->link_shopee }}"><img src="{{ asset('assets/nomorcantik/img/shopee.png') }}" class="shopee"></a></div>
                        <div class="col"><a target="_blank" href=""><img src="{{ asset('assets/nomorcantik/img/facebook.png') }}" class="facebook"></a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="font-weight-lighter copyright"> © Copyright PT. Synergy Utility Network. All Rights
                        Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- end -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script >
        $(document).ready(function() {
        $('.modal-nomor').on('click', function(){
            let id = $(this).data('id')
            $.ajax({
                url:`modal/${id}`,
                method:"GET",
                success: function(data){
                    $('#modalNomor').find('.modal-data').html(data)
                    $('#modalNomor').modal('show')
                },
                error: function(error){
                    console.log(error)
                }
            })
        })
    });
    </script>   

</body>

</html>



