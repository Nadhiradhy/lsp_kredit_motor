<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MotoKredit - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0b1120; }
        ::-webkit-scrollbar-thumb { background: #1e293b; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #334155; }
    </style>
</head>
<body class="bg-brand-dark text-white font-sans antialiased min-h-screen flex overflow-hidden">
    <div class="hidden lg:flex lg:w-1/2 relative flex-col justify-between p-12 bg-gradient-to-br from-brand-dark to-[#0f172a]">
        <!-- ... Bagian kiri sama seperti register ... -->
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
                        <h2 class="text-3xl font-bold text-white mb-2">Masuk Akun</h2>
                        <p class="text-gray-400 text-sm">Login untuk mengajukan kredit motor.</p>
                    </div>
                    @if ($errors->any())
                        <div class="mb-4 text-red-400 text-sm">
                            {{ $errors->first() }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Alamat Email</label>
                            <input type="email" name="email" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="contoh@email.com" value="{{ old('email') }}">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1.5">Kata Sandi</label>
                            <input type="password" name="katakunci" required class="w-full bg-brand-input border border-brand-border text-white text-sm rounded-xl focus:ring-2 focus:ring-brand-primary focus:border-transparent p-3.5 outline-none" placeholder="Masukkan kata sandi">
                        </div>
                        <button type="submit" class="w-full text-white bg-brand-primary hover:bg-brand-primaryHover focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-xl text-sm px-5 py-3.5 text-center shadow-glow transition-all mt-6">
                            Masuk
                        </button>
                    </form>
                    <div class="mt-8 text-center text-sm text-gray-400">
                        Belum punya akun?
                        <a href="{{ route('register.create_account') }}" class="text-brand-accent hover:text-white font-semibold transition-colors">Daftar di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        lucide.createIcons();
    </script>
</body>
</html>