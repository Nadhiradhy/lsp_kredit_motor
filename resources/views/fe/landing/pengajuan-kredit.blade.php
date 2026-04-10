@extends('fe.master')

@section('content')
<div class="container mx-auto px-4 lg:px-8 py-8 max-w-2xl">
    <h2 class="text-2xl font-bold mb-6">Pengajuan Kredit Motor</h2>
    <div class="bg-slate-800 rounded-lg shadow-lg p-6 mb-6">
        <div class="flex gap-4 mb-4">
            <img src="{{ $motor->foto1 ? asset('storage/' . $motor->foto1) : 'https://via.placeholder.com/120x80?text=No+Image' }}" alt="{{ $motor->nama_motor }}" class="w-32 h-20 object-cover rounded">
            <div>
                <div class="font-bold text-lg">{{ $motor->nama_motor }}</div>
                <div class="text-slate-400 text-sm mb-1">{{ $motor->jenisMotor->jenis ?? '-' }}</div>
                <div class="text-blue-400 font-semibold">Rp {{ number_format($motor->harga_jual, 0, ',', '.') }}</div>
            </div>
        </div>
        <form action="{{ route('fe.pengajuan.store', $motor->id) }}" method="POST">
            @csrf
            <input type="hidden" name="harga_kredit" value="{{ $motor->harga_jual }}">
            <div class="mb-4">
                <label class="block mb-1">Nama Pelanggan</label>
                <input type="text" class="w-full rounded px-3 py-2 bg-slate-900 border border-slate-700" value="{{ $pelanggan->nama }}" readonly>
            </div>
            <div class="mb-4">
                <label class="block mb-1">DP (Uang Muka)</label>
                <input type="number" name="dp" class="w-full rounded px-3 py-2 bg-slate-900 border border-slate-700" required min="0">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Jenis Cicilan</label>
                <select name="id_jenis_cicilan" class="w-full rounded px-3 py-2 bg-slate-900 border border-slate-700" required>
                    <option value="">Pilih Jenis Cicilan</option>
                    @foreach($jenisCicilan as $jc)
                        <option value="{{ $jc->id }}">{{ $jc->nama }} ({{ $jc->lama_cicilan }} bulan)</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Asuransi</label>
                <select name="id_asuransi" class="w-full rounded px-3 py-2 bg-slate-900 border border-slate-700" required>
                    <option value="">Pilih Asuransi</option>
                    @foreach($asuransi as $as)
                        <option value="{{ $as->id }}">{{ $as->nama }} (Rp {{ number_format($as->biaya, 0, ',', '.') }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Biaya Asuransi</label>
                <input type="number" name="biaya_asuransi" class="w-full rounded px-3 py-2 bg-slate-900 border border-slate-700" min="0">
            </div>
            <div class="mb-4">
                <label class="block mb-1">Cicilan Perbulan</label>
                <input type="number" name="cicilan_perbulan" class="w-full rounded px-3 py-2 bg-slate-900 border border-slate-700" required min="0">
            </div>
            <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-2 rounded-full">Ajukan Kredit</button>
        </form>
    </div>
</div>
@endsection
