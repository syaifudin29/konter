<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
</head>
<body style="background-color: #7b809a">
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="card" style="width: 50rem; margin-top: 50px;">
                <form action="{{ route('transaksi_simpan') }}" method="post">
                    @csrf
                <div class="card-header" style="background-image: linear-gradient(195deg,#ec407a,#d81b60); color: white">
                    <h5>Tambah Transaksi</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Produk</label>
                        <select class="form-select js-example-basic-single" name="id_produk" required>
                            <option disabled selected hidden value="" >Pilih</option>
                            @foreach ($produk as $item)
                                <option value="{{$item->id}}">{{$item->label->jenis->kategori->nama." ".$item->label->jenis->nama." ".$item->nama}}</option>
                            @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Harga Beli Manual
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                            <label class="form-check-label" for="flexCheckDefault">
                                 Harga Jual Manual
                            </label>
                        </div>
                      </div>
                      <div class="cok">
    
                      </div>
                      <div class="cok1">
    
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Pembayaran</label>
                        <select class="form-select" required name="payment">
                            @foreach ($payment as $item_p)
                            <option value="{{$item_p->id}}">{{$item_p->nama}}</option>
                          @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Keterangan</label>
                        <select class="form-select" name="keterangan" required>
                           <option value="keluar">Keluar</option>
                           <option value="masuk">Masuk</option>
                          </select>
                      </div>
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Lunas</label>
                        <select class="form-select" name="lunas" required>
                           <option value="1">Ya</option>
                           <option value="0">Tidak</option>
                          </select>
                      </div>
                      
                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Catatan ( optional )</label>
                            <input type="text" class="form-control" name="deskripsi" id="exampleFormControlInput1" >
                          </div>
                      
                      <div class="mb-3">
                        <p class="text-danger">NB: Check lagi sebelum simpan</p>
                      </div>
                      <hr>
                      <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-secondary">KEMBALI</a>
                      <button type="submit" class="btn btn-success float-end">SIMPAN TRANSAKSI</button>
                </div>
                </form>
              </div>
        </div>
    </div>
  <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>// In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    $("#flexCheckDefault").change(function() {
        
    if(this.checked) {
        
        $( ".cok" ).append("<div class='mb-3 coko'><label for='exampleFormControlInput1' class='form-label'>Harga Beli</label><input type='number' class='form-control' name='harga_beli' id='exampleFormControlInput1' placeholder='' required></div>");
    }else{   
        $( ".coko" ).remove();
    }
    });

    $("#flexCheckDefault1").change(function() {
        
        if(this.checked) {
            
            $( ".cok1" ).append("<div class='mb-3 coko1'><label for='exampleFormControlInput1' class='form-label'>Harga Jual</label><input type='number' class='form-control' name='harga_jual' id='exampleFormControlInput1' placeholder='' required></div>");
        }else{   
            $( ".coko1" ).remove();
        }
        });
    
    </script>
    
</body>
</html>