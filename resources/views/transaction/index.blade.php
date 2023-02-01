<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
      
    
        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{url('transaksi')}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                <a href="{{url('home')}}" class="btn btn-success">< Back</a>
                  <a href="{{url('transaksi/create')}}" class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">Reference No</th>
                            <th class="col-md-4">Price</th>
                            <th class="col-md-2">Quantity</th>
                            <th class="col-md-2">Payment Amount</th>
                            <th class="col-md-2">Product</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$item->reference_no}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->payment_amount}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <a href="{{url('transaksi/'.$item->idT.'/edit')}}" class="btn btn-warning btn-sm">Edit</a>
                                    <form onsubmit="return confirm('Apakah yakin akan menghapus data?')" class="d-inline" action="{{url('transaksi/'.$item->idT)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm" >Del</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++ ?>
                        @endforeach
                        
                    </tbody>
                </table>
                {{$data->links()}}
               
          </div>
          <!-- AKHIR DATA -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>