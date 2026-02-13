
document.addEventListener('DOMContentLoaded', function () {

    const typeEl  = document.getElementById('type');
    const hargaEl = document.getElementById('harga');
    const dpEl    = document.getElementById('dp');
    const tenorEl = document.getElementById('tenor');
    const hasilEl = document.getElementById('hasil');
    const waBtn   = document.getElementById('waBtn');

    function formatRupiah(angka){
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function hitungKPR(){
        let harga = parseInt(hargaEl.dataset.raw || 0);
        let dpPersen = parseInt(dpEl.value);
        let tahun = parseInt(tenorEl.value);

        if(!harga || !dpPersen || !tahun) return;

        let dp = harga * dpPersen / 100;
        let pinjaman = harga - dp;

        let bunga = 3.75 / 100;
        let bulan = tahun * 12;

        let cicilan = (pinjaman * bunga/12) /
            (1 - Math.pow(1 + bunga/12, -bulan));

        hasilEl.innerText = formatRupiah(Math.round(cicilan));

        // WA link
        waBtn.href = `https://wa.me/{{ $wa }}?text=Saya tertarik simulasi KPR Type ${typeEl.options[typeEl.selectedIndex].text}
Harga: ${formatRupiah(harga)}
DP: ${dpPersen}%
Tenor: ${tahun} Tahun
Estimasi Cicilan: ${formatRupiah(Math.round(cicilan))}`;
    }

    typeEl.addEventListener('change', function(){
        let selected = this.options[this.selectedIndex];
        let harga = parseInt(selected.getAttribute('data-harga'));

        if(!harga) return;

        hargaEl.value = formatRupiah(harga);
        hargaEl.dataset.raw = harga;

        hitungKPR();
    });

    dpEl.addEventListener('input', hitungKPR);
    tenorEl.addEventListener('change', hitungKPR);

});

