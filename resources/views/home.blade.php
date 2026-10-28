<!DOCTYPE html>

<html lang="id" data-theme="blue">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $siteName }}</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>

{{-- NAVBAR --}}
<header class="site-header">
    <div class="navbar">

        <a href="{{ route('home') }}" class="brand">
            {{ $siteName }}
        </a>

        <nav class="nav-links">
            <a href="#beranda">Beranda</a>
            <a href="#keunggulan">Keunggulan</a>
            <a href="#katalog">Katalog</a>
            <a href="#cara-daftar">Cara Daftar</a>
            <a href="#media">Media</a>
            <a href="#kontak">Kontak</a>
        </nav>

        <select id="themeSwitcher" aria-label="Pilih tema warna">
            <option value="blue">Biru</option>
            <option value="purple">Ungu</option>
            <option value="green">Hijau</option>
            <option value="sunset">Sunset</option>
            <option value="dark">Dark</option>
        </select>

    </div>
</header>


<main>

    {{-- HERO --}}
    <section class="hero" id="beranda">
        <div class="container">
            <div class="hero-content">

                <div>
                    <span class="hero-badge">
                        Platform Pembelajaran Kursus
                    </span>

                    <h1>
                        Tingkatkan Skill dan Raih Masa Depanmu
                    </h1>

                    <p>
                        {{ $tagline }}
                        Temukan berbagai kursus menarik untuk meningkatkan
                        kemampuan dan pengetahuanmu.
                    </p>

                    <div class="hero-buttons">
                        <a href="#katalog" class="btn btn-primary">
                            Lihat Katalog
                        </a>

                        <a href="#cara-daftar" class="btn btn-secondary">
                            Cara Daftar
                        </a>
                    </div>
                </div>

                <div class="hero-info">

                    <div class="hero-info-card">
                        <strong>{{ count($courses) }}+</strong>
                        <span>Pilihan kursus untuk meningkatkan kemampuanmu.</span>
                    </div>

                    <div class="hero-info-card">
                        <strong>Skill</strong>
                        <span>Belajar materi yang relevan dan terstruktur.</span>
                    </div>

                    <div class="hero-info-card">
                        <strong>UIN</strong>
                        <span>KursusKu UIN, tempat belajar dan berkembang.</span>
                    </div>

                </div>

            </div>
        </div>
    </section>


    {{-- KEUNGGULAN --}}
    <section class="section" id="keunggulan">
        <div class="container">

            <div class="section-heading">
                <span class="section-label">KEUNGGULAN</span>

                <h2>Mengapa Memilih KursusKu?</h2>

                <p>
                    KursusKu membantu peserta mengembangkan kemampuan
                    melalui pilihan kursus yang terstruktur.
                </p>
            </div>

            <div class="feature-grid">

                <div class="feature-card">
                    <div class="feature-icon">📚</div>

                    <h3>Materi Terstruktur</h3>

                    <p>
                        Pelajari materi dari dasar hingga tingkat lanjutan
                        sesuai kebutuhan.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">💻</div>

                    <h3>Kursus Teknologi</h3>

                    <p>
                        Pilihan kursus seputar web, pemrograman,
                        database, dan desain antarmuka.
                    </p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🎯</div>

                    <h3>Belajar Terarah</h3>

                    <p>
                        Pilih kursus sesuai minat dan tingkatkan
                        kemampuan secara bertahap.
                    </p>
                </div>

            </div>

        </div>
    </section>


    {{-- KATALOG KURSUS --}}
    <section class="section section-light" id="katalog">
        <div class="container">

            <div class="section-heading">
                <span class="section-label">KATALOG</span>

                <h2>Pilihan Kursus</h2>

                <p>
                    Temukan kursus yang sesuai dengan kebutuhan
                    dan minat belajar kamu.
                </p>
            </div>

            <div class="table-wrapper">
                <table>

                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Kursus</th>
                            <th>Biaya</th>
                            <th>Kuota</th>
                            <th>Terdaftar</th>
                            <th>Sisa Kursi</th>
                            <th>Tanggal Mulai</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($courses as $course)

                            @php
                                $remaining = max(
                                    0,
                                    $course['quota'] - $course['registered']
                                );

                                $isFull = $remaining <= 0;
                            @endphp

                            <tr>
                                <td>{{ $course['code'] }}</td>

                                <td>{{ $course['name'] }}</td>

                                <td>
                                    Rp{{ number_format($course['fee'], 0, ',', '.') }}
                                </td>

                                <td>{{ $course['quota'] }}</td>

                                <td>{{ $course['registered'] }}</td>

                                <td>{{ $remaining }}</td>

                                <td>
                                    {{ \Carbon\Carbon::parse($course['start_date'])->translatedFormat('d M Y') }}
                                </td>

                                <td>
                                    @if ($isFull)
                                        <span class="status-badge badge-full">
                                            Penuh
                                        </span>
                                    @else
                                        <span class="status-badge badge-available">
                                            Tersedia
                                        </span>
                                    @endif
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="8">
                                    Belum ada kursus yang tersedia.
                                </td>
                            </tr>

                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </section>


    {{-- CARA DAFTAR --}}
    <section class="section" id="cara-daftar">
        <div class="container">

            <div class="section-heading">
                <span class="section-label">PENDAFTARAN</span>

                <h2>Cara Daftar Kursus</h2>

                <p>
                    Ikuti langkah berikut untuk memulai perjalanan
                    belajar kamu bersama KursusKu.
                </p>
            </div>

            <div class="steps">

                <div class="step">
                    <div class="step-number">1</div>

                    <h3>Pilih Kursus</h3>

                    <p>
                        Tentukan kursus yang sesuai dengan
                        minat dan kebutuhanmu.
                    </p>
                </div>

                <div class="step">
                    <div class="step-number">2</div>

                    <h3>Periksa Kuota</h3>

                    <p>
                        Pastikan kursus masih memiliki
                        kursi yang tersedia.
                    </p>
                </div>

                <div class="step">
                    <div class="step-number">3</div>

                    <h3>Isi Pendaftaran</h3>

                    <p>
                        Lengkapi data peserta melalui
                        halaman pendaftaran.
                    </p>
                </div>

                <div class="step">
                    <div class="step-number">4</div>

                    <h3>Mulai Belajar</h3>

                    <p>
                        Ikuti kegiatan pembelajaran sesuai
                        jadwal kursus yang dipilih.
                    </p>
                </div>

            </div>

        </div>
    </section>


    {{-- MEDIA PEMBELAJARAN --}}
    <section class="section section-light" id="media">
        <div class="container">

            <div class="section-heading">
                <span class="section-label">MEDIA</span>

                <h2>Media Pembelajaran</h2>

                <p>
                    Gunakan media pembelajaran untuk mendukung
                    proses belajar dan menambah wawasan.
                </p>
            </div>

            <div class="media-grid">

                <div class="media-card">
                    <h3>Galeri Pembelajaran</h3>

                    <img
                        src="{{ asset('assets/images/olahraga.jpg') }}"
                        alt="Gambar kegiatan pembelajaran"
                    >

                    <p>
                        Media visual sebagai pendukung
                        kegiatan pembelajaran.
                    </p>
                </div>

                <div class="media-card">
                    <h3>Video Perkenalan</h3>

                    <video controls>
                        <source
                            src="{{ asset('assets/video/intro-kursus.mp4') }}"
                            type="video/mp4"
                        >

                        Browser kamu tidak mendukung pemutar video.
                    </video>

                    <p>
                        Simak video perkenalan untuk mengenal
                        KursusKu lebih lanjut.
                    </p>
                </div>

            </div>

            <div class="documentation">
                <h3>Dokumentasi</h3>

                <p>
                    Pelajari dokumentasi PHP untuk menambah
                    pengetahuan pemrograman.
                </p>

                <a
                    href="https://www.php.net/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="documentation-link"
                >
                    Dokumentasi PHP
                </a>
            </div>

        </div>
    </section>


    {{-- KONTAK --}}
    <section class="section" id="kontak">
        <div class="container">

            <div class="contact-card">

                <div>
                    <span class="section-label">KONTAK</span>

                    <h2>Hubungi KursusKu</h2>

                    <p>
                        Punya pertanyaan mengenai kursus atau
                        pendaftaran? Silakan hubungi kami.
                    </p>
                </div>

                <div class="contact-info">

                    <div>
                        <span>📧</span>

                        <div>
                            <strong>Email</strong>

                            <p>
                                tejalesmanazuhridrf05@gmail.com
                            </p>
                        </div>
                    </div>

                    <div>
                        <span>📍</span>

                        <div>
                            <strong>Alamat</strong>

                            <p>Gadut</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>

</main>


{{-- FOOTER --}}
<footer>
    <div class="container">

        <div class="footer-content">

            <div>
                <strong>{{ $siteName }}</strong>

                <p>
                    {{ $tagline }}
                </p>
            </div>

            <small>
                &copy; {{ $year }} {{ $siteName }}.
                All rights reserved.
            </small>

        </div>

    </div>
</footer>


{{-- THEME SWITCHER --}}
<script>
    const themeSwitcher = document.getElementById('themeSwitcher');

    const savedTheme = localStorage.getItem('kursusku-theme') || 'blue';

    document.documentElement.setAttribute('data-theme', savedTheme);

    themeSwitcher.value = savedTheme;

    themeSwitcher.addEventListener('change', function () {
        const selectedTheme = this.value;

        document.documentElement.setAttribute(
            'data-theme',
            selectedTheme
        );

        localStorage.setItem('kursusku-theme', selectedTheme);
    });
</script>
```

</body>
</html>
