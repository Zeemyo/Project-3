@extends('sb-admin/app')
@section('title', 'Konsultasi')


@section('content')
{{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Konsultasi</h1>

    <a href="/konsultasi/create/" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah konsultasi</a>


  
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th>No</th>
                <th scope="col">Foto Konsultan</th>
                <th scope="col">Nama Konsultan</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Kontak</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($konsultasi as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><img src="/upload/post/{{$row->image}}" alt="" width="80px" height="80px"></td>
                    <!-- <td>{{$row->image}}</td> -->
                    <td>{{$row->nama_konsultan}}</td>
                    <td>{{$row->deskripsi}}</td>
                    <td>{{$row->kontak}}</td>
                    
                    <td width="35%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            
                            <a href="/konsultasi/{{$row->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a>
                            <a href="/konsultasi/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                            <form action="/konsultasi/{{$row->id}}" method="post">
                            @method('DELETE')
                                @csrf
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Hapus</button>
                        </form>
                        </div>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$konsultasi->links()}}

@endsection

        