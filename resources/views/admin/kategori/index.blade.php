@extends('sb-admin/app')
@section('title', 'Kategori')


@section('content')
{{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kategori</h1>

    <a href="/kategori/create/" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Kategori</a>


  
        <table class="table mt-4 table-hover table-bordered">
        <thead>
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Aksi</th>
                </tr>
        </thead>
        <tbody>
                @foreach ($kategori as $row)
                    <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$row->nama}}</td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/kategori/{{$row->id}}/edit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-edit"></i> Edit</a>
                        <form action="/kategori/{{$row->id}}" method="post">
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
        {{$kategori->links()}}
        

@endsection

        