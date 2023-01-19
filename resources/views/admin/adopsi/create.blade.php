@extends('sb-admin/app')
@section('title', 'Adopsi')


@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Adopsi</h1>

    <form action="/adopsi" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_kucing">Nama Kucing</label>
            <input type="text" class="form-control" id="nama_kucing" name="nama_kucing">
            @error('nama_kucing')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="jenis_kucing">Jenis Kucing</label>
            <input type="text" class="form-control" id="jenis_kucing" name="jenis_kucing">
            @error('jenis_kucing')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Alasan Owner</label>
            <input type="text" class="form-control" id="alasan_owner" rows="5" name="alasan_owner" value="{{old('alasan_owner')}}">
            @error('alasan_owner')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="medical_note">Medical Note</label>
            <input type="text" class="form-control" id="medical_note" name="medical_note" value="{{old('medical_note')}}">
            @error('medical_note')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="editor">deskripsi</label>
            <textarea class="form-control" id="editor" rows="10" name="deskripsi">{{old('deskripsi')}}</textarea>
            @error('deskripsi')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="kontak">Kontak yang dapat dihubungi</label>
            <input type="text" class="form-control" id="kontak" name="kontak" value="{{old('kontak')}}">
            @error('kontak')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
        <a href="/adopsi" class="btn btn-secondary btn-sm">Kembali</a>
    </form>
@endsection

