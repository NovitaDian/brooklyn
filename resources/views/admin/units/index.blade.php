@extends('admin.layout')

@section('title','Data Unit')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0 fw-semibold">Data Unit</h4>
    <a href="/admin/units/create" class="btn btn-warning rounded-pill px-4">
        <i class="fa fa-plus me-1"></i> Tambah Unit
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="90">Gambar</th>
                        <th>Nama Unit</th>
                        <th width="160">LB / LT</th>
                        <th width="180" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($units as $u)
                    <tr class="table-row">
                        <td>

                            <img src="{{ asset('storage/images/'.$u->foto) }}" class="unit-img" path:>
                        </td>

                        <td class="fw-semibold">
                            {{ $u->nama }}
                        </td>

                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $u->luas_bangunan }} m² / {{ $u->luas_tanah }} m²
                            </span>
                        </td>

                        <td class="text-center">
                            <a href="/admin/units/{{ $u->id }}/edit"
                                class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                <i class="fa fa-pen"></i>
                            </a>

                            <form action="/admin/units/{{ $u->id }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Hapus unit ini?')"
                                    class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>

<style>
    .unit-img {
        width: 70px;
        height: 60px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 6px 14px rgba(0, 0, 0, .15);
    }

    .table-row:hover {
        background: #f8fafc;
        transition: .2s;
    }
</style>

@endsection