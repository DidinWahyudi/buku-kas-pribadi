@extends('layouts.app')

@section('content')
    {{-- Card Dashboard --}}
    <div class="container pt-3 pt-lg-4">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{ route('transaksi.create') }}">
                    <div class="card card-button bg-primary p-lg-3">
                        <div class="card-body d-flex align-items-center">
                            <div class="image-card me-3">
                                <img class="" src="{{ asset('icons/add.png') }}" alt="Image Ilustrasi"
                                    style="width: 25px; height: 25px;">
                            </div>
                            <div class="content-card text-light">
                                <div class="title-card">
                                    Tambah Data
                                </div>
                                <div class="nominal fw-bold fs-5">
                                    Transaksi Baru
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{ route('transaksi') }}">
                <div class="card card-button p-lg-3">
                    <div class="card-body d-flex">
                        <div class="image-card me-3">
                            <img src="{{ asset('icons/002-e-wallet.png') }}" alt="Image Ilustrasi"
                                style="width: 50px; height: 50px;">
                        </div>
                        <div class="content-card">
                            <div class="title-card">
                                Sisa Saldo
                            </div>
                            <div class="nominal fw-bold fs-5">
                                @currency($sisaSaldo)
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-3 mb-3">
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
                                @currency($jumlahPengeluaran)
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>

            <div class="col-md-3 mb-3">
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
                                @currency($jumlahPemasukan)
                            </div>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
    {{-- End Card Dashboard --}}

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


    {{-- Transaksi Terakhir --}}
    <div class="container py-3 pt-lg-4">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="section-header fw-bold fs-4">
                    Transaksi Terakhir
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($transaksi as $item)
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
        {{-- {{ $transaksi->links() }} --}}
    </div>
    {{-- End Transaksi Terakhir --}}
@endsection
