@extends('layout')

@section('content')

@php
$wa = '6282324898151'; 
@endphp
<div class="wrapper">
    <a href="{{ url()->previous() }}" class="btn-back">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>


    <div class="unit-title gold">{{ $unit->nama }}</div>

    {{-- SPESIFIKASI & DENAH --}}
    <div class="row g-4 align-items-stretch">

        <div class="col-md-6">
            <div class="spec-box">

                <div class="spec-title gold">Spesifikasi Unit</div>
                <div class="spec-list">
                    Luas Bangunan : <b>{{ $unit->luas_bangunan }} m²</b><br>
                    Luas Tanah : <b>{{ $unit->luas_tanah }} m²</b><br>
                    Kamar Tidur : <b>{{ $unit->kt }}</b><br>
                    Kamar Mandi : <b>{{ $unit->km }}</b><br>
                    Listrik : <b>{{ $unit->listrik }}</b><br>
                    Air : <b>{{ $unit->air }}</b>
                </div>

                <hr>

                <div class="spec-title gold">Material</div>
                <div class="spec-list">
                    Lantai : <b>{{ $unit->lantai }}</b><br>
                    Atap : <b>{{ $unit->atap }}</b><br>
                    Dinding : <b>{{ $unit->dinding }}</b><br>
                    Plafon : <b>{{ $unit->plafon }}</b><br>
                    Kusen : <b>{{ $unit->kusen }}</b><br>
                    Sanitary : <b>{{ $unit->sanitary }}</b><br>
                    Pintu : <b>{{ $unit->pintu }}</b><br>
                    Jendela : <b>{{ $unit->jendela }}</b>
                </div>

            </div>
        </div>

        <div class="col-md-6">
            <img src="{{ asset('storage/'.$unit->denah) }}" class="denah-img">
        </div>

    </div>

    {{-- GALERI --}}
    <div class="gallery-title gold">Galeri Detail Unit</div>

    <div class="row g-4 gallery">

        @forelse($unit->images as $img)
        <div class="col-md-4">
            <img src="{{ asset('storage/'.$img->image) }}"
                class="w-100 rounded shadow gallery-img"
                data-bs-toggle="modal"
                data-bs-target="#imageModal">
        </div>
        @empty
        <div class="text-center text-muted">
            Belum ada foto interior
        </div>
        @endforelse

    </div>

    <!-- Modal Fullscreen -->
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark border-0">

                <button type="button" class="btn-close btn-close-white ms-auto m-3"
                    data-bs-dismiss="modal"></button>

                <div class="modal-body text-center">
                    <img id="modalImage" class="img-fluid rounded">
                </div>

            </div>
        </div>
    </div>

    @php
    $tanya = urlencode("Halo Admin Brooklyn Townhouse,

    Saya tertarik dengan unit:
    Nama Unit: {$unit->nama}
    LB/LT: {$unit->luas_bangunan}/{$unit->luas_tanah}
    KT/KM: {$unit->kt}/{$unit->km}

    Boleh minta info lengkap, harga, dan cara booking?");

    $booking = urlencode("Halo Admin Brooklyn Townhouse,

    Saya ingin booking jadwal survey / janji temu untuk melihat unit:
    Nama Unit: {$unit->nama}

    Mohon info jadwal yang tersedia. Terima kasih.");
    @endphp

    <div class="row g-3 mt-4">
        <div class="col-md-6">
            <a target="_blank"
                href="https://wa.me/{{ $wa }}?text={{ $tanya }}"
                class="btn-contact btn-wa">
                <i class="fab fa-whatsapp"></i>
                Tanya Unit Ini
            </a>
        </div>

        <div class="col-md-6">
            <a target="_blank"
                href="https://wa.me/{{ $wa }}?text={{ $booking }}"
                class="btn-contact btn-gold">
                <i class="fab fa-whatsapp"></i>
                Booking Janji Temu
            </a>
        </div>
    </div>



</div>
<script>
    document.querySelectorAll('.gallery-img').forEach(img => {
        img.addEventListener('click', function() {
            document.getElementById('modalImage').src = this.src;
        });
    });
</script>

@endsection