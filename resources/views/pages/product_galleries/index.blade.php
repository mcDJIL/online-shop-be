@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang</h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Barang</th>
                                        <th>Foto</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                    <tbody>
                                        @forelse ($productGalleries as $productGallery)
                                        <tr>
                                            <td>{{ $productGallery->id }}</td>
                                            <td>{{ $productGallery->product->name }}</td>
                                            <td>
                                                <img src="{{ url($productGallery->photo) }}" alt="foto_produk" />
                                            </td>
                                            <td>{{ $productGallery->is_default ? 'Ya' : 'Tidak'}}</td>
                                            <td>
                                                <form action="{{ route('product-galleries.destroy', $productGallery->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="confirm('Apakah yakin ingin menghapus data dengan id {{ $productGallery->id }}')" class="btn btn-danger btn-sm" >
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center p-5">
                                                    Data Foto Produk Tidak Tersedia
                                                </td>
                                            </tr>
                                        @endforelse ()
                                    </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection