<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoKredit - Daftar</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            dark: '#0b1120',
                            card: '#131b2f',
                            input: '#1e293b',
                            border: '#334155',
                            primary: '#2563eb',
                            primaryHover: '#1d4ed8',
                            accent: '#60a5fa',
                        }
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(37, 99, 235, 0.4)',
                    }
                }
            }
        }
    </script>
    
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #0b1120;
        }
        ::-webkit-scrollbar-thumb {
            background: #1e293b;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #334155;
        }
    </style>
</head>
<body class="bg-brand-dark text-white font-sans antialiased min-h-screen flex overflow-hidden">

    <div class="hidden lg:flex lg:w-1/2 relative flex-col justify-between p-12 bg-gradient-to-br from-brand-dark to-[#0f172a]">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-brand-primary opacity-20 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-400 opacity-10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="z-10">
            <a href="{{ route('home') }}" class="text-3xl font-bold tracking-tight">
                <span class="text-white">Moto</span><span class="text-brand-accent">Kredit</span>
            </a>
        </div>

        <div class="z-10 max-w-lg mt-10">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-primary/10 border border-brand-primary/20 text-brand-accent text-sm font-medium mb-6">
                <i data-lucide="zap" class="w-4 h-4"></i>
                Persetujuan Instan 24 Jam
            </div>
            
            <h1 class="text-5xl font-extrabold leading-tight mb-4">
                Miliki Motor Impian <br>
                <span class="text-brand-accent">Tanpa Beban.</span>
            </h1>
            <p class="text-gray-400 text-lg leading-relaxed mb-8">
                MotoKredit menyediakan platform pengajuan kredit motor tercepat, transparan, dan terpercaya. Sesuaikan DP dan tenor sesuai kemampuan finansial Anda.
            </p>

            <div class="bg-brand-card/80 backdrop-blur-md border border-brand-border p-4 rounded-2xl flex items-center gap-4 w-max shadow-lg mt-8">
                <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center text-green-400">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-400">Kerjasama Asuransi Resmi</p>
                    <p class="text-sm font-bold text-white">Keamanan Terjamin 100%</p>
                </div>
            </div>
        </div>

        <div class="z-10 text-sm text-gray-500">
            &copy; 2026 MotoKredit. Hak Cipta Dilindungi.
        </div>
    </div>

    <div class="w-full lg:w-1/2 h-screen overflow-y-auto relative">
        
        <div class="absolute top-6 left-6 lg:hidden z-20">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight">
                <span class="text-white">Moto</span><span class="text-brand-accent">Kredit</span>
            </a>
        </div>

        <div class="min-h-full flex flex-col items-center justify-center py-24 px-4 sm:px-6 lg:px-8">
            <div class="w-full max-w-md relative">
                
                <div class="bg-brand-card/90 shadow-xl rounded-2xl px-5 py-8 sm:px-8 sm:py-10 w-full">
                    <div class="mb-8 text-center">
                        <h2 class="text-3xl font-bold text-white mb-2">Buat Akun Baru</h2>
                        <p class="text-gray-400 text-sm">Lengkapi data di bawah ini untuk memulai pengajuan.</p>
                    </div>
                    <form method="POST" action="{{ route('register.create_account') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Nama Lengkap</label>
                            <input type="text" name="nama_pelanggan" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Sesuai KTP">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Alamat Email</label>
                            <input type="email" name="email" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="contoh@email.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Kata Sandi</label>
                            <input type="password" name="katakunci" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Minimal 8 karakter">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Nomor Handphone (WhatsApp)</label>
                            <input type="tel" name="no_telp" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="081234567890">
                        </div>
                        
                        <div class="pt-2">
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Alamat 1</label>
                            <input type="text" name="alamat1" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none mb-3" placeholder="Alamat lengkap">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <input type="text" name="kota1" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Kota">
                                <input type="text" name="provinsi1" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Provinsi">
                                <input type="text" name="kodepos1" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Kode Pos">
                            </div>
                        </div>

                        <div class="pt-2">
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Alamat 2 (opsional)</label>
                            <input type="text" name="alamat2" class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none mb-3" placeholder="Alamat tambahan">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <input type="text" name="kota2" class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Kota">
                                <input type="text" name="provinsi2" class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Provinsi">
                                <input type="text" name="kodepos2" class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Kode Pos">
                            </div>
                        </div>

                        <div class="pt-2">
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Alamat 3 (opsional)</label>
                            <input type="text" name="alamat3" class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none mb-3" placeholder="Alamat tambahan">
                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <input type="text" name="kota3" class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Kota">
                                <input type="text" name="provinsi3" class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Provinsi">
                                <input type="text" name="kodepos3" class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Kode Pos">
                            </div>
                        </div>

                        <div class="pt-2">
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Foto (opsional)</label>
                            <input type="file" name="foto" accept="image/*" class="block w-full text-sm text-gray-300 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-brand-primary file:text-white hover:file:bg-brand-primaryHover transition-colors cursor-pointer border border-brand-border rounded-xl">
                        </div>

                        <button type="submit" class="w-full text-white bg-brand-primary hover:bg-brand-primaryHover focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-xl text-sm px-5 py-3.5 text-center shadow-glow transition-all mt-6">
                            Buat Akun
                        </button>
                    </form>
                    
                    <div class="mt-8 text-center text-sm text-gray-400">
                        Sudah memiliki akun? 
                        <a href="{{ route('login') }}" class="text-brand-accent hover:text-white font-semibold transition-colors">Masuk di sini</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Inisialisasi ikon Lucide
        lucide.createIcons();

        // Fungsi Lihat/Sembunyikan Kata Sandi
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const iconElement = document.getElementById(iconId);
            
            if (input.type === "password") {
                input.type = "text";
                iconElement.setAttribute("data-lucide", "eye-off");
            } else {
                input.type = "password";
                iconElement.setAttribute("data-lucide", "eye");
            }
            lucide.createIcons();
        }
    </script>
</body>
</html>