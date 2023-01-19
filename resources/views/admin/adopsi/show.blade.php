@extends('sb-admin/app')
@section('title', 'Adopsi')

@section('content')
    <div class="card mt-3">
        <div class="card-body">
        <img src="/upload/adopsi/{{$adopsi->image}}" height="auto" width="auto" class="card-img-top" alt="...">
            <h2 class="card-body">Nama Kucing   : {{$adopsi->nama_kucing}}</h2>
            <h2 class="card-body">Kontak   : {{$adopsi->kontak}}</h2>
            <h2 class="card-body">Jenis Kucing  : {{$adopsi->jenis_kucing}}</h2>
            <h2 class="card-body">Alasan Owner  : {{$adopsi->alasan_owner}}</h2>
            <h2 class="card-body">Medical Note  : {{$adopsi->medical_note}}</h2>
            <h2 class="card-body">Keterangan    : {!!$adopsi->deskripsi!!}</h2>
        </div>
    </div>
    <ul></ul>
    <a href="/adopsi" class="btn btn-secondary btn-sm">Kembali</a>
@endsection