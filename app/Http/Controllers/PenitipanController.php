<?php

namespace App\Http\Controllers;


use App\Models\Penitipan;
use App\Models\Kucing;
use App\Models\Users;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PenitipanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penitipan = Penitipan::latest()->paginate(10);
        return view('admin/penitipan/index', compact('penitipan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kucing = Kucing::select('id', 'nama_kucing')->get();
        $users = Users::select('id', 'name')->get();
        return view('admin/penitipan/create', compact('kucing', 'users'));
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
            'tanggal_titip' => 'required',
            'tanggal_checkout' => 'required',
            'lama_titip' => 'required',
            'layanan' => 'required',
            'antar_jemput',
            'id_kucing' => 'required',
            'id_user' => 'required',
            'status' => 'required'
        ]);

        $penitipan = new Penitipan;
        $penitipan->tanggal_titip = Str::title($request->tanggal_titip);
        $penitipan->tanggal_checkout = Str::title($request->tanggal_checkout);
        $penitipan->lama_titip = Str::title($request->lama_titip);
        $penitipan->layanan = Str::title($request->layanan);
        $penitipan->antar_jemput = Str::title($request->antar_jemput);
        $penitipan->id_kucing = $request->id_kucing;
        $penitipan->id_user = $request->id_user;
        $penitipan->status = Str::title($request->status);
        $penitipan->save();

        // Penitipan::create([

        //     'tanggal_titip' => Str::title($request->tanggal_titip),
        //     'tanggal_checkout' => Str::title($request->tanggal_checkout),
        //     'lama_titip' => Str::title($request->lama_titip),
        //     'layanan' => Str::title($request->layanan),
        //     'antar_jemput' => Str::title($request->antar_jemput),
        //     'id_kucing' => $request->kucing

        // ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        ');

        return redirect('/penitipan');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kucing = Kucing::select('id', 'nama_kucing')->get();
        $users = Users::select('id', 'name')->get();
        $penitipan = Penitipan::whereId($id)->firstOrFail();
        return view('admin/penitipan/edit', compact('penitipan', 'kucing', 'users'));
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
            'tanggal_titip' => 'required',
            'tanggal_checkout' => 'required',
            'lama_titip' => 'required',
            'layanan' => 'required',
            'antar_jemput' => 'required',
            'id_kucing' => 'required',
            'id_user' => 'required',
            'status' => 'required'
        ]);

        Penitipan::whereId($id)->update([
            'tanggal_titip' => Str::title($request->tanggal_titip),
            'tanggal_checkout' => Str::title($request->tanggal_checkout),
            'lama_titip' => Str::title($request->lama_titip),
            'layanan' => Str::title($request->layanan),
            'antar_jemput' => Str::title($request->antar_jemput),
            'id_kucing' => $request->id_kucing,
            'id_user' => $request->id_user,
            'status' => Str::title($request->status)
        ]);



        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');
        return redirect('/penitipan');
    }

    /**
     * Buat Approval penitipan
     */

    public function approve(Request $request, $id)
    {
        $penitipan = Penitipan::find($id);

        $penitipan->status = 'Approved';
        $penitipan->save();

        $request->session()->flash('sukses', '
              <div class="alert alert-success" role="alert">
                  Data berhasil diapprove
              </div>
          ');
        return redirect('/penitipan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Penitipan::whereId($id)->delete();

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/penitipan');
    }
}
