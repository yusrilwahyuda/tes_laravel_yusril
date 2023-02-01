@extends('layouts.template')
 <!-- START FORM -->
@section('konten') 
@if($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                <li> {{ $item }} </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
 <form action="{{ url('transaksi') }}" method="post">
    @csrf 
        <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{url('transaksi')}}" class="btn btn-secondary"><< Kembali</a>
            <div class="mb-3 row">
                <label for="reference_no" class="col-sm-2 col-form-label">Reference No</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='reference_no' id="reference_no">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='price' id="price">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='quantity' id="quantity">
                </div>
            </div>
            <div class="mb-3 row">
            <label for="product_id" class="col-sm-2 col-form-label">Product</label>
            <div class="col-sm-10">
                <select class="form-control" name="product_id" placeholder="--Pilih">
                @foreach ($produk as $item)
                <option value="{{$item->id}}">
                    {{$item->name}}
                </option>
                @endforeach
                </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
        @endsection