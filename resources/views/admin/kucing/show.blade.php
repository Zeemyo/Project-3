@extends('sb-admin/app')
@section('title', 'Adopsi')

@section('content')
    <a href="/adopsi/{{$adopsi->id}}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
    <a href="/adopsi" class="btn btn-secondary btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
    <div class="card mt-3">
        <img src="/upload/adopsi/{{$adopsi->image}}" height="450px" class="card-img-top" alt="...">
        <div class="card-body">
        
            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Kucing</label>
    <div class="col-sm-10">
      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$adopsi->nama_kucing}}">
    </div>
            <h2 class="card-title">{{$adopsi->nama_kucing}}</h2>
            <h2 class="card-title">{{$adopsi->ras}}</h2>
            <h2 class="card-title">{{$adopsi->gender}}</h2>
            <h2 class="card-title">{{$adopsi->umur}}</h2>
            <h2 class="card-title">{{$adopsi->merk_makanan}}</h2>
            
        </div>
    </div>
@endsection