<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Halaman Transaksi';
        $sisaSaldo = $this->cekSaldo();

        $transaksi = Transaksi::where('user_id', Auth::user()->id)->orderBy('tanggal', 'DESC')->paginate(10);
        return view('transaksi', compact('transaksi', 'sisaSaldo', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Form Tambah Transaksi';
        return view('form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaksi::create([
            'user_id'           => Auth::id(),
            'tanggal'           => $request->tanggal,
            'jenis_transaksi'   => $request->jenis_transaksi,
            'keterangan'        => $request->keterangan,
            'jumlah'            => $request->jumlah
        ]);

        return redirect('transaksi')->with(['success' => 'Data Berhasil ditambahkan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        $title = 'Detail Transaksi';
        return view('detail', compact('transaksi', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $title = 'Form Update Transaksi';
        return view('form', compact('transaksi', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Transaksi::where('id', '=', $id)->update([
            'user_id'           => Auth::id(),
            'tanggal'           => $request->tanggal,
            'keterangan'        => $request->keterangan,
            'jenis_transaksi'   => $request->jenis_transaksi,
            'jumlah'            => $request->jumlah,
        ]);
        return redirect('transaksi')->with(['success' => 'Data Berhasil diubah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::where('id', $id)->first();
        $transaksi->delete();
        return redirect('transaksi')->with(['success' => 'Data Berhasil dihapus']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function cekSaldo()
    {
        $pemasukan = Transaksi::where('jenis_transaksi', '=', 'pemasukan')->where('user_id', Auth::user()->id)->sum('jumlah');
        $pengeluaran = Transaksi::where('jenis_transaksi', '=', 'pengeluaran')->where('user_id', Auth::user()->id)->sum('jumlah');
        $data = $pemasukan - $pengeluaran;
        return $data;
    }
}
