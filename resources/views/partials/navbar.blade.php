<header class="site-header">
    <nav class="navbar">
        <a href="{{ route('home') }}" class="brand">
            {{ $siteName ?? 'KursusKu UIN' }}
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('home') }}#keunggulan">Keunggulan</a>
            <a href="{{ route('home') }}#katalog">Katalog</a>
            <a href="{{ route('home') }}#cara-daftar">Cara Daftar</a>
            <a href="{{ route('home') }}#media">Media</a>
            <a href="{{ route('home') }}#kontak">Kontak</a>
        </div>

        <select id="themeSwitcher" aria-label="Pilih tema">
            <option value="blue">Biru</option>
            <option value="purple">Ungu</option>
            <option value="green">Hijau</option>
            <option value="sunset">Sunset</option>
            <option value="dark">Dark</option>
        </select>
    </nav>
</header>