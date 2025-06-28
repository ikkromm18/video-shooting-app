<section id="kontak" class="bg-gray-100 dark:bg-gray-900">
    <div class="px-8 md:px-20 py-16 text-gray-700">

        <h1 class="font-bold text-4xl">Booking</h1>
        <div class="md:p-8 p-4">
            <form class="bg-white rounded-sm shadow-sm p-8" action="{{ route('booking.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <x-input name="nama" label="Nama Lengkap" type="text" value="{{ old('nama') }}" />

                    <x-input name="email" label="Email" type="email" value="{{ old('email') }}" />

                    <x-input name="no_hp" label="Nomor HP/WA" type="number" value="{{ old('no_hp') }}" />

                    <x-input name="alamat" label="Alamat" type="text" value="{{ old('alamat') }}" />

                    <x-select name="layanan_id" label="Pilih Layanan" :options="$layanans->pluck('nama_layanan', 'id')" :selected="old('layanan_id')"
                        :harga-map="$layanans->pluck('harga', 'id')" />

                    <x-select name="tambahan_id" label="Pilih Tambahan (Opsional)" :options="$tambahans->pluck('nama_tambahan', 'id')" :selected="old('tambahan_id')"
                        :harga-map="$tambahans->pluck('harga', 'id')" />


                    <x-input name="tgl_acara" label="Tanggal Acara" type="date" value="{{ old('tgl_acara') }}" />

                    {{-- Tampilkan ke user dalam format Rupiah --}}
                    <x-input name="total_harga_view" label="Total Harga" type="text" value="{{ old('total_harga') }}"
                        readonly />

                    {{-- Kirim ke server sebagai integer --}}
                    <input type="hidden" name="total_harga" id="total_harga_hidden" value="{{ old('total_harga') }}">


                </div>

                <x-submit-button label="Booking" />
            </form>

        </div>


    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const layananSelect = document.querySelector('select[name="layanan_id"]');
        const tambahanSelect = document.querySelector('select[name="tambahan_id"]');
        const totalHargaView = document.querySelector('input[name="total_harga_view"]');
        const totalHargaHidden = document.getElementById('total_harga_hidden');

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }

        function updateTotal() {
            const layananHarga = parseInt(layananSelect.selectedOptions[0]?.getAttribute('data-harga')) || 0;
            const tambahanHarga = parseInt(tambahanSelect.selectedOptions[0]?.getAttribute('data-harga')) || 0;

            const total = layananHarga + tambahanHarga;

            totalHargaView.value = formatRupiah(total);
            totalHargaHidden.value = total;
        }

        layananSelect.addEventListener('change', updateTotal);
        tambahanSelect.addEventListener('change', updateTotal);

        updateTotal();
    });
</script>
