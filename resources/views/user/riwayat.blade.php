@extends('layouts.user')
@section('dashboard-content')
    <h2 class="text-lg font-bold mb-4">Riwayat Booking</h2>
    <div class="space-y-4">
        {{-- Tambahkan dalam foreach booking --}}
        @foreach ($bookings as $booking)
            @php
                $minimalDp = floor($booking->total_harga * 0.3);
            @endphp

            <div class="border p-4 rounded shadow-sm bg-white">
                <p><strong>Layanan:</strong> {{ $booking->layanan->nama_layanan }}</p>
                <p><strong>Status:</strong> {{ $booking->status }}</p>
                <p><strong>Tanggal Acara:</strong> {{ $booking->tgl_acara }}</p>
                <p><strong>Total Harga:</strong> Rp{{ number_format($booking->total_harga) }}</p>
                <p><strong>Minimal DP (30%):</strong> Rp{{ number_format($minimalDp) }}</p>
                <p><strong>Jumlah DP Dibayar:</strong> Rp{{ number_format($booking->jumlah_dp ?? 0) }}</p>
                <p><strong>Jumlah Pelunasan Dibayar:</strong> Rp{{ number_format($booking->jumlah_pelunasan ?? 0) }}</p>

                {{-- Tombol Upload --}}
                <div class="flex gap-2 mt-3">
                    @if ($booking->status == 'noted')
                        <button data-modal-target="modal-dp-{{ $booking->id }}"
                            data-modal-toggle="modal-dp-{{ $booking->id }}"
                            class="px-3 py-1 bg-blue-600 text-white rounded text-sm">Upload DP</button>

                        <button data-modal-target="modal-lunas-{{ $booking->id }}"
                            data-modal-toggle="modal-lunas-{{ $booking->id }}"
                            class="px-3 py-1 bg-indigo-600 text-white rounded text-sm">Upload Pelunasan</button>
                    @elseif($booking->status == 'DP')
                        <span class="px-3 py-1 bg-gray-300 text-sm rounded">Sudah DP</span>
                        <button data-modal-target="modal-lunas-{{ $booking->id }}"
                            data-modal-toggle="modal-lunas-{{ $booking->id }}"
                            class="px-3 py-1 bg-indigo-600 text-white rounded text-sm">Upload Pelunasan</button>
                    @elseif($booking->status == 'lunas')
                        <span class="px-3 py-1 bg-gray-300 text-sm rounded">Sudah Lunas</span>
                    @else
                        <button disabled class="px-3 py-1 bg-gray-300 text-sm rounded">Upload DP</button>
                        <button disabled class="px-3 py-1 bg-gray-300 text-sm rounded">Upload Pelunasan</button>
                    @endif
                </div>

                {{-- Modal DP --}}
                <div id="modal-dp-{{ $booking->id }}" tabindex="-1"
                    class="hidden fixed inset-0 z-50  bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg w-full max-w-md">
                        <h2 class="text-lg font-bold mb-4">Upload Bukti DP</h2>
                        <form action="{{ route('user.booking.dp', $booking->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="bukti_dp" required class="mb-4 w-full border p-2 rounded">
                            <div class="flex justify-end gap-2">
                                <button type="button" data-modal-hide="modal-dp-{{ $booking->id }}"
                                    class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Modal Pelunasan --}}
                <div id="modal-lunas-{{ $booking->id }}" tabindex="-1"
                    class="hidden fixed inset-0 z-50 bg-opacity-50 flex items-center justify-center">
                    <div class="bg-white p-6 rounded-lg w-full max-w-md">
                        <h2 class="text-lg font-bold mb-4">Upload Bukti Pelunasan</h2>
                        <form action="{{ route('user.booking.lunas', $booking->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="bukti_pelunasan" required class="mb-4 w-full border p-2 rounded">
                            <div class="flex justify-end gap-2">
                                <button type="button" data-modal-hide="modal-lunas-{{ $booking->id }}"
                                    class="px-4 py-2 bg-gray-300 rounded">Batal</button>
                                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        @endforeach

    </div>
@endsection
