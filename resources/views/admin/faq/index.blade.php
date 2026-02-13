@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">Data FAQ</h4>
    <a href="{{ route('faq.create') }}" class="btn btn-warning rounded-pill px-4">
        + Tambah FAQ
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <div class="table-responsive">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th width="90">Urutan</th>
                        <th>Pertanyaan</th>
                        <th width="120">Status</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($faqs as $f)
                    <tr class="table-row">
                        <td class="fw-semibold">
                            {{ $f->order }}
                        </td>

                        <td>
                            {{ $f->question }}
                        </td>

                        <td>
                            <span class="badge {{ $f->is_active ? 'bg-success' : 'bg-secondary' }}">
                                {{ $f->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>

                        <td class="text-center">
                            <a href="{{ route('faq.edit',$f->id) }}"
                                class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                <i class="fa fa-pen"></i>
                            </a>

                            <form action="{{ route('faq.destroy',$f->id) }}"
                                method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Hapus FAQ ini?')"
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
    .table-row:hover {
        background: #f8fafc;
        transition: .2s;
    }
</style>

@endsection