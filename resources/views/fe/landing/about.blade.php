@extends('fe.master')

@section('content')  
            <div class="container mx-auto px-4 lg:px-8">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-4xl font-bold mb-8 text-center animate-fade-in-up">Tentang <span class="text-blue-500">MotoKredit</span></h2>
                    
                    <div class="glass-panel p-8 md:p-12 rounded-3xl mb-12 animate-fade-in-up delay-100">
                        <p class="text-lg text-slate-300 leading-relaxed mb-6">
                            Didirikan pada tahun 2020, <strong>MotoKredit Pro</strong> adalah inovator dalam industri pembiayaan kendaraan bermotor roda dua di Indonesia. Kami menjembatani masyarakat yang ingin memiliki kendaraan impian dengan lembaga finansial resmi (Leasing) melalui platform digital yang modern dan transparan.
                        </p>
                        <p class="text-lg text-slate-300 leading-relaxed">
                            Berdasarkan database terintegrasi kami, kami menyediakan informasi real-time mengenai stok motor, status pengajuan, hingga detail histori angsuran kepada setiap pelanggan.
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8 animate-fade-in-up delay-200">
                        <div class="glass-panel p-8 rounded-2xl border-l-4 border-l-blue-500">
                            <h3 class="text-2xl font-bold mb-4"><i class="fa-solid fa-eye text-blue-400 mr-2"></i> Visi</h3>
                            <p class="text-slate-400">Menjadi platform kredit motor digital nomor satu di Asia Tenggara yang memberikan keadilan finansial bagi seluruh masyarakat tanpa proses birokrasi yang rumit.</p>
                        </div>
                        <div class="glass-panel p-8 rounded-2xl border-l-4 border-l-green-500">
                            <h3 class="text-2xl font-bold mb-4"><i class="fa-solid fa-bullseye text-green-400 mr-2"></i> Misi</h3>
                            <ul class="list-disc list-inside text-slate-400 space-y-2">
                                <li>Memberikan persetujuan secepat kilat.</li>
                                <li>Menyediakan suku bunga dan margin asuransi paling wajar.</li>
                                <li>Sistem transparansi angsuran yang dapat dipantau 24/7.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
@endsection