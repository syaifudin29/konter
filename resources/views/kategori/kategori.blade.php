@extends('template')
@section('judul','Produk')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <button class="btn bg-gradient-secondary" style="float: right; margin-right: 10px; margin-top: -5px;"><i class="fa-solid fa-plus"></i> Data</button>
              <h6 class="text-white text-capitalize ps-3">Produk</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-uppercase text-secondary  text-center  text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Beli</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jual</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            Axis Voucher 2.5 GB
                        </div>
                        
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0">Axis</p>
                      <p class="text-xs text-secondary mb-0">Jumbo</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="badge badge-sm bg-gradient-success">Online</span>
                    </td>
                    <td class="align-middle">
                      <span class="text-secondary text-xs font-weight-bold">20.000</span>
                    </td>
                    <td class="align-middle">
                        <span class="text-secondary text-xs font-weight-bold">30.000</span>
                      </td>
                      <td class="align-middle">
                        <span class="text-secondary text-xs font-weight-bold"></span>
                      </td>
                      <td class="align-middle   ">
                       <div class="text-center">
                        <a href="" style="margin: 10px;"><i class="fa-solid fa-pen-to-square"></i></a>
                        |
                        <a href="" style="margin: 10px;"><i class="fa-solid fa-trash"></i></a>
                       </div>
                      </td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
@endsection
