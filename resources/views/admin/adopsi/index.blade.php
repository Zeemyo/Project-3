@extends('sb-admin/app')
@section('title', 'Adopsi')


@section('content')
{{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Adopsi</h1>

    <a href="/adopsi/create/" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah adopsi</a>


  
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Nama Kucing</th>
                <th scope="col">Kontak</th>
                <th scope="col">Jenis Kucing</th>
                <th scope="col">Alasan Owner</th>
                <th scope="col">Medical Note</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adopsi as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>

                    <td><img src="/upload/adopsi/{{$row->image}}" alt="" width="80px" height="80px"></td>
                    <td>{{$row->nama_kucing}}</td>
                    <td>{{$row->kontak}}</td>
                    <td>{{$row->jenis_kucing}}</td>
                    <td>{{$row->alasan_owner}}</td>
                    <td>{{$row->medical_note}}</td>
                    <td>{{$row->deskripsi}}</td>
                    
                    <td width="35%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            
                            <a href="/adopsi/{{$row->id}}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a>
                            <a href="/adopsi/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                            <form action="/adopsi/{{$row->id}}" method="post">
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
        {{$adopsi->links()}}

@endsection

        