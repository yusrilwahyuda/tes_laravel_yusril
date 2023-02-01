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
 <form action="{{ url('product/'.$data->id) }}" method="post">
    @csrf 
    @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <a href="{{url('product')}}" class="btn btn-secondary"><< Kembali</a>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama produk</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name' id="name" value="{{ $data->name }}">
                    <input type="hidden" class="form-control" name='id' id="id" value="{{ $data->id }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='price' id="price" value="{{ $data->price }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='stock' id="stock" value="{{ $data->stock }}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='description' id="description" value="{{ $data->description }}">
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