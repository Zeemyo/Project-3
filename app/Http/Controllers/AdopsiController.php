<?php

namespace App\Http\Controllers;

use App\Models\Adopsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AdopsiController extends Controller
{
    public function index()
    {
        $adopsi = Adopsi::latest()->paginate(10);
        return view('admin/adopsi/index', compact('adopsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin/adopsi/create');
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
            'nama_kucing' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'jenis_kucing' => 'required',
            'alasan_owner' => 'required',
            'medical_note' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required'
        ]);

        $image = time() .'-' .$request->image->getClientOriginalName();
        $request->image->move('upload/adopsi', $image);

        Adopsi::create([
            
            'image' => $image,
            'nama_kucing' => $request->nama_kucing,
            'jenis_kucing' => $request->jenis_kucing,
            'alasan_owner' => $request->alasan_owner,
            'medical_note' => $request->medical_note,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak,
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        ');
        return redirect('/adopsi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adopsi = Adopsi::whereId($id)->firstOrFail();
        return view('admin/adopsi/show', compact('adopsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adopsi = Adopsi::whereId($id)->firstOrFail();
        return view('admin/adopsi/edit', compact('adopsi'));
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
            'image' => 'required|mimes:jpg,jpeg,png',
            'nama_kucing' => 'required',
            'jenis_kucing' => 'required',
            'alasan_owner' => 'required',
            'medical_note' => 'required',
            'deskripsi' => 'required',
            'kontak' => 'required'
        ]);

        $data = [
            'image' => $request->image,
            'nama_kucing' => $request->nama_kucing,
            'jenis_kucing' => $request->jenis_kucing,
            'alasan_owner' => $request->alasan_owner,
            'medical_note' => $request->medical_note,
            'deskripsi' => $request->deskripsi,
            'kontak' => $request->kontak
        ];

        $adopsi = Adopsi::select('image', 'id')->whereId($id)->first();
        if ($request->image) {
            File::delete('upload/adopsi/' .$adopsi->image);

            $image = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move('upload/adopsi', $image);

            $data['image'] = $image;
        }

        
        $adopsi->update($data);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');
        return redirect('/adopsi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Adopsi::whereId($id)->delete();

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/adopsi');
    }
}
