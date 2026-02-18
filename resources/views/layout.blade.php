<!DOCTYPE html>
<html>

<head>
    <title>Brooklyn Townhouse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Inter&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* ================= GLOBAL / RESET ================= */
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f4f6f9;
            color: #222;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        section {
            padding: 100px 10%;
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
            margin-bottom: 20px;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            padding: 10px 22px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .btn-back i {
            font-size: 18px;
        }

        .btn-back:hover {
            background: #d4af37;
            color: white;
            transform: translateY(-2px);
        }

        /* ================= COLOR & BUTTON ================= */
        .navy {
            background: #0b1c2d;
            color: #fff;
        }

        .gold {
            color: #d4af37;
        }

        .btn-gold {
            background: #d4af37;
            color: #0b1c2d;
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: .3s;
        }

        .btn-gold:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .2);
        }

        .btn-gold.small {
            padding: 10px 20px;
            font-size: 14px;
        }

        .btn-wa {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 42px;
            border-radius: 10px;
            background: #25D366;
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            transition: .25s;
        }

        .btn-wa:hover {
            opacity: .9;
        }

        .btn-detail {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 42px;
            border-radius: 10px;
            border: 1.5px solid #c8a84a;
            color: #c8a84a;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            background: #fff;
            transition: .25s;
        }

        .btn-detail:hover {
            background: #c8a84a;
            color: #fff;
        }

        /* RESET */
        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* HERO FULL */
        .hero-brooklyn {
            position: relative;
            width: 100%;
            height: 100vh;
            overflow: hidden;
        }

        /* SLIDER */
        .carousel,
        .carousel-inner,
        .carousel-item {
            height: 100%;
        }

        /* BACKGROUND */
        .hero-slide {
            height: 100vh;
            width: 100%;
            background-position: center;
            position: relative;
        }

        /* OVERLAY */
        .hero-slide::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
        }


        /* TEXT CENTER */
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            z-index: 5;
            width: 100%;
        }

        /* TITLE */
        .hero-title {
            font-size: 64px;
            font-weight: 600;
        }

        /* SUB */
        .hero-sub {
            letter-spacing: 4px;
            margin-top: 10px;
        }

        /* GOLD */
        .gold {
            color: #d4af37;
        }

        /* KONTAK */
        .hero-bottom {
            position: absolute;
            bottom: 40px;
            left: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            z-index: 6;
        }

        /* BOX */
        .contact-box {
            background: rgba(255, 255, 255, 0.92);
            padding: 15px 40px;
            border-radius: 50px;
            display: flex;
            gap: 35px;
            font-weight: 500;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* MOBILE */
        @media(max-width:768px) {
            .hero-title {
                font-size: 36px;
            }

            .contact-box {
                flex-direction: column;
                border-radius: 20px;
                gap: 5px;
                padding: 12px 20px;
            }
        }


        /* ================= GRID & CARD UMUM ================= */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 240px));
            justify-content: center;
            gap: 40px;
            margin-top: 40px;
        }

        .card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 12px 25px rgba(0, 0, 0, .08);
            transition: .3s;
        }

        .card:hover {
            transform: translateY(-6px);
        }

        .card img {
            width: 100%;
            aspect-ratio: 3/4;
            object-fit: cover;
            display: block;
        }

        .card-body {
            padding: 18px;
            font-size: 14px;
        }

        /* ================= CATALOG (Shopee style) ================= */
        .catalog {
            padding: 60px 20px;
            background: #f6f8fb;
            display: flex;
            justify-content: center;
        }

        .catalog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 28px;
            justify-content: center;
        }


        .catalog-item {
            width: 100%;
            display: flex;
            gap: 18px;
            background: #fff;
            border-radius: 18px;
            padding: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
        }

        .catalog-item:hover {
            transform: translateY(-6px);
        }


        /* kiri gambar 3:4 */
        .item-img {
            width: 34%;
            aspect-ratio: 4 / 3;
            overflow: hidden;
            border-radius: 14px;
            flex-shrink: 0;
        }

        .item-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }


        /* kanan info */
        .item-info {
            width: 66%;
        }

        .item-info h4 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 16px;
        }


        .spec {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px 24px;
            margin-bottom: 18px;
        }

        .spec-item span {
            font-size: 11px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: .8px;
        }

        .spec-item strong {
            font-size: 18px;
            color: #111;
            display: block;
            margin-top: 4px;
        }


        .unit-action {
            margin-top: 10px;
        }

        .btn-detail {
            display: inline-block;
            padding: 10px 18px;
            border-radius: 8px;
            background: #111;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
        }


        /* ================= ABOUT ================= */
        .about {
            padding: 120px 10%;
        }

        .about-inner {
            max-width: 800px;
            margin: auto;
            text-align: center;
            line-height: 1.9;
            font-size: 18px;
        }

        /* ================= WHY BROOKLYN ================= */
        .why-brooklyn {
            padding: 110px 0;
            background: #fff;
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 35px;
        }

        .why-card {
            background: #f9fbfd;
            padding: 40px 25px;
            border-radius: 16px;
            text-align: center;
            transition: .35s;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .06);
        }

        .why-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, .12);
        }

        .why-icon {
            width: 80px;
            height: 80px;
            margin: auto auto 20px;
            border-radius: 50%;
            background: linear-gradient(135deg, #d4af37, #f5d97b);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
            color: #0b1c2d;
        }

        /* ================= FASILITAS SLIDER ================= */
        .fasilitas {
            padding: 100px 0;
            text-align: center;
            background: #f8f8f8;
        }

        .fasilitas-slider {
            overflow: hidden;
            position: relative;
            margin-top: 40px;
        }

        .fasilitas-track {
            display: flex;
            gap: 25px;
            transition: transform .6s ease;
        }

        .fasilitas-item {
            width: 260px;
            flex-shrink: 0;
        }

        .fasilitas-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .15);
        }

        /* ================= PROGRESS / STAT ================= */
        .progress-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            /* 1 baris */
            gap: 16px;
        }

        .stat-card {
            background: #fff;
            padding: 18px 10px;
            /* lebih kecil */
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .stat-card span {
            display: block;
            font-size: 13px;
            /* diperkecil */
            color: #777;
            margin-bottom: 6px;
        }

        .stat-card b {
            font-size: 28px;
            /* diperkecil */
            color: #0b1c2d;
        }

        /* Tablet */
        @media (max-width: 992px) {
            .progress-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* HP */
        @media (max-width: 576px) {
            .progress-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }


        /* ================= CONTACT ================= */
        .contact-section {
            padding: 80px 20px;
            background: #0b1c2d;
            color: #fff;
        }

        .contact-sub {
            max-width: 600px;
            margin: 0 auto 40px;
            color: #cfcfcf;
        }

        .contact-icons {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }

        .contact-item {
            text-decoration: none;
            color: #fff;
            text-align: center;
            transition: .3s;
        }

        .contact-item i {
            font-size: 38px;
            margin-bottom: 10px;
            display: block;
        }

        .contact-item span {
            font-size: 14px;
            letter-spacing: .5px;
        }

        .contact-item:hover {
            transform: translateY(-6px);
            color: #d4af37;
            /* gold */
        }

        /* ================= PAYMENT ================= */
        .payment-section {
            background: #f8fafc;
        }

        .section-title {
            font-size: 34px;
            font-weight: 700;
            color: #0b1c2d;
        }

        .section-sub {
            color: #777;
            max-width: 620px;
            margin: auto;
        }

        .pay-card {
            background: #fff;
            padding: 35px 28px;
            border-radius: 18px;
            text-align: center;
            height: 100%;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);
            transition: .3s;
            border-top: 4px solid #d4af37;
        }

        .pay-card:hover {
            transform: translateY(-8px);
        }

        .pay-card .icon {
            font-size: 42px;
            margin-bottom: 15px;
        }

        .pay-card h5 {
            font-weight: 700;
            margin-bottom: 10px;
            color: #0b1c2d;
        }

        .pay-card p {
            color: #666;
            font-size: 15px;
            line-height: 1.6;
        }

        /* ================= SITEPLAN ================= */
        .siteplan-wrap {
            position: relative;
            max-width: 1000px;
            margin: auto;
        }

        .siteplan-img {
            width: 100%;
            border-radius: 12px;
        }

        .dot {
            position: absolute;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            border: 2px solid #fff;
        }

        .dot.dijual {
            background: green;
        }

        .dot.booked {
            background: yellow;
        }

        .dot.build {
            background: blue;
        }

        .dot.dihuni {
            background: red;
        }

        /* ================= CTA ================= */
        .cta {
            background: #0d1b2a;
            color: #fff;
            text-align: center;
            padding: 70px 20px;
        }

        .btn-cta {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: gold;
            color: #000;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }

        .accordion-button {
            font-weight: 600;
            font-size: 16px;
            background: #fff;
        }

        .accordion-button:not(.collapsed) {
            color: #000;
            background: #f8f9fa;
        }

        .accordion-item {
            border-radius: 10px;
            overflow: hidden;
        }

        .wrapper {
            max-width: 1100px;
            margin: auto;
            padding: 60px 20px;
        }

        .unit-title {
            font-size: 36px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 40px;
        }

        .spec-box {
            background: #fff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            height: 100%;
        }

        .spec-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .spec-list {
            line-height: 32px;
            font-size: 15px;
        }

        .denah-img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        }

        .gallery-title {
            font-size: 28px;
            font-weight: 700;
            margin: 70px 0 25px;
            text-align: center;
        }

        .gallery img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            border-radius: 10px;
            transition: .3s;
            cursor: pointer;
        }

        .gallery img:hover {
            transform: scale(1.04);
        }

        .btn-wa,
        .btn-gold {
            padding: 18px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: block;
        }

        .btn-wa {
            background: #25D366;
            color: #fff;
            text-align: center;
        }

        .btn-gold {
            background: gold;
            color: #000;
        }

        .btn-contact {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;

            width: 100%;
            height: 55px;

            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            text-decoration: none;
            transition: .3s ease;
        }

        /* tombol hijau */
        .btn-wa {
            background: #25D366;
            color: #fff;
        }

        .btn-wa:hover {
            background: #1ebe5d;
            color: #fff;
        }

        /* tombol gold */
        .btn-gold {
            background: #c9a646;
            color: #fff;
        }

        .btn-gold:hover {
            background: #b89335;
            color: #fff;
        }

        .btn-contact i {
            font-size: 20px;
        }

        .kpr-modern {
            padding: 90px 0;
            background: #f4f6fb;
        }

        .kpr-wrapper {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            max-width: 1100px;
            margin: auto;
        }

        /* LEFT */
        .kpr-left {
            background: #fff;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .kpr-left h4 {
            margin-bottom: 25px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 13px;
            color: #777;
            margin-bottom: 6px;
            display: block;
        }

        .form-control {
            height: 50px;
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 0 15px;
        }

        /* RIGHT */
        .kpr-right {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .angsuran-card {
            background: linear-gradient(135deg, #151515, #2c2c2c);
            color: #fff;
            padding: 40px;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
        }

        .angsuran-card p {
            opacity: .7;
            font-size: 14px;
        }

        .angsuran-card h1 {
            font-size: 46px;
            color: #d4af37;
            margin: 15px 0;
        }

        .btn-wa-kpr {
            display: inline-block;
            margin-top: 20px;
            padding: 14px 22px;
            background: #25D366;
            color: #fff;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
        }

        .kpr-info {
            background: #fff;
            border-radius: 14px;
            padding: 25px;
            display: flex;
            justify-content: space-between;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .kpr-info small {
            color: #888;
        }

        .kpr-info b {
            font-size: 18px;
        }

        .hero-brooklyn {
            position: relative;
            height: 100vh;
        }

        .carousel,
        .carousel-inner,
        .carousel-item {
            height: 100vh;
        }

        .hero-bg {
            height: 100vh;
            width: 100%;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        /* overlay gelap biar tulisan jelas */
        .hero-bg::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 100%;
            padding: 20px;
        }


        .gold {
            color: #d4af37;
        }


        /* Responsive */
        @media(max-width:768px) {
            .kpr-wrapper {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>


    @yield('content')
    <script>
        const track = document.querySelector('.fasilitas-track');

        let scrollAmount = 0;

        function autoSlide() {
            scrollAmount += 1;
            if (scrollAmount >= track.scrollWidth / 2) {
                scrollAmount = 0;
            }
            track.style.transform = `translateX(-${scrollAmount}px)`;
        }

        setInterval(autoSlide, 20);
    </script>
    <script src="{{ asset('js/kpr.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>