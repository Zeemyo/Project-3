<?php

namespace App\Http\Controllers;

use App\Models\Konsultasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KonsultasiController extends Controller
{
    public function index()
    {
        $konsultasi = Konsultasi::latest()->paginate(10);
        return view('admin/konsultasi/index', compact('konsultasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin/konsultasi/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_konsultan' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'kontak' => 'required'
        ]);

        $image = time() .'-' .$request->image->getClientOriginalName();
        $request->image->move('upload/post', $image);

        // $konsultasi = new Konsultasi();
        // $konsultasi->nama_konsultan=Str::title($request->nama_konsultan);
        // $konsultasi->deskripsi=Str::title($request->deskripsi);
        // $konsultasi->image=Str::title($request->image);
        // $konsultasi->kontak=Str::title($request->kontak);
        // $konsultasi->save();

        Konsultasi::create([
            'image' => $image,
            'nama_konsultan' => $request->nama_konsultan,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        ');
        return redirect('/konsultasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $konsultasi = konsultasi::whereId($id)->firstOrFail();
        return view('admin/konsultasi/show', compact('konsultasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $konsultasi = konsultasi::whereId($id)->firstOrFail();
        return view('admin/konsultasi/edit', compact('konsultasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nama_konsultan' => 'required',
            'deskripsi' => 'required',
            'image' => 'required',
            'kontak' => 'required'
        ]);

        Konsultasi::whereId($id)->update([
            'nama_konsultan' => Str::title($request->nama_konsultan),
            'deskripsi' => Str::title($request->deskripsi),
            'image' => Str::title($request->image),
            'kontak' => Str::title($request->kontak)
        ]);


        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');
        return redirect('/konsultasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Konsultasi::whereId($id)->delete();

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/konsultasi');
    }
}
