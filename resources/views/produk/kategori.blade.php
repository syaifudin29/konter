@extends('template')
@section('judul','Produk')
@section('content')
<div class="container-fluid py-4">
    <div class="py-3">
        <div class="row mb-4 mb-md-0">
            <div class="col-md-8 me-auto my-auto text-left">
                <h5>{{$kategori->nama}}</h5>
                <p>{{$kategori->keterangan}}</p>
            </div>
        </div>
        <div class="row mt-lg-4 mt-2">
        @foreach ($jenis as $item)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
            <div class="card-body p-3">
            <div class="d-flex mt-n2">
            <div class="avatar avatar-xl bg-gradient-dark border-radius-xl p-2 mt-n4">
            <img src="../../../assets/img/small-logos/logo-slack.svg" alt="slack_logo">
            </div>
            <div class="ms-3 my-auto">
            <h6 class="mb-0">{{$item->nama}}</h6>
            </div>
            <div class="ms-auto">
            <div class="dropdown">
            </div>
            </div>
            </div>
            <p class="text-sm mt-3"> {{$item->keterangan}}</p>
            <hr class="horizontal dark">
            <div class="row">
            <div class="col-6">
            <h6 class="text-sm mb-0"></h6>
            <p class="text-secondary text-sm font-weight-normal mb-0"></p>
            </div>
            <div class="col-6 text-end">
            <h6 class="text-sm mb-0"></h6>
            <p class="text-secondary text-sm font-weight-normal mb-0"><a href="{{ route('produk', ['id'=>$item->id]) }}" class="btn btn-primary">PILIH</a></p>
            </div>
            </div>
            </div>
            </div>
            </div>
        
        @endforeach
    </div>
        </div>
    </div>
</div>
@endsection
