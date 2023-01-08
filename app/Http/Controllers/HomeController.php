<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaksi;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Halaman Home';

        $jumlahPemasukan = $this->transaksiMasuk();
        $jumlahPengeluaran = $this->transaksiKeluar();
        $sisaSaldo = $this->cekSaldo();
        $transaksi = Transaksi::where('user_id', Auth::user()->id)->orderBy('tanggal', 'DESC')->paginate(5);
        //dd($jumlahPemasukan);
        return view('home',compact('transaksi','sisaSaldo', 'title', 'jumlahPemasukan', 'jumlahPengeluaran'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function transaksiMasuk()
    {
        $data = Transaksi::where('jenis_transaksi', '=', 'pemasukan')->where('user_id', Auth::user()->id)->sum('jumlah');
        return $data;
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function transaksiKeluar()
    {
        $data = Transaksi::where('jenis_transaksi', '=', 'pengeluaran')->where('user_id', Auth::user()->id)->sum('jumlah');
        return $data;
    }


}
