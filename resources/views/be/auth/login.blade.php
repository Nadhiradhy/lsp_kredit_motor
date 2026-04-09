<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in to Portal</title>
    <!-- Memuat Tailwind CSS melalui CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Pengaturan warna kustom agar persis seperti gambar */
        :root {
            --primary-green: #24a159;
            --primary-green-hover: #1d8248;
            --light-green: #52b788;
            --text-dark: #1f2937;
            --text-muted: #6b7280;
            --link-gray: #8ba1b5;
        }
        
        .bg-brand-green { background-color: var(--primary-green); }
        .bg-brand-light-green { background-color: var(--light-green); }
        .text-brand-green { color: var(--primary-green); }
        .hover-bg-brand-green:hover { background-color: var(--primary-green-hover); }
        .text-link-gray { color: var(--link-gray); }
    </style>
</head>
<body class="bg-white font-sans antialiased text-gray-900 min-h-screen flex flex-col justify-center py-12 sm:px-6 lg:px-8">

    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        
        <!-- Logo -->
        <div class="flex justify-center">
            <div class="w-16 h-16 rounded-full bg-brand-light-green flex items-center justify-center shadow-sm">
                <!-- Ikon Infinity (Tak Terhingga) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 12c-2-2.67-4-4-6-4a4 4 0 1 0 0 8c2 0 4-1.33 6-4Zm0 0c2 2.67 4 4 6 4a4 4 0 1 0 0-8c-2 0-4 1.33-6 4Z"/>
                </svg>
            </div>
        </div>

        <!-- Judul Halaman -->
        <h2 class="mt-6 text-center text-3xl font-semibold text-[#2b3b4e]">
            Log in to Portal
        </h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 sm:px-10">
            <form class="space-y-6" action="#" method="POST">
                
                <!-- Input Email -->
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <div class="mt-1">
                        <input id="email" name="email" type="email" autocomplete="email" required placeholder="Email address"
                            class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm text-gray-700">
                    </div>
                </div>

                <!-- Input Password -->
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <div class="mt-1">
                        <input id="password" name="password" type="password" autocomplete="current-password" required placeholder="Password"
                            class="appearance-none block w-full px-4 py-3 border border-gray-200 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 sm:text-sm text-gray-700">
                    </div>
                </div>

                <!-- Opsi Remember me & Forgot Password -->
                <div class="flex items-center justify-between mt-2">
                    <div class="flex items-center">
                        <input id="remember-me" name="remember-me" type="checkbox"
                            class="h-4 w-4 text-green-600 focus:ring-green-500 border-gray-300 rounded cursor-pointer">
                        <label for="remember-me" class="ml-2 block text-sm text-[#7a8b9a] cursor-pointer">
                            Remember me
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="#" class="font-medium text-link-gray underline decoration-1 underline-offset-2 hover:text-gray-600 transition duration-150">
                            Forgot password?
                        </a>
                    </div>
                </div>

                <!-- Tombol Log In -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold text-white bg-brand-green hover-bg-brand-green focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition duration-150">
                        Log In
                    </button>
                </div>
            </form>

            <!-- Teks Sign up di bawah -->
            <div class="mt-8 text-center text-sm text-[#7a8b9a]">
                <p>
                    No Account? Sign up <a href="#" class="font-medium text-brand-green hover:underline hover:text-green-700 transition duration-150">here</a>.
                </p>
            </div>
            
        </div>
    </div>

</body>
</html>