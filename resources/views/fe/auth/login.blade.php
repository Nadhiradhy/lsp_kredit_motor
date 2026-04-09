<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoKredit - Masuk</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            dark: '#0b1120',      // Background utama
                            card: '#131b2f',      // Background kartu form
                            input: '#1e293b',     // Background field input
                            border: '#334155',    // Warna border
                            primary: '#2563eb',   // Biru utama
                            primaryHover: '#1d4ed8', // Biru saat hover
                            accent: '#60a5fa',    // Teks aksen biru muda
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

    <!-- Sisi Kiri: Branding & Informasi Visual -->
    <div class="hidden lg:flex lg:w-1/2 relative flex-col justify-between p-12 bg-gradient-to-br from-brand-dark to-[#0f172a]">
        <!-- Efek Cahaya Latar Belakang -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-brand-primary opacity-20 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-blue-400 opacity-10 rounded-full blur-[100px] pointer-events-none"></div>

        <!-- Logo -->
        <div class="z-10">
            <a href="{{ route('home') }}" class="text-3xl font-bold tracking-tight">
                <span class="text-white">Moto</span><span class="text-brand-accent">Kredit</span>
            </a>
        </div>

        <!-- Konten Utama Kiri -->
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
                Masuk ke akun Anda untuk memantau status pengajuan kredit, melakukan pembayaran, atau melihat promo motor terbaru.
            </p>

            <!-- Info Keamanan -->
            <div class="bg-brand-card/80 backdrop-blur-md border border-brand-border p-4 rounded-2xl flex items-center gap-4 w-max shadow-lg mt-8">
                <div class="w-12 h-12 bg-green-500/20 rounded-full flex items-center justify-center text-green-400">
                    <i data-lucide="shield-check" class="w-6 h-6"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-400">Enkripsi Data 256-bit</p>
                    <p class="text-sm font-bold text-white">Sistem Login Aman</p>
                </div>
            </div>
        </div>

        <!-- Footer Kiri -->
        <div class="z-10 text-sm text-gray-500">
            &copy; 2026 MotoKredit. Hak Cipta Dilindungi.
        </div>
    </div>

    <!-- Sisi Kanan: Formulir Login -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 h-screen overflow-y-auto relative">
        <!-- Logo untuk Tampilan Mobile -->
        <div class="absolute top-8 left-8 lg:hidden">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight">
                <span class="text-white">Moto</span><span class="text-brand-accent">Kredit</span>
            </a>
        </div>

        <div class="w-full max-w-md">
            <!-- Header Form -->
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-white mb-2">Selamat Datang</h2>
                <p class="text-gray-400 text-sm">Silakan masukkan email dan password untuk melanjutkan.</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('login.process') }}">
                @csrf
                <!-- Field Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1.5">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="w-5 h-5 text-gray-500"></i>
                        </div>
                        <input type="email" name="email" placeholder="nama@email.com" required
                            class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent block w-full pl-11 p-3.5 transition-all outline-none">
                    </div>
                </div>

                <!-- Field Password -->
                <div>
                    <div class="flex justify-between items-center mb-1.5">
                        <label class="block text-sm font-medium text-gray-300">Kata Sandi</label>
                        <a href="#" class="text-sm text-brand-accent hover:text-white transition-colors">Lupa kata sandi?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="w-5 h-5 text-gray-500"></i>
                        </div>
                        <input type="password" name="katakunci" id="login-password" placeholder="••••••••" required
                            class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent block w-full pl-11 pr-11 p-3.5 transition-all outline-none">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center cursor-pointer text-gray-400 hover:text-white" onclick="togglePassword('login-password', 'login-eye-icon')">
                            <i data-lucide="eye" id="login-eye-icon" class="w-5 h-5"></i>
                        </div>
                    </div>
                </div>

                <!-- Opsi Remember Me -->
                <div class="flex items-center">
                    <input id="remember-me" type="checkbox" class="w-4 h-4 text-brand-primary bg-brand-input border-brand-border rounded focus:ring-brand-primary focus:ring-2 cursor-pointer">
                    <label for="remember-me" class="ml-2 text-sm font-medium text-gray-300 cursor-pointer">Ingat perangkat ini</label>
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="w-full text-white bg-brand-primary hover:bg-brand-primaryHover focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-xl text-sm px-5 py-3.5 text-center shadow-glow transition-all mt-4 flex justify-center items-center gap-2">
                    Masuk Sekarang <i data-lucide="log-in" class="w-4 h-4"></i>
                </button>
            </form>

            <!-- Navigasi ke Register -->
            <div class="mt-8 text-center text-sm text-gray-400">
                Belum memiliki akun MotoKredit? 
                <a href="{{ route('register') }}" class="text-brand-accent hover:text-white font-semibold transition-colors">Daftar Akun Baru</a>
            </div>
        </div>
    </div>

    <!-- Script Utama -->
    <script>
        // Memuat ikon Lucide
        lucide.createIcons();

        // Fungsi untuk toggle visibility password
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
            // Render ulang ikon yang berubah
            lucide.createIcons();
        }
    </script>
</body>
</html>