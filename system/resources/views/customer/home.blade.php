@extends('customer.template.baseUser')

@section('content')
<br>
<!--conteten produk-->

            <div class="card-body bg-warning">
              <form action="{{url('home/filter')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="" class="control-label">Nama</label>
                  <input type="text" class="form-control" name="nama" value="{{$nama ?? ''}}">
                </div>
                <button class="btn btn-dark float-right">
                  <i class="fa fa-search">Filter</i>
                </button>
              </form>
            </div><br>

@foreach($list_produk as $produk)
<div class="bg-light">
    <div class="card" style="width: 15rem;">
      <img src="" class="card-img-top" alt="">
      <div class="card-body margin-inline">
        <h5 class="card-title"><strong>{{$produk->nama}}</strong></h5>
        <p class="card-text">{{$produk->deskripsi}}</p>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="far fa-star"></i>
        <p><b>Rp. {{number_format($produk->harga)}}</b></p>
        <a href="#" class="btn btn-primary" data-target="#iphone" data-toggle="modal">Beli Sekarang</a>
    </div>
</div>
@endforeach
@endsection