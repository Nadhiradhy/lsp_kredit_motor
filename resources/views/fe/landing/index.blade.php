@extends('fe.master')

@section('content')  
            <!-- Hero Section -->
            <div class="relative pt-12 pb-24 lg:pt-24 lg:pb-32 overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-blue-900/40 via-slate-950 to-slate-950 -z-10"></div>
                
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid lg:grid-cols-2 gap-12 items-center">
                        <div class="animate-fade-in-up">
                            <div class="inline-flex items-center space-x-2 bg-blue-500/10 text-blue-400 px-3 py-1.5 rounded-full text-sm font-medium mb-6 border border-blue-500/20">
                                <i class="fa-solid fa-bolt"></i>
                                <span>Persetujuan Instan 24 Jam</span>
                            </div>
                            <h1 class="text-5xl lg:text-7xl font-extrabold tracking-tight mb-6 leading-tight">
                                Miliki Motor Impian <br/>
                                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-cyan-300">Tanpa Beban.</span>
                            </h1>
                            <p class="text-lg text-slate-400 mb-8 max-w-xl leading-relaxed">
                                MotoKredit menyediakan platform pengajuan kredit motor tercepat, transparan, dan terpercaya. Sesuaikan DP dan tenor sesuai kemampuan finansial Anda.
                            </p>
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                                <a href="{{ route('catalog') }}" class="px-8 py-4 bg-blue-600 hover:bg-blue-500 text-white rounded-xl font-semibold shadow-xl shadow-blue-600/20 transition-all hover:-translate-y-1 flex justify-center items-center">
                                    Lihat Pilihan Motor <i class="fa-solid fa-arrow-right ml-2"></i>
                                </a>
                                <button onclick="navigate('about')" class="px-8 py-4 glass-panel hover:bg-slate-800 text-white rounded-xl font-semibold transition-all flex justify-center items-center">
                                    Pelajari Lebih Lanjut
                                </button>
                            </div>
                        </div>

                        <div class="relative animate-float lg:block hidden">
                            <div class="absolute inset-0 bg-blue-500/20 blur-3xl rounded-full"></div>
                            <img src="https://images.unsplash.com/photo-1558981403-c5f9899a289f?auto=format&fit=crop&w=800&q=80" alt="Motorcycle" class="relative z-10 w-full rounded-2xl shadow-2xl border border-slate-800 object-cover h-[500px]" />
                            <div class="absolute -bottom-6 -left-6 glass-panel p-4 rounded-xl flex items-center space-x-4 z-20 animate-fade-in-up delay-200">
                                <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center">
                                    <i class="fa-solid fa-shield-halved text-green-400 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-sm text-slate-400">Kerjasama Asuransi Resmi</p>
                                    <p class="font-bold">Keamanan Terjamin 100%</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="py-20 bg-slate-900 border-y border-slate-800">
                <div class="container mx-auto px-4 lg:px-8">
                    <div class="grid md:grid-cols-3 gap-8">
                        <div class="glass-panel p-8 rounded-2xl text-center hover:-translate-y-2 transition-transform">
                            <div class="w-16 h-16 mx-auto bg-blue-500/10 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fa-solid fa-stopwatch text-3xl text-blue-400"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Proses Cepat</h3>
                            <p class="text-slate-400 text-sm">Pengajuan kredit dikonfirmasi dan diproses maksimal dalam waktu 1x24 jam kerja operasional.</p>
                        </div>
                        <div class="glass-panel p-8 rounded-2xl text-center hover:-translate-y-2 transition-transform">
                            <div class="w-16 h-16 mx-auto bg-purple-500/10 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fa-solid fa-hand-holding-dollar text-3xl text-purple-400"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Bunga Kompetitif</h3>
                            <p class="text-slate-400 text-sm">Nikmati margin kredit yang sangat terjangkau mulai dari 7% bekerjasama dengan partner finansial terbaik.</p>
                        </div>
                        <div class="glass-panel p-8 rounded-2xl text-center hover:-translate-y-2 transition-transform">
                            <div class="w-16 h-16 mx-auto bg-green-500/10 rounded-2xl flex items-center justify-center mb-6">
                                <i class="fa-solid fa-truck-fast text-3xl text-green-400"></i>
                            </div>
                            <h3 class="text-xl font-bold mb-3">Gratis Ongkir</h3>
                            <p class="text-slate-400 text-sm">Pengiriman motor sampai ke depan pintu rumah Anda tanpa ada biaya tambahan.</p>
                        </div>
                    </div>
                </div>
            </div>
@endsection