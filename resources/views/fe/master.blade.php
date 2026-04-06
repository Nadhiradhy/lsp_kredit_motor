<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
@include('fe.part.head')
<body class="bg-slate-950 text-slate-200 font-sans antialiased selection:bg-blue-500 selection:text-white flex flex-col min-h-screen">

    <!-- NAVBAR -->
    @include('fe.part.header')

    <!-- MAIN CONTENT AREA -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <!-- FOOTER -->
    @include('fe.part.footer')

    <!-- JAVASCRIPT LOGIC -->
    <script>
        // --- DATA MOCKUP (DATABASE SIMULATION) ---
        const mockMotors = [
            { id: 1, nama_motor: 'Yamaha NMAX 155', jenis: 'Skuter', harga_cash: 31500000, stok: 12, image: 'https://images.unsplash.com/photo-1558981403-c5f9899a289f?auto=format&fit=crop&w=500&q=80' },
            { id: 2, nama_motor: 'Honda CBR250RR', jenis: 'Sport Bike', harga_cash: 62000000, stok: 5, image: 'https://images.unsplash.com/photo-1568772585407-9361f9bfce87?auto=format&fit=crop&w=500&q=80' },
            { id: 3, nama_motor: 'Kawasaki KLX 150', jenis: 'Dirt Bike', harga_cash: 32000000, stok: 8, image: 'https://images.unsplash.com/photo-1606512686858-db809f6974d6?auto=format&fit=crop&w=500&q=80' },
            { id: 4, nama_motor: 'Vespa Sprint 150', jenis: 'Retro', harga_cash: 53000000, stok: 3, image: 'https://images.unsplash.com/photo-1590483884841-3e4b77c591bd?auto=format&fit=crop&w=500&q=80' }
        ];

        const mockPengajuan = [
            document.getElementById('nav-guest-actions').classList.add('hidden');
        <!-- JAVASCRIPT LOGIC -->
    
            document.getElementById('nav-user-actions').classList.remove('hidden');
            document.getElementById('user-role-badge').innerText = role;

        }

        function logout() {
            currentRole = null;
            localStorage.removeItem('user_role');
            
            document.getElementById('nav-guest-actions').classList.remove('hidden');
            document.getElementById('nav-user-actions').classList.add('hidden');

            window.location.href = '{{ route("home") }}';
        }

        function renderDashboard() {
            const container = document.getElementById('dashboard-content');
            if(!container) return;
            
            if(currentRole === 'pelanggan') {
                container.innerHTML = `... konten dashboard pelanggan ...`;
            } 
            else if(currentRole === 'admin') {
                container.innerHTML = `... konten dashboard admin ...`;
            }
            // ... role lainnya
        }

        // --- INITIALIZATION ---
        document.addEventListener('DOMContentLoaded', function() {
            // Cek role yang tersimpan
            const savedRole = localStorage.getItem('user_role');
            if(savedRole) {
                currentRole = savedRole;
                document.getElementById('nav-guest-actions').classList.add('hidden');
                document.getElementById('nav-user-actions').classList.remove('hidden');
                document.getElementById('user-role-badge').innerText = savedRole;
            }
            
            // Render katalog hanya jika di halaman katalog
            if(window.location.pathname.includes('katalog')) {
                renderKatalog();
            }
        });
    </script>
</body>
</html>