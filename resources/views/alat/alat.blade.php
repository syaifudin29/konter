@extends('template')
@section('judul','Alat')
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
      {{-- kategori form --}}
      <div class="col-md-4">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <button data-bs-toggle="modal" data-bs-target="#tambahDataKategori" class="btn bg-gradient-secondary" style="float: right; margin-right: 10px; margin-top: -5px;"><i class="fa-solid fa-plus"></i> Data</button>
              <h6 class="text-white text-capitalize ps-3">Kategori</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-flush display" id="datatable-kat">
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
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1 text-capitalize">
                         {{$item->nama}}
                        </div>
                    </td>
                      <td class="align-middle   ">
                        <div class="text-center">
                        <a href="" data-bs-toggle="modal" data-bs-target="#editDataKategori{{$item->id}}" style="margin: 10px;"><i class="fa-solid fa-edit"></i></a>
                        <a href="{{ route('kategori_delete', ['id'=>$item->id]) }}" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" style="margin: 10px;"><i class="fa-solid fa-trash"></i></a>
                        </div>
                      </td>
                  </tr>
                  <!-- Modal edit kategori -->
                  <div class="modal fade" id="editDataKategori{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form method="post" action="{{ route('kategori_update') }}">
                          @csrf
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Edit Kategori</h5>
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
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label">Keterangan</label>
                                      <textarea  name="keterangan" class="form-control" rows="5" placeholder="keterangan" spellcheck="false">{{$item->keterangan}}</textarea>
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
              <h6 class="text-white text-capitalize ps-3">Jenis</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-flush display" id="datatable-jenis">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jenis</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Kategori</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($jenis as $item)
                  <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            {{$no++;}}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1 text-capitalize">
                        {{$item->nama}}
                        </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        {{$item->kategori->nama}}
                      </div>
                  </td>
                      <td class="align-middle   ">
                        <div class="text-center">
                          <a href="" data-bs-toggle="modal" data-bs-target="#editDataJenis{{$item->id}}" style="margin: 10px;"><i class="fa-solid fa-edit"></i></a>
                          <a href="{{ route('jenis_delete', ['id'=>$item->id]) }}" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" style="margin: 10px;"><i class="fa-solid fa-trash"></i></a>
                        </div>
                      </td>
                  </tr>
                  <!-- Modal edit kategori -->
                  <div class="modal fade" id="editDataJenis{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form method="post" action="{{ route('jenis_update') }}">
                          @csrf
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Edit Jenis</h5>
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
                                  <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                      <label for="exampleFormControlSelect1" class="ms-0">Kategori</label>
                                      <select name="kategori_id" class="form-control" id="exampleFormControlSelect1">
                                        @foreach ($kategori as $kat)
                                        @if ($kat->id == $item->kategori_id)
                                            @php
                                                $select = "selected";
                                            @endphp
                                        @else
                                          @php
                                            $select = "";
                                          @endphp
                                        @endif
                                        <option {{$select}} value="{{$kat->id}}">{{$kat->nama}}</option>
                                        @endforeach
                                        
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label">Keterangan</label>
                                      <textarea  name="keterangan" class="form-control" rows="5" placeholder="keterangan" spellcheck="false" >{{$item->keterangan}}</textarea>
                                    </div>
                                  </div>
                                </div> 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn bg-gradient-primary">Update Jenis</button>
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
      {{-- label form --}}
      <div class="col-md-4">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <button data-bs-toggle="modal" data-bs-target="#tambahDataLabel1" class="btn bg-gradient-secondary" style="float: right; margin-right: 10px; margin-top: -5px;"><i class="fa-solid fa-plus"></i> Data</button>
              <h6 class="text-white text-capitalize ps-3">Label</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0 table-flush display" id="datatable-label">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Label</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Jenis</th>
                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Hapus</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                    $no=1;
                    @endphp
                    @foreach ($label as $item)
                  <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            {{$no++;}}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex px-2 py-1 text-capitalize">
                         {{$item->nama}}
                        </div>
                    </td>
                    <td>
                      <div class="text-capitalize">
                        <p class="text-xs font-weight-bold mb-0">{{$item->jenis->nama}}</p>
                        <p class="text-xs text-secondary mb-0">{{$item->jenis->kategori->nama}}</p>
                       
                      </div>
                  </td>
                      <td class="align-middle   ">
                        <div class="text-center">
                          <a href="" data-bs-toggle="modal" data-bs-target="#editDatalabel{{$item->id}}" style="margin: 10px;"><i class="fa-solid fa-edit"></i></a>
                        <a href="{{ route('label_delete', ['id'=>$item->id]) }}" onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" style="margin: 10px;"><i class="fa-solid fa-trash"></i></a>
                        </div>
                      </td>
                  </tr>
                  <!-- Modal edit kategori -->
                  <div class="modal fade" id="editDatalabel{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="tambahDataLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <form method="post" action="{{ route('label_update') }}">
                          @csrf
                        <div class="modal-header">
                          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Edit Label</h5>
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
                                  <div class="col-md-12">
                                    <div class="input-group input-group-static mb-4">
                                      <label for="exampleFormControlSelect1" class="ms-0">Jenis</label>
                                      <select name="jenis_id" class="form-control text-capitalize" id="exampleFormControlSelect1">
                                        @foreach ($jenis as $jen)
                                        @if ($jen->id == $item->jenis_id)
                                            @php
                                                $select = "selected";
                                            @endphp
                                        @else
                                          @php
                                            $select = "";
                                          @endphp
                                        @endif
                                        <option class="text-capitalize" {{$select}} value="{{$jen->id}}">{{$jen->kategori->nama." - ".$jen->nama}}</option>
                                        @endforeach
                                        
                                      </select>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <label class="form-label">Keterangan</label>
                                      <textarea  name="keterangan" class="form-control" rows="5" placeholder="keterangan" spellcheck="false" >{{$item->keterangan}}</textarea>
                                    </div>
                                  </div>
                                </div> 
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn bg-gradient-primary">Update Jenis</button>
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

  
  <!-- Modal tambah kategori -->
  <div class="modal fade" id="tambahDataKategori" tabindex="-1" role="dialog" aria-labelledby="tambahDataKategori" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form method="post" action="{{ route('kategori_simpan') }}">
          @csrf
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="tambahDataKategori">Tambah Kategori</h5>
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
                    <div class="input-group input-group-dynamic">
                      <textarea  name="keterangan" class="form-control" rows="5" placeholder="keterangan" spellcheck="false" ></textarea>
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
  <!-- Modal tambah jenis -->
  <div class="modal fade" id="tambahDataJenis" tabindex="-1" role="dialog" aria-labelledby="tambahDataJenis" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form method="post" action="{{ route('jenis_simpan') }}">
          @csrf
        <div class="modal-header">
          <h5 class="modal-title font-weight-normal" id="tambahDataLabel">Tambah Jenis</h5>
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
                      <label for="exampleFormControlSelect1" class="ms-0">Kategori</label>
                      <select name="kategori_id" class="form-control" id="exampleFormControlSelect1">
                        @foreach ($kategori as $kat)
                        <option value="{{$kat->id}}">{{$kat->nama}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group input-group-dynamic">
                      <textarea  name="keterangan" class="form-control" rows="5" placeholder="keterangan" spellcheck="false" ></textarea>
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
                      <select name="jenis_id" class="form-control text-capitalize" id="exampleFormControlSelect1" >
                        @foreach ($jenis as $jen)
                        <option class="text-capitalize" value="{{$jen->id}}">{{$jen->kategori->nama." - ".$jen->nama}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group input-group-dynamic">
                      <textarea  name="keterangan" class="form-control" rows="5" placeholder="keterangan" spellcheck="false" ></textarea>
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
