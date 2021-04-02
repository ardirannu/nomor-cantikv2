<div class="modal-header">
    <h5 class="modal-title text-white" >ZAHIRA CELL</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body text-white">
    <div class="row">
    <div class="col-sm-2"></div>  
    <div class="col-sm-4">Nomor :</div>
    <div class="col-sm-4">{{ $nomor->detail_nomor}}</div>
    <div class="col-sm-2"></div>  
    </div>
    <div class="row">
    <div class="col-sm-2"></div> 
    <div class="col-sm-4">Operator :</div>
    <div class="col-sm-4">
        @if ($nomor->operator == "simpati")
            {{$operator = 'simPATI'}}
        @elseif ($nomor->operator == "as")
            {{$operator = 'Kartu AS'}}
        @elseif ($nomor->operator == "halo")
            {{$operator = 'Kartu Halo'}}
        @elseif ($nomor->operator == "three")
            {{$operator = 'Three'}}
        @elseif ($nomor->operator == "smartfren")
            {{$operator = 'Smartfren'}}
        @elseif ($nomor->operator == "axis")
            {{$operator = 'AXIS'}}
        @elseif ($nomor->operator == "indosat")
            {{$operator = 'Indosat Ooredoo'}}
        @elseif ($nomor->operator == "xl")
            {{$operator = 'XL'}}
        @endif
    </div>
    <div class="col-sm-2"></div> 
    </div>
    <div class="row">
    <div class="col-sm-2"></div> 
    <div class="col-sm-4">Harga :</div>
    <div class="col-sm-4">Rp {{ $nomor->harga}}</div>
    <div class="col-sm-2"></div> 
    </div>
    <div class="row">
    <div class="col-sm-2"></div> 
    <div class="col-sm-4">Jumlah Digit :</div>
    <div class="col-sm-4">{{ $nomor->jumlah_digit}}</div>
    <div class="col-sm-2"></div> 
    </div>
    
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
    <a target="_blank" href="https://wa.me/{{$toko->no_whatsapp}}?text=Halo%2C%20Zahira%20Cell%0ASaya%20ingin%20membeli%20nomor%20cantik%20anda%0ADetail%20Nomor%20%3A {{$nomor->detail_nomor}}%20%0AOperator%20%3A {{$operator}}%0AHarga%20%3A  Rp. {{$nomor->harga}}%0A" type="button" class="btn btn-success">Pesan Sekarang</a>
    </div>    
    
    