@extends('layouts.app')

@section('content')
    {{-- Filter Rekap --}}
    <div class="container pt-3 pt-lg-4">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('rekap') }}" action="GET">
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <a class="btn btn-success" href="{{ route('transaksi.create') }}">Transaksi
                                        Baru</a>
                                </div> --}}

                                <div class="col-md-5 mb-2 mb-md-0">
                                    <div class="input-group">
                                        <input type="date" class="form-control float-right" id="dari"
                                            name="dari">
                                    </div>
                                </div>

                                <div class="col-md-5 mb-2 mb-md-0">
                                    <div class="input-group">
                                        <input type="date" class="form-control float-right" id="sampai"
                                            name="sampai">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <button class="btn btn-primary btn-block text-light" style="width: 100%">Filter
                                        Transaksi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
    {{-- End Filter Rekap --}}

    <div class="container pt-3 pt-lg-4">
        <div class="row">
            <div class="col-md-4 mb-3">
                <a href="{{ route('transaksi') }}">
                <div class="card card-button p-lg-3">
                    <div class="card-body d-flex">
                        <div class="image-card me-3">
                            <img src="{{ asset('icons/002-e-wallet.png') }}" alt="Image Ilustrasi"
                                style="width: 50px; height: 50px;">
                        </div>
                        <div class="content-card">
                            <div class="title-card">
                                Banyaknya Transaksi
                            </div>
                            <div class="nominal fw-bold fs-5">
                               {{  $banyakTransaksi }} Transaksi
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-4 mb-3">
                <a href="{{ route('transaksi') }}">
                    <div class="card card-button p-lg-3">
                    <div class="card-body d-flex">
                        <div class="image-card me-3">
                            <img src="{{ asset('icons/001-payment.png') }}" alt="Image Ilustrasi"
                                style="width: 50px; height: 50px;">
                        </div>
                        <div class="content-card">
                            <div class="title-card">
                                Totoal Pengeluaran
                            </div>
                            <div class="nominal fw-bold fs-5">
                                @currency($rekapPengeluaran)
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-4 mb-3">
                <a href="{{ route('transaksi') }}">
                    <div class="card card-button p-lg-3">
                    <div class="card-body d-flex">
                        <div class="image-card me-3">
                            <img src="{{ asset('icons/007-online-payment.png') }}" alt="Image Ilustrasi"
                                style="width: 50px; height: 50px;">
                        </div>
                        <div class="content-card">
                            <div class="title-card">
                                Total Pemasukan
                            </div>
                            <div class="nominal fw-bold fs-5">
                                @currency($rekapPemasukan)
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    {{-- End Card Dashboard --}}

    {{-- Rekap Transaksi --}}
    <div class="container py-3 pt-lg-4">
        <div class="row">
            @if ($rekap == null || count($rekap) == 0 && ($dari != null || $sampai != null))
            <div class="col-md-12 mb-3">
                <div class="section-header fw-bold fs-4">
                   Tidak ada transaksi yang tercatat pada tanggal  {{ date('d F Y', strtotime($dari)) }}</b> sampai
                   <b>{{ date('d F Y', strtotime($sampai)) }}
                </div>
            </div>

            @elseif($dari == null || $sampai == null)
            <div class="col-md-12 mb-3 d-none">
                <div class="section-header fw-bold fs-4">
                  Masukan tanggal
                </div>
            </div>
            @else
            <div class="col-md-12 mb-3">
                <div class="section-header fw-bold fs-4">
                    Rekap Transaksi mulai tanggal {{ date('d F Y', strtotime($dari)) }}</b> sampai
                    <b>{{ date('d F Y', strtotime($sampai)) }}
                </div>
            </div>
            @endif

            {{-- @if($dari == null || $sampai == null )
            <div class="col-md-12 mb-3">
                <div class="section-header fw-bold fs-4">
                   Silahkan masukan tanggal
                </div>
            </div>
            @endif --}}


        </div>

        <div class="row">
            @foreach ($rekap as $item)
                <div class="col-md-12 mb-3">
                    <div class="card p-lg-3">
                        <div class="card-body d-flex transaksi-list">
                            <div class="image-card me-3">
                                <img src="{{ asset('icons/004-payment-1.png') }}" alt="Image Ilustrasi"
                                    style="width: 50px; height: 50px;">
                            </div>
                            <div class="content-card">
                                <div class="title-card d-flex">
                                    <div class="me-2" style="text-transform: capitalize;">
                                        <span
                                            class="badge @if ($item->jenis_transaksi == 'pemasukan') text-bg-success @else text-bg-danger @endif">{{ $item->jenis_transaksi }}</span>
                                    </div>
                                    <div class="me-2">
                                        <span class="badge text-bg-white"
                                            style="color: rgb(177, 177, 177);">{{ date('d F Y', strtotime($item->tanggal)) }}</span>
                                    </div>
                                </div>
                                <div class="card-description fw-bold fs-5">
                                    {{ $item->keterangan }}
                                </div>
                            </div>
                            <div class="nominal-transaksi text-end px-3">
                                <span style="color: rgb(177, 177, 177);">Jumlah Transaksi</span>
                                <div class=" fw-bold fs-5">
                                    @currency($item->jumlah)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- End Rekap Transaksi --}}
@endsection
