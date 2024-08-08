@extends('template')
@section('judul','Transaksi')
@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
"use strict";
// const nama = {{json_encode($produk_js)}}
let namas = @json($produk_js);
let json = JSON.parse(namas);


$(document).ready(function domReady() {
  
  $('.js-example-basic-single').select2();
});



$('#nama').change(function() { 
  $('#jual').val(39000);
  const rupiah = (number)=>{
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(number);
  }

  json.forEach(element => {
    if (element.id == $('#nama').val()) {
      $('#jual').val(rupiah(element.jual));
    }
  });
});

</script>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <a href="{{ route('transaksi_proses') }}" class="btn bg-gradient-secondary" style="float: right; margin-right: 10px; margin-top: -5px;"><i class="fa-solid fa-plus"></i> Data</a>
              <h6 class="text-white text-capitalize ps-3" >Transaksi</h6>
            </div>
          </div>
        
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-flush display" id="datatable-basic">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
                    <th class=" text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Harga</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Lunas</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Pembayaran</th>
                    <th class="text-uppercase text-secondary  text-center  text-xs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no=1;
                    @endphp
                   @foreach ($transaksi as $item)
                        <tr>
                        <td>
                            <div class="d-flex font-weight-bold ">
                                {{ $no++; }}
                            </div>
                        </td>
                          <td>
                              <div class="d-flex font-weight-bold ">
                                {{ $item->nama_produk }}
                              </div>
                          </td>
                          <td>
                            <p class=" font-weight-bold mb-0">{{ "Rp " . number_format($item->jual,0,',','.') }}</p>
                          </td>
                          <td>
                            <div class="d-flex font-weight-bold ">
                                @if ($item->status == "gangguan")
                                <span class="badge badge-sm bg-gradient-danger">Belum Bayar</span>
                                @else
                                <span class="badge badge-sm bg-gradient-success">Lunas</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div class="d-flex font-weight-bold ">
                              {{ $item->payment->nama }}
                            </div>
                        </td>
                        <td>
                            <div class="d-flex font-weight-bold ">
                              {{ $item->keterangan }}
                            </div>
                        </td>
                         
                            {{-- <td class="align-middle">
                              <span class="text-secondary  font-weight-bold"></span>
                            </td> --}}
                            <td class="align-middle   ">
                              <div class="text-center">
                              {{-- <a href="" data-bs-toggle="modal" data-bs-target="#editProduk{{$item->id}}" style="margin: 10px;"><i class="fa-solid fa-pen-to-square"></i></a>
                              | --}}
                              <a href="{{ route('transaksi_delete', ['id'=>$item->id]) }}" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" title="Link Title" style="margin: 10px;"><i class="fa-solid fa-trash"></i></a>
                              </div>
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
    <a href="{{redirect()->back()->getTargetUrl()}}" class="btn btn-secondary" >
      << Kembali
    </a>

  </div>

  
  <!-- Modal -->
  <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Tambah Transaksi</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('produk_simpan') }}">
          @csrf
        <div class="modal-body">
           
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Nama</label>
                      <select class="js-example-basic-single" id="nama" name="kode_produk" class="js-example-basic-single" name="state" required>
                        {{-- <option disabled selected hidden >Pilih</option> --}}
                        @foreach ($produk as $item)
                            <option value="{{$item->id}}">{{$item->label->jenis->kategori->nama." ".$item->label->jenis->nama." ".$item->nama}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                    <hr>
                  <div class="col-md-12">
                    <div class="form-group input-group-outline">
                      <label class="form-label">Harga</label>
                      <input type="text" name="jual" id="jual" class="form-control" disabled>
                    </div>
                  </div>
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                  <div class="form-group input-group-static mb-4">
                    <label for="exampleFormControlSelect1" class="ms-0">Metode</label>
                    <select class="form-control" name="lunas">
                      @foreach ($payment as $item_p)
                        <option value="{{$item_p->id}}">{{$item_p->nama}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group input-group-static mb-4">
                    <label for="exampleFormControlSelect1" class="ms-0">Keterangan</label>
                    <select class="form-control" name="lunas">
                      <option value="keluar" selected>Keluar</option>
                      <option value="Masuk">Masuk</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group input-group-static mb-4">
                    <label for="exampleFormControlSelect1" class="ms-0">Pembayaran</label>
                    <select class="form-control" name="lunas">
                      <option value="1" selected>Lunas</option>
                      <option value="0">Hutang</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group input-group-static mb-4">
                    <label for="exampleFormControlSelect1" class="ms-0">Deskripsi</label>
                    <textarea name="deskripsi" id="" cols="30" rows="10"></textarea>
                  </div>
                </div>
             
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-gradient-primary">Save changes</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection
