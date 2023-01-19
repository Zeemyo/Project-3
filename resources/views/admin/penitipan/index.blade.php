@extends('sb-admin/app')
@section('title', 'penitipan')


@section('content')
    {{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Penitipan</h1>

    <a href="/penitipan/create/" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Penitipan</a>



    <table class="table mt-4 table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Pemilik</th>
                <th scope="col">Nama Kucing</th>
                {{-- <th scope="col">Ras</th> --}}
                <th scope="col">Gender</th>
                {{-- <th scope="col">Umur</th>
                <th scope="col">Merk Makanan</th> --}}
                <th scope="col">Tanggal Titip</th>
                <th scope="col">Lama Titip</th>
                <th scope="col">Layanan</th>
                <th scope="col">Antar Jemput</th>
                <th scope="col">Status</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penitipan as $row)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $row->users->name }}</td>
                    <td>{{ $row->kucing->nama_kucing }}</td>
                    {{-- <td>{{ $row->kucing->ras }}</td> --}}
                    <td>{{ $row->kucing->gender }}</td>
                    {{-- <td>{{ $row->kucing->umur }}</td> --}}
                    {{-- <td>{{ $row->kucing->merk_makanan }}</td> --}}
                    <td>{{ $row->tanggal_titip }}</td>
                    <!-- <td>{{ $row->tanggal_checkout }}</td> -->
                    <td>{{ $row->lama_titip }}</td>
                    <td>{{ $row->layanan }}</td>
                    <td>{{ $row->antar_jemput }}</td>
                    <td>{{ $row->status }}</td>
                    <td width="20%">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="/penitipan/{{ $row->id }}/edit" class="btn btn-primary btn-sm mr-1"><i
                                    class="fas fa-edit"></i> Edit</a>
                            <form action="/penitipan/{{ $row->id }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                    Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    @if (Auth::user()->role == 'admin')
        <table class="table mt-4 table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemilik</th>
                    <th scope="col">Nama Kucing</th>
                    {{-- <th scope="col">Ras</th> --}}
                    <th scope="col">Gender</th>
                    {{-- <th scope="col">Umur</th>
                <th scope="col">Merk Makanan</th> --}}
                    <th scope="col">Tanggal Titip</th>
                    <th scope="col">Lama Titip</th>
                    <th scope="col">Layanan</th>
                    <th scope="col">Antar Jemput</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penitipan as $row)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $row->users->name }}</td>
                        <td>{{ $row->kucing->nama_kucing }}</td>
                        <!-- <td>{{ $row->kucing->ras }}</td> -->
                        <td>{{ $row->kucing->gender }}</td>
                        <!-- <td>{{ $row->kucing->umur }}</td> -->
                        <!-- <td>{{ $row->kucing->merk_makanan }}</td> -->
                        <td>{{ $row->tanggal_titip }}</td>
                        <!-- <td>{{ $row->tanggal_checkout }}</td> -->
                        <td>{{ $row->lama_titip }}</td>
                        <td>{{ $row->layanan }}</td>
                        <td>{{ $row->antar_jemput }}</td>
                        <td>{{ $row->status }}</td>
                        <td width="20%">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="/penitipan/approve/{{ $row->id }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm mr-1"><i class="fas fa-trash"></i>
                                        Approve</button>
                                </form>
                                <form action="/penitipan/{{ $row->id }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    @endif
    {{ $penitipan->links() }}


@endsection
