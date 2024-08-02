@extends('template')
@section('judul','Saldo')
@section('js')
<script type="text/javascript">
  const dataTablekategori = new simpleDatatables.DataTable("#datatable-kat", {
    searchable: true,
    fixedHeight: true
  });
  const dataTableJenis = new simpleDatatables.DataTable("#datatable-jenis", {
    searchable: true,
    fixedHeight: true
  });
  const dataTableLabel = new simpleDatatables.DataTable("#datatable-label", {
    searchable: true,
    fixedHeight: true
  });
</script>
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="row">
      {{-- saldo form --}}
      <div class="col-md-8">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white text-capitalize ps-3">Saldo</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-flush display" id="datatable-kat">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Saldo</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($saldo as $item)
                  <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            {{$no++;}}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                         <h6>{{$item->nama}}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <h6>{{ "Rp " . number_format($item->saldo,0,',','.') }}</h6>
                        </div>
                    </td>
                      <td class="align-middle   ">
                        <div class="text-center">
                        <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editDataSaldo{{$item->id}}" style="margin: 10px;">UPDATE</i></a>
                        </div>
                      </td>
                  </tr>
                  <!-- Modal edit kategori -->
                  <div class="modal fade" id="editDataSaldo{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form method="post" action="{{ route('saldo_update') }}">
                          @csrf
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Edit Saldo</h5>
                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">        
                                    <input type="hidden" name="id" value="{{$item->id}}">         
                                    <div class="form-group my-3">
                                      <label class="form-label">Nama</label>
                                      <input  type="text" class="form-control" value="{{$item->nama}}" disabled>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label">Saldo</label>
                                      <input  type="number" class="form-control" value="{{$item->saldo}}" name="saldo" required>
                                    </div>
                                  </div>
                                </div> 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn bg-gradient-primary">Update Kategori</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      {{-- jenis form --}}
      <div class="col-md-4">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <button data-bs-toggle="modal" data-bs-target="#tambahDataJenis" class="btn bg-gradient-secondary" style="float: right; margin-right: 10px; margin-top: -5px;"><i class="fa-solid fa-plus"></i> Data</button>
              <h6 class="text-white text-capitalize ps-3">Jenis Saldo</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-flush display" id="datatable-jenis">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jenis</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($saldo as $item)
                  <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            {{$no++;}}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1">
                        {{$item->nama}}
                        </div>
                    </td>
                      <td class="align-middle   ">
                        <div class="text-center">
                          <a href="" data-bs-toggle="modal" data-bs-target="#editDataJenis{{$item->id}}" style="margin: 10px;"><i class="fa-solid fa-edit"></i></a>
                          <a href="{{ route('saldo_delete', ['id'=>$item->id]) }}" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" style="margin: 10px;"><i class="fa-solid fa-trash"></i></a>
                        </div>
                      </td>
                  </tr>
                  <!-- Modal edit kategori -->
                  <div class="modal fade" id="editDataJenis{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form method="post" action="{{ route('saldo_update') }}">
                          @csrf
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Edit Jenis Saldo</h5>
                          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">        
                                    <input type="hidden" name="id" value="{{$item->id}}">         
                                    <div class="form-group my-3">
                                      <label class="form-label">Nama</label>
                                      <input name="nama" type="text" class="form-control" value="{{$item->nama}}" required>
                                    </div>
                                  </div>
                                </div> 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn bg-gradient-primary">Update Jenis </button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  
  <!-- Modal tambah jenis -->
  <div class="modal fade" id="tambahDataJenis" tabindex="-1" role="dialog" aria-labelledby="tambahDataJenis" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form method="post" action="{{ route('saldo_simpan') }}">
          @csrf
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Tambah Jenis Saldo</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Nama</label>
                      <input name="nama" type="text" class="form-control" required>
                    </div>
                  </div>
                </div> 
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-gradient-primary">Simpan Kategori</button>
        </div>
      </form>
      </div>
    </div>
  </div>
  <!-- Modal tambah label -->
  <div class="modal fade" id="tambahDataLabel1" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form method="post" action="{{ route('label_simpan') }}">
          @csrf
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Tambah Label</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Nama</label>
                      <input name="nama" type="text" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group input-group-static mb-4">
                      <label for="exampleFormControlSelect1" class="ms-0">Jenis</label>
                      <select name="jenis_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach ($jenis as $jen)
                        <option value="{{$jen->id}}">{{$jen->nama}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group input-group-dynamic">
                      <textarea  name="keterangan" class="form-control" rows="5" placeholder="keterangan" spellcheck="false" required></textarea>
                    </div>
                  </div>
                </div> 
        </div>
      
        <div class="modal-footer">
          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn bg-gradient-primary">Simpan Label</button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection
