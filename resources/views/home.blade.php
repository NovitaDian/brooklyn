@extends('layout')

@section('content')
@php
$wa = '6282324898151';
@endphp

{{-- HERO SLIDER --}}
<section class="hero-brooklyn">

    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="hero-slide" style="background-image:url('{{ asset('images/hero1.jpg') }}')"></div>
            </div>

            <div class="carousel-item">
                <div class="hero-slide" style="background-image:url('{{ asset('images/hero2.jpg') }}')"></div>
            </div>
            <div class="carousel-item">
                <div class="hero-slide" style="background-image:url('{{ asset('images/hero3.jpg') }}')"></div>
            </div>

        </div>

    </div>

    <!-- TEXT -->
    <div class="hero-content">
        <h1 class="hero-title gold">Brooklyn Townhouse</h1>
        <p class="hero-sub">SMART PRESTIGIOUS LIVING</p>
    </div>

    <!-- KONTAK -->
    <div class="hero-bottom">
        <div class="contact-box">
            <div>📷 brooklyntownhouseclp_official</div>
            <div>📞 0823-2489-8151</div>
            <div>📍 Jl.Rinjani, Sidanegara, RT 02, RW 22 Kec. Cilacap Tengah, Cilacap</div>
        </div>
    </div>

</section>






{{-- TENTANG --}}
<section class="fasilitas">
    <h2 class="gold text-center">Fasilitas Umum Perumahan</h2>

    <div class="fasilitas-slider">
        <div class="fasilitas-track">

            <!-- ASLI -->
            <div class="fasilitas-item"><img src="/images/clubhouse.jpg">
                <p>Clubhouse</p>
            </div>
            <div class="fasilitas-item"><img src="/images/swimmingpool.png">
                <p>Swimming Pool</p>
            </div>
            <div class="fasilitas-item"><img src="/images/joggingtrack.png">
                <p>Jogging Track</p>
            </div>
            <div class="fasilitas-item"><img src="/images/mushola.png">
                <p>Mushola</p>
            </div>
            <div class="fasilitas-item"><img src="/images/playground.png">
                <p>Playground</p>
            </div>
            <div class="fasilitas-item"><img src="/images/onegate.png">
                <p>One Gate System</p>
            </div>

            <!-- DUPLIKAT UNTUK LOOP -->
            <div class="fasilitas-item"><img src="/images/clubhouse.jpg">
                <p>Clubhouse</p>
            </div>
            <div class="fasilitas-item"><img src="/images/swimmingpool.png">
                <p>Swimming Pool</p>
            </div>
            <div class="fasilitas-item"><img src="/images/joggingtrack.png">
                <p>Jogging Track</p>
            </div>
            <div class="fasilitas-item"><img src="/images/mushola.png">
                <p>Mushola</p>
            </div>
            <div class="fasilitas-item"><img src="/images/playground.png">
                <p>Playground</p>
            </div>
            <div class="fasilitas-item"><img src="/images/onegate.png">
                <p>One Gate System</p>
            </div>

        </div>
    </div>
</section>

{{-- KEUNGGULAN --}}
<section class="why-brooklyn">
    <div class="container">
        <h2 class="gold text-center">Mengapa Memilih Brooklyn Townhouse?</h2>
        <p class="text-center why-sub">
            Bukan sekedar tempat tinggal, tetapi lingkungan hunian yang dirancang untuk kenyamanan,
            keamanan, dan nilai investasi jangka panjang.
        </p>

        <div class="why-grid">
            <div class="why-card">
                <div class="why-icon">
                    <i class="fa-solid fa-house-flood-water"></i>
                </div>
                <h4>Bebas Risiko Banjir</h4>
                <p>Kontur tanah telah ditinggikan dari jalan utama sebelum pembangunan sehingga posisi kawasan lebih tinggi dari lingkungan sekitar.</p>
            </div>

            <div class="why-card">
                <div class="why-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <h4>Lokasi Pusat Kota</h4>
                <p>Memudahkan akses untuk menjangkau ke berbagai fasilitas umum, pelayanan kesehatan, pendidikan, dan pusat perbelanjaan.</p>
            </div>

            <div class="why-card">
                <div class="why-icon">
                    <i class="fa-solid fa-gem"></i>
                </div>
                <h4>Desain Modern Premium</h4>
                <p>Mengusung konsep modern elegan dengan material kualitas premium yang dikerjakan secara profesional setiap detailnya.</p>
            </div>

            <div class="why-card">
                <div class="why-icon">
                    <i class="fa-solid fa-arrow-up-right-dots"></i>
                </div>
                <h4>Nilai Investasi Tinggi</h4>
                <p>Berlokasi di area strategis dengan potensi kenaikan nilai properti yang signifikan setiap tahunnya.</p>
            </div>
        </div>
    </div>
</section>


{{-- KATALOG --}}
<section class="catalog" id="catalog">
    <div class="container">
        <h2 class="gold text-center">Katalog</h2>

        <div class="catalog-grid">
            @foreach($units as $u)
            <div class="catalog-item">

                <div class="item-img">
                    <img src="{{ asset('brooklyn/storage/app/unit/'.$u->foto) }}" class="unit-img">
                </div>

                <div class="item-info">
                    <h4>{{ $u->nama }}</h4>

                    <div class="spec">
                        <div class="spec-item">
                            <span>Luas Tanah</span>
                            <strong>{{ $u->luas_tanah }} m²</strong>
                        </div>
                        <div class="spec-item">
                            <span>Luas Bangunan</span>
                            <strong>{{ $u->luas_bangunan }} m²</strong>
                        </div>
                        <div class="spec-item">
                            <span>Kamar Tidur</span>
                            <strong>{{ $u->kt }}</strong>
                        </div>
                        <div class="spec-item">
                            <span>Kamar Mandi</span>
                            <strong>{{ $u->km }}</strong>
                        </div>
                    </div>

                    <div class="unit-action">
                        <a href="{{ route('unit.detail',$u->id) }}" class="btn-detail">Detail</a>
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>
</section>







{{-- SITEPLAN --}}
<section class="section bg-light">
    <div class="container text-center">
        <h2 class="gold">Site Plan Brooklyn</h2>

        <div class="siteplan-wrap mt-5">
            <img src="{{ asset('images/siteplan.png') }}" class="siteplan-img">

            @foreach($points as $p)
            <div class="dot
                {{ $p->status }}"
                style="left:{{ $p->x }}%; top:{{ $p->y }}%;"
                title="{{ $p->nama_unit }} - {{ $p->status }}">
            </div>
            @endforeach
        </div>

        <div class="legend mt-4">
            <span class="badge bg-success">Dijual</span>
            <span class="badge bg-warning text-dark">Booked</span>
            <span class="badge bg-primary">Build</span>
            <span class="badge bg-danger">Dihuni</span>
        </div>
    </div>
</section>
{{-- PETA LOKASI --}}
<section>
    <div class="container">
        <h2 class="gold" style="text-align:center;">Lokasi Brooklyn Townhouse</h2>
        <div style="margin-top:40px; border-radius:12px; overflow:hidden; box-shadow:0 10px 30px rgba(0,0,0,0.2);"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.709492871876!2d109.0171875!3d-7.6996875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6543d437d4580f%3A0x4dd79bc1767ec489!2sBrooklyn%20Townhouse!5e0!3m2!1sid!2sid!4v1738210000000" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"> </iframe> </div>
        <div style="text-align:center; margin-top:20px;"> <a href="https://maps.google.com/?q=-7.6996875,109.0171875" target="_blank" class="btn-gold"> Buka di Google Maps </a> </div>
    </div>
</section>

<section class="py-5">
    <div class="container" style="max-width: 900px;">
        <h2 class="text-center gold mb-4" style="font-weight:600;">
            Pertanyaan yang Sering Ditanyakan
        </h2>

        <div class="accordion" id="faqAccordion">
            @foreach($faqs as $i => $f)
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed"
                        data-bs-toggle="collapse"
                        data-bs-target="#faq{{ $i }}">
                        {{ $f->question }}
                    </button>
                </h2>
                <div id="faq{{ $i }}" class="accordion-collapse collapse"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        {{ $f->answer }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    </div>
    </div>
</section>

<section class="cta">
    <h2>Wujudkan Rumah Impian Bapak/Ibu Sekarang</h2>
    <p>Pilih unit terbaik Bapak/Ibu sebelum kehabisan.</p>
</section>
<section class="payment-section py-5">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="text-center gold mb-5">Metode Pembayaran</h2>
            <p class="section-sub">
                Kami menyediakan beberapa pilihan metode pembayaran yang fleksibel
                dan bisa disesuaikan dengan kebutuhan Bapak/Ibu.
            </p>
        </div>

        <div class="row g-4">

            <!-- Cash Keras -->
            <div class="col-md-4">
                <div class="pay-card">
                    <div class="icon">💰</div>
                    <h5>Cash Keras</h5>
                    <p>
                        Pembayaran langsung lunas di awal transaksi.
                        Proses cepat tanpa cicilan dan biasanya mendapatkan
                        penawaran harga terbaik.
                    </p>
                </div>
            </div>

            <!-- Cash Bertahap -->
            <div class="col-md-4">
                <div class="pay-card">
                    <div class="icon">📅</div>
                    <h5>Cash Bertahap</h5>
                    <p>
                        Pembayaran dilakukan secara bertahap 12 kali setahun.
                        Solusi fleksibel tanpa melalui proses perbankan.
                        <strong>TANPA BUNGA</strong>
                    </p>
                </div>
            </div>

            <!-- KPR -->
            <div class="col-md-4">
                <div class="pay-card">
                    <div class="icon">🏦</div>
                    <h5>KPR Bank</h5>
                    <p>
                        Pembayaran melalui fasilitas Kredit Pemilikan Rumah (KPR)
                        dengan cicilan ringan dan tenor panjang sesuai pilihan bank.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="kpr-modern py-5">
    <div class="container">
        <h2 class="text-center gold mb-5">Simulasi KPR Brooklyn</h2>
        <p class="text-center">Perhitungan di bawah merupakan simulasi estimasi dan bukan angka pasti. Besaran cicilan dapat berubah mengikuti kebijakan, suku bunga, serta persetujuan dari bank yang dipilih. Simulasi ini menggunakan asumsi bunga terendah (3,75%) sebagai gambaran cicilan paling ringan.</p>
        <br>
        <div class="row justify-content-center g-4">

            {{-- LEFT : FORM --}}
            <div class="col-lg-6">
                <div class="card shadow border-0 rounded-4 p-4">
                    <h5 class="fw-bold mb-4">Isi Rencana KPR</h5>

                    <div class="mb-3">
                        <label class="form-label">Pilih Type Rumah</label>
                        <select id="type" class="form-select">
                            <option value="">-- pilih type --</option>
                            @foreach($units as $u)
                            <option
                                value="{{ $u->id }}"
                                data-harga="{{ $u->harga }}"
                                data-nama="{{ $u->nama }}">
                                {{ $u->nama }}
                            </option>
                            @endforeach
                        </select>


                    </div>

                    <div class="mb-3">
                        <label class="form-label">Harga Rumah</label>
                        <input type="text" id="harga" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">DP (%) minimal 10%</label>
                        <input type="number" id="dp" class="form-control"
                            value="10" min="10" max="50" oninput="hitungKPR()">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tenor</label>
                        <select id="tenor" class="form-select" onchange="hitungKPR()">
                            @for($i=10;$i<=15;$i++)
                                <option value="{{ $i }}">{{ $i }} Tahun</option>
                                @endfor
                        </select>
                    </div>
                </div>
            </div>

            {{-- RIGHT : RESULT --}}
            <div class="col-lg-5">
                <div class="card shadow border-0 rounded-4 text-center p-5 h-100 d-flex justify-content-center">
                    <p class="text-muted mb-2">Estimasi Cicilan / Bulan</p>
                    <h1 id="hasil" class="display-5 fw-bold text-warning">Rp 0</h1>

                    <a id="waBtn" target="_blank"
                        class="btn btn-dark mt-4 rounded-pill px-4">
                        Konsultasi WhatsApp
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>



{{-- PROGRESS --}}
<section class="progress-section">
    <div class="container">
        <h2 class="text-center gold mb-5">Progress Unit Brooklyn</h2>

        <div class="progress-grid">

            <div class="stat-card">
                <span>Ready (Kavling Kosong)</span>
                <b>{{ $progress['ready'] }}</b>
            </div>

            <div class="stat-card">
                <span>Dijual Bank</span>
                <b>{{ $progress['dijual']  ?? '0'}}</b>
            </div>
            <div class="stat-card">
                <span>Booked</span>
                <b>{{ $progress['booked']  ?? '0'}}</b>
            </div>

            <div class="stat-card">
                <span>Dalam Pembangunan</span>
                <b>{{ $progress['build'] ?? '0'}}</b>
            </div>

            <div class="stat-card">
                <span>Sudah Dihuni</span>
                <b>{{ $progress['dihuni'] ?? '0' }}</b>
            </div>


        </div>
    </div>
</section>
<section class="contact-section">
    <div class="container text-center">
        <h2 class="gold mb-3">Hubungi Kami</h2>
        <p class="contact-sub">
            Dapatkan informasi lengkap, promo terbaru, dan jadwalkan survey lokasi bersama tim kami.
        </p>

        <div class="contact-icons">
            <a href="https://wa.me/6282324898151" target="_blank" class="contact-item">
                <i class="fa-brands fa-whatsapp"></i>
                <span>WhatsApp</span>
            </a>

            <a href="https://instagram.com/brooklyntownhouseclp_official" target="_blank" class="contact-item">
                <i class="fa-brands fa-instagram"></i>
                <span>Instagram</span>
            </a>

            <a href="https://tiktok.com/@ubrooklyn.townhouse" target="_blank" class="contact-item">
                <i class="fa-brands fa-tiktok"></i>
                <span>TikTok</span>
            </a>

            <a href="https://facebook.com/brooklyntownhouseclp_official" target="_blank" class="contact-item">
                <i class="fa-brands fa-facebook-f"></i>
                <span>Facebook</span>
            </a>
        </div>
    </div>
</section>

<script>
    document.querySelectorAll('.faq-question').forEach(btn => {
        btn.addEventListener('click', function() {
            const answer = this.nextElementSibling;
            answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        const typeEl = document.getElementById('type');
        const hargaEl = document.getElementById('harga');
        const dpEl = document.getElementById('dp');
        const tenorEl = document.getElementById('tenor');
        const hasilEl = document.getElementById('hasil');
        const waBtn = document.getElementById('waBtn');

        function formatRupiah(angka) {
            return 'Rp ' + angka.toLocaleString('id-ID');
        }

        function hitungKPR() {
            let harga = parseInt(hargaEl.dataset.raw || 0);
            let dpPersen = parseInt(dpEl.value);
            let tahun = parseInt(tenorEl.value);

            if (!harga || !dpPersen || !tahun) return;

            let dp = harga * dpPersen / 100;
            let pinjaman = harga - dp;

            let bunga = 3.75 / 100;
            let bulan = tahun * 12;

            let cicilan = (pinjaman * bunga / 12) /
                (1 - Math.pow(1 + bunga / 12, -bulan));

            hasilEl.innerText = formatRupiah(Math.round(cicilan));

            // WA link
            let pesan =
                `Halo, saya sudah mencoba simulasi KPR Brooklyn Townhouse.

Detail simulasi saya:

• Type     : ${typeEl.options[typeEl.selectedIndex].text}
• Harga    : ${formatRupiah(harga)}
• DP       : ${dpPersen}%
• Tenor    : ${tahun} Tahun
• Estimasi : ${formatRupiah(Math.round(cicilan))} / bulan

Mohon info lebih lanjut ya.`;

            waBtn.href = `https://wa.me/{{ $wa }}?text=${encodeURIComponent(pesan)}`;
        }


        typeEl.addEventListener('change', function() {
            let selected = this.options[this.selectedIndex];
            let harga = parseInt(selected.getAttribute('data-harga'));

            if (!harga) return;

            hargaEl.value = formatRupiah(harga);
            hargaEl.dataset.raw = harga;

            hitungKPR();
        });

        dpEl.addEventListener('input', hitungKPR);
        tenorEl.addEventListener('change', hitungKPR);

    });
</script>

@endsection