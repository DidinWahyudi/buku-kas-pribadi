@extends('layouts.app')

@section('content')
<div class="container pt-3 pt-lg-4">
    <div class="row justify-content-center">

            <div class="col-md-8 mb-3">
                <div class="section-header fw-bold fs-4">
                    Form
                        @if (@$transaksi->exists)
                            Update
                            @php
                                $aksi = 'Edit';
                            @endphp
                        @else
                            Tambah
                            @php
                                $aksi = 'Tambah';
                            @endphp
                        @endif
                        Transaksi
                </div>
            </div>
            <div class="col-md-8">
                <div class="card p-3">
                    <div class="card-body">
                        @if (@$transaksi->exists)
                            <form id="modalForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                                action="{{ route('transaksi.update', $transaksi) }}">
                                @method('put')
                            @else
                                <form id="modalForm" class="forms-sample" enctype="multipart/form-data" method="POST"
                                    action="{{ route('transaksi.store') }}">
                        @endif
                        {{ csrf_field() }}

                        <div class="row mb-3">
                            <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal" type="date"
                                    class="form-control @error('tanggal') is-invalid @enderror" name="tanggal"
                                    value="{{ old('tanggal', @$transaksi->tanggal) }}" required autocomplete="tanggal"
                                    autofocus>

                                @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jenis_transaksi"
                                class="col-md-4 col-form-label text-md-end">{{ __('Jenis Transaksi') }}</label>

                            <div class="col-md-6">

                                <select class="form-control" name="jenis_transaksi" id="jenis_transaksi">
                                    <option selected="true" disabled="disabled" value="">Pilih Jenis Transaksi
                                    </option>
                                    <option value="pengeluaran"
                                        {{ old('jenis_transaksi', @$transaksi->jenis_transaksi) ? 'selected' : '' }}>
                                        Pengeluaran</option>
                                    <option value="pemasukan"
                                        {{ old('jenis_transaksi', @$transaksi->jenis_transaksi) ? 'selected' : '' }}>
                                        Pemasukan</option>
                                </select>

                                @error('jenis_transaksi')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="keterangan"
                                class="col-md-4 col-form-label text-md-end">{{ __('Keterangan') }}</label>

                            <div class="col-md-6">
                                <input id="keterangan" type="text"
                                    class="form-control @error('keterangan') is-invalid @enderror" name="keterangan"
                                    value="{{ old('keterangan', @$transaksi->keterangan) }}" required
                                    autocomplete="keterangan" autofocus>

                                @error('keterangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="jumlah" class="col-md-4 col-form-label text-md-end">{{ __('Jumlah') }}</label>

                            <div class="col-md-6">
                                <input id="jumlah" type="number"
                                    class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                    value="{{ old('jumlah', @$transaksi->jumlah) }}" required autocomplete="jumlah"
                                    autofocus>

                                @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{-- <a href="{{ route('transaksi') }}" class="btn btn-secondary me-2 slide_right">
                                    Back</a> --}}
                                <button type="submit" class="btn btn-primary  slide_right">
                                    {{ $aksi }}</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
