@extends('layouts.app')

@section('content')
<div class="container pt-3 pt-lg-4">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="section-header fw-bold fs-4">
                        Daftar Transaksi
                    </div>
                </div>
            </div>
            <div class="col-md-12">

                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <div class="card p-3">
                    <div class="card-body">

                        <div class="mb-2">
                            <a href="{{ route('transaksi.create') }}" class="btn btn-primary slide_right">Tambah
                                Transaksi</a>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Jenis Transaksi</th>
                                    <th scope="col" class="text-end">Pemasukan</th>
                                    <th scope="col" class="text-end">Pengeluaran</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $item)
                                    <tr>
                                        <td>{{ date('d F Y', strtotime($item->tanggal)); }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            <span class="badge @if ($item->jenis_transaksi == 'pemasukan') text-bg-success @else text-bg-danger @endif">{{ $item->jenis_transaksi }}</span>
                                            </td>
                                        @if ($item->jenis_transaksi == 'pemasukan')
                                        <td class="text-end">@currency($item->jumlah)</td>
                                        <td class="text-end">-</td>
                                        @else
                                        <td class="text-end">-</td>
                                        <td class="text-end">@currency($item->jumlah)</td>
                                        @endif
                                        <td>
                                            <form action="{{ route('transaksi.destroy', $item->id) }}" method="Post">
                                                <a class="btn btn-sm btn-success me-2" title="Edit Transaksi"
                                                    href="{{ route('transaksi.edit', $item->id) }}"><i class="bi bi-pencil-square me-2"></i>Edit</a>
                                                {{-- <a class="btn btn-sm btn-success me-2"
                                                    href="{{ route('transaksi.show', $item->id) }}"><i class="bi bi-eye me-2"></i></i>Detail</a> --}}
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger me-2"><i class="bi bi-trash me-2"></i>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                  <td>Sisa Saldo</td>
                                  <td>@currency($sisaSaldo)</td>
                                </tr>
                              </tfoot>
                        </table>
                        {{ $transaksi->links() }}
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
