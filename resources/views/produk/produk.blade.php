@extends('template')
@section('judul','Produk')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <button data-bs-toggle="modal" data-bs-target="#tambahData" class="btn bg-gradient-secondary" style="float: right; margin-right: 10px; margin-top: -5px;"><i class="fa-solid fa-plus"></i> Data</button>
              <h6 class="text-white text-capitalize ps-3" >Produk {{$jns->nama}}</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-flush display" id="datatable-basic">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-uppercase text-secondary  text-center  text-xs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">beli</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Jual</th>
                    {{-- <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Keterangan</th> --}}
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $item)
                      @foreach ($lbl as $lb)
                        @if ($lb->id == $item->label_id)
                        <tr>
                          <td>
                              <div class="d-flex font-weight-bold ">
                                {{ $item->label->jenis->kategori->nama." ".$item->nama }} GB
                              </div>
                          </td>
                          <td>
                            <p class=" font-weight-bold mb-0">{{ $item->label->jenis->nama }}</p>
                            <p class=" text-secondary mb-0">{{ $item->label->nama }}</p>
                          </td>
                          <td class="align-middle text-center text-sm">
                            @if ($item->status == "gangguan")
                              <span class="badge badge-sm bg-gradient-danger">{{ $item->status }}</span>
                            @else
                              <span class="badge badge-sm bg-gradient-success">{{ $item->status }}</span>
                            @endif
                          </td>
                          {{-- <td class="align-middle">
                            <span class="text-secondary  font-weight-bold">20.000</span>
                          </td> --}}
                          <td class="align-middle text-center">
                            <span class=" text-secondary font-weight-bold text text-info">{{ "Rp " . number_format($item->beli,0,',','.') }}</span>
                          </td>
                          <td class="align-middle text-center">
                              <span class=" text-secondary font-weight-bold text text-success">{{ "Rp " . number_format($item->jual,0,',','.') }}</span>
                            </td>
                            {{-- <td class="align-middle">
                              <span class="text-secondary  font-weight-bold"></span>
                            </td> --}}
                            <td class="align-middle   ">
                              <div class="text-center">
                              <a href="" data-bs-toggle="modal" data-bs-target="#editProduk{{$item->id}}" style="margin: 10px;"><i class="fa-solid fa-pen-to-square"></i></a>
                              |
                              <a href="{{ route('produk_delete', ['id'=>$item->id]) }}" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" title="Link Title" style="margin: 10px;"><i class="fa-solid fa-trash"></i></a>
                              </div>
                            </td>
                        </tr>
                        {{-- edit produk --}}
                        <!-- Modal -->
                        <div class="modal fade" id="editProduk{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editProdukLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title font-weight-normal" id="editProdukLabel">Edit Produk</h5>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form method="post" action="{{ route('produk_update') }}">
                                @csrf
                              <div class="modal-body">
                                
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="form-group my-3">
                                            <label class="form-label">Nama</label>
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <input type="text" class="form-control" name="nama" value="{{$item->nama}}" placeholder="masukkan nama" required>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">Label</label>
                                            <select name="label_id" class="form-control" id="exampleFormControlSelect1" required>
                                              @foreach ($lbl as $lbls)
                                              @php
                                                  if ($lbls->id == $item->label_id) {
                                                    $select = "selected";
                                                  }else{
                                                    $select = "";
                                                  }
                                              @endphp
                                            
                                              <option {{ $select }} value="{{$lbls->id}}">{{$lbls->nama}}</option>
                                              @endforeach
                                              
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="input-group input-group-static mb-4">
                                            <label for="exampleFormControlSelect1" class="ms-0">Status</label>
                                            <select name="status" class="form-control" id="exampleFormControlSelect1" required>
                                              
                                              <option {{$item->status=='aktif'?'selected':'';}} selected value="aktif">Aktif</option>
                                              <option {{$item->status=='gangguan'?'selected':'';}} value="gangguan">Gangguan</option>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group my-3">
                                            <label class="form-label">Harga Beli</label>
                                            <input type="number" value="{{$item->beli}}" name="beli" class="form-control" required>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group my-3">
                                            <label class="form-label">Harga Jual</label>
                                            <input type="number" value="{{$item->jual}}" name="jual" class="form-control" required>
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-group">
                                            <label class="form-label">Keterangan</label>
                                            <textarea  name="keterangan" class="form-control" rows="5" placeholder=" ....." spellcheck="false" >{{$item->keterangan}}</textarea>
                                          </div>
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
                        @endif
                    @endforeach
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
          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Input Produk</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="{{ route('produk_simpan') }}">
          @csrf
        <div class="modal-body">
           
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Nama</label>
                      <input type="text" class="form-control" name="nama" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Label</label>
                      <select name="label_id" class="form-control" id="exampleFormControlSelect1" required>
                        @foreach ($lbl as $lbl)
                        <option value="{{$lbl->id}}">{{$lbl->nama}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Status</label>
                      <select name="status" class="form-control" id="exampleFormControlSelect1" required>
                        <option selected value="aktif">Aktif</option>
                        <option value="gangguan">Gangguan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Harga Beli</label>
                      <input type="number" name="beli" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Harga Jual</label>
                      <input type="number" name="jual" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label">Keterangan</label>
                      <textarea  name="keterangan" class="form-control" rows="5" placeholder=" ....." spellcheck="false"></textarea>
                    </div>
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
