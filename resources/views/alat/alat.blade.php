@extends('template')
@section('judul','Produk')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-4">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <button data-bs-toggle="modal" data-bs-target="#tambahData" class="btn bg-gradient-secondary" style="float: right; margin-right: 10px; margin-top: -5px;"><i class="fa-solid fa-plus"></i> Data</button>
              <h6 class="text-white text-capitalize ps-3">Kategori</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-flush" id="datatable-basic">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($kategori as $item)
                  <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            {{$no++;}}
                        </div>
                        <button class="btn bg-gradient-primary mb-0" onclick="material.showSwal('basic')">Try me!</button>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                         {{$item->nama}}
                        </div>
                    </td>
                      <td class="align-middle   ">
                        <div class="text-center">
                        <a href="{{ route('kategori_delete', ['id'=>$item->id]) }}" onclick="return confirm('Delete entry?')" style="margin: 10px;"><i class="fa-solid fa-trash"></i></a>
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
        <div class="modal-body">
            <form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Nama</label>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Email</label>
                      <input type="email" class="form-control" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group input-group-outline is-valid my-3">
                      <label class="form-label">Success</label>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group input-group-outline is-invalid my-3">
                      <label class="form-label">Error</label>
                      <input type="email" class="form-control">
                    </div>
                  </div>
                </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn bg-gradient-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection
