@extends('admin.layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="mb-0">
        {{ isset($faq) ? 'Edit FAQ' : 'Tambah FAQ' }}
    </h4>
    <a href="{{ route('faq.index') }}" class="btn btn-outline-dark rounded-pill px-4">
        Kembali
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <form method="POST" action="{{ route('faq.update', $faq->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Pertanyaan</label>
                <input type="text"
                    name="question"
                    class="form-control"
                    value="{{ old('question', $faq->question ?? '') }}"
                    placeholder="Masukkan pertanyaan FAQ">
            </div>

            <div class="mb-3">
                <label>Jawaban</label>
                <textarea name="answer"
                    rows="4"
                    class="form-control"
                    placeholder="Masukkan jawaban FAQ">{{ old('answer', $faq->answer ?? '') }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label>Urutan Tampil</label>
                    <input type="number"
                        name="order"
                        class="form-control"
                        value="{{ old('order', $faq->order ?? 0) }}">
                </div>

                <div class="col-md-6 mb-4">
                    <label>Status</label>
                    <select name="is_active" class="form-select">
                        <option value="1"
                            {{ (old('is_active', $faq->is_active ?? 1) == 1) ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="0"
                            {{ (old('is_active', $faq->is_active ?? 1) == 0) ? 'selected' : '' }}>
                            Nonaktif
                        </option>
                    </select>
                </div>
            </div>

            <div class="text-end">
                <button class="btn btn-dark rounded-pill px-5">
                    {{ isset($faq) ? 'Update FAQ' : 'Simpan FAQ' }}
                </button>
            </div>

        </form>

    </div>
</div>

@endsection