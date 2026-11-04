<nav class="navbar navbar-expand-lg navbar-dark kursusku-navbar">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            <span class="brand-symbol">K</span>
            KursusKu UIN
        </a>

        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#mainNavbar"
            aria-controls="mainNavbar"
            aria-expanded="false"
            aria-label="Buka navigasi"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        Beranda
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#katalog">
                        Katalog
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}#cara-daftar">
                        Cara Daftar
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('enrollments.create') }}">
                        Pendaftaran
                    </a>
                </li>

                <li class="nav-item theme-item">
                    <label for="themeSwitcher" class="theme-label">
                        🎨 Tema
                    </label>

                    <select
                        id="themeSwitcher"
                        class="form-select theme-switcher"
                        aria-label="Pilih tema warna"
                    >
                        <option value="blue">🔵 Biru</option>
                        <option value="green">🟢 Hijau</option>
                        <option value="purple">🟣 Ungu</option>
                        <option value="orange">🟠 Oranye</option>
                        <option value="dark">🌙 Gelap</option>
                    </select>
                </li>

            </ul>

        </div>
    </div>
</nav>


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const themeSwitcher = document.getElementById('themeSwitcher');

    const availableThemes = [
        'blue',
        'green',
        'purple',
        'orange',
        'dark'
    ];

    function applyTheme(theme) {

        if (!availableThemes.includes(theme)) {
            theme = 'blue';
        }

        document.documentElement.setAttribute('data-theme', theme);

        localStorage.setItem('kursusku-theme', theme);

        if (themeSwitcher) {
            themeSwitcher.value = theme;
        }
    }

    const savedTheme = localStorage.getItem('kursusku-theme') || 'blue';

    applyTheme(savedTheme);

    if (themeSwitcher) {
        themeSwitcher.addEventListener('change', function () {
            applyTheme(this.value);
        });
    }

});
</script>
@endpush