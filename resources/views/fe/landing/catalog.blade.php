@extends('fe.master')

@section('content')  
            <div class="container mx-auto px-4 lg:px-8">
                <div class="mb-12 animate-fade-in-up">
                    <h2 class="text-3xl lg:text-4xl font-bold mb-4">Katalog Motor</h2>
                    <p class="text-slate-400">Pilih spesifikasi motor yang sesuai dengan kebutuhan harian Anda.</p>
                </div>

                <!-- Filter Simulation -->
                <div class="flex flex-wrap gap-4 mb-8">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-full text-sm font-medium">Semua Kategori</button>
                    <button class="px-4 py-2 glass-panel hover:bg-slate-800 text-slate-300 rounded-full text-sm font-medium transition">Skuter (Matic)</button>
                    <button class="px-4 py-2 glass-panel hover:bg-slate-800 text-slate-300 rounded-full text-sm font-medium transition">Sport Bike</button>
                    <button class="px-4 py-2 glass-panel hover:bg-slate-800 text-slate-300 rounded-full text-sm font-medium transition">Dirt Bike</button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8" id="katalog-container">
                    @forelse($motors as $motor)
                        <div class="bg-slate-800 rounded-lg shadow-lg overflow-hidden flex flex-col">
                            <img src="{{ $motor->foto1 ? asset('storage/' . $motor->foto1) : 'https://via.placeholder.com/400x250?text=No+Image' }}" alt="{{ $motor->nama_motor }}" class="w-full h-48 object-cover">
                            <div class="p-4 flex-1 flex flex-col">
                                <h3 class="text-lg font-bold mb-1">{{ $motor->nama_motor }}</h3>
                                <div class="text-sm text-slate-400 mb-2">{{ $motor->jenisMotor->jenis ?? '-' }}</div>
                                <div class="text-blue-400 font-semibold mb-2">Rp {{ number_format($motor->harga_jual, 0, ',', '.') }}</div>
                                <div class="text-xs text-slate-400 mb-2">Stok: {{ $motor->stok }}</div>
                                <p class="text-xs text-slate-300 flex-1">{{ str($motor->deskripsi_motor)->limit(60) }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-4 text-center text-slate-400">Belum ada data motor.</div>
                    @endforelse
                </div>
            </div>
@endsection