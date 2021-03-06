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
            <div class="modal-content">
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
                            <td>2. Transfer Via Bank Rek BCA:  {{ $toko->detail_rekening }}</td>
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
                        <a href="{{ route('home.index') }}">Halaman Utama</a>
                        <a href="" class="ml-4" data-toggle="modal" data-target="#exampleModal">Cara Pembelian</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end -->

    <!-- KoleksiTerbaik -->
    <section class="mt-5">
        <div class="container">
            <div class="row justify-content-center text-center text-white">
                <div class="col">
                    <h2 class="font-weight-bolder">Nomor Cantik 
                        @if ($nomor_for_title->operator == 'simpati')
                        Simpati
                        @elseif($nomor_for_title->operator == 'as')
                        Kartu AS
                        @elseif($nomor_for_title->operator == 'halo')
                        Kartu halo
                        @elseif($nomor_for_title->operator == 'three')
                        Three
                        @elseif($nomor_for_title->operator == 'smartfren')
                        Smartfren
                        @elseif($nomor_for_title->operator == 'axis')
                        AXIS
                        @elseif($nomor_for_title->operator == 'indosat')
                        Indosat Ooredoo
                        @elseif($nomor_for_title->operator == 'xl')
                        XL
                        @endif 
                    </h2>
                </div>
            </div>
            <div class="row mt-3">
                <div class="alert bg-danger text-white font-weight-bolder text-center" role="alert"
                    style="width: 80rem; font-size: 1.5rem;">
                    Rp. 3 Juta
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($nomor_by_3jt as $data)
                <button type="button" data-id="{{ $data->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                    {{ $data->detail_nomor}}
                </button>
                @endforeach
            </div>

            <div class="row mt-5 justify-content-center">
                <div class="alert bg-danger text-white font-weight-bolder text-center" role="alert"
                    style="width: 80rem; font-size: 1.5rem;">
                    Rp. 2 Juta
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($nomor_by_2jt as $data)
                <button type="button" data-id="{{ $data->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                    {{ $data->detail_nomor}}
                </button>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="alert bg-danger text-white font-weight-bolder text-center" role="alert"
                    style="width: 80rem; font-size: 1.5rem;">
                    Rp. 1,5 Juta
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($nomor_by_1_5jt as $data)
                <button type="button" data-id="{{ $data->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                    {{ $data->detail_nomor}}
                </button>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="alert bg-danger text-white font-weight-bolder text-center" role="alert"
                    style="width: 80rem; font-size: 1.5rem;">
                    Rp. 1 Juta
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($nomor_by_1jt as $data)
                <button type="button" data-id="{{ $data->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                    {{ $data->detail_nomor}}
                </button>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="alert bg-danger text-white font-weight-bolder text-center" role="alert"
                    style="width: 80rem; font-size: 1.5rem;">
                    Rp. 500 Ribu
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($nomor_by_500k as $data)
                <button type="button" data-id="{{ $data->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                    {{ $data->detail_nomor}}
                </button>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="alert bg-danger text-white font-weight-bolder text-center" role="alert"
                    style="width: 80rem; font-size: 1.5rem;">
                    Rp. 100Ribu - 400 Ribu
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($nomor_by_100k as $data)
                <button type="button" data-id="{{ $data->id }}" class="btn btn-light mr-2 mt-3 modal-nomor">
                    {{ $data->detail_nomor}}
                </button>
                @endforeach
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
                    <h5 class="font-weight-bolder text-white text-center">Temukan Kami</h5>
                    <div class="row text-center">
                        <div class="col"><a target="_blank" href="{{ $toko->link_tokped }}"><img src="{{ asset('assets/nomorcantik/img/tokopedia.png') }}" class="tokopedia"></a></div>
                        <div class="col"><a target="_blank" href="{{ $toko->link_shopee }}"><img src="{{ asset('assets/nomorcantik/img/shopee.png') }}" class="shopee"></a></div>
                        <div class="col"><a target="_blank" href=""><img src="{{ asset('assets/nomorcantik/img/facebook.png') }}" class="facebook"></a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="font-weight-lighter copyright"> ?? Copyright PT. Synergy Utility Network. All Rights
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