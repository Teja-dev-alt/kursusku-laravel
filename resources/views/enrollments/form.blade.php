@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - KursusKu')

@section('content')

<style>
    .enrollment-wrapper {
        max-width: 850px;
        margin: 0 auto;
    }

    .enrollment-header {
        background: linear-gradient(
            120deg,
            var(--hero-start),
            var(--hero-end)
        );
        color: #fff;
        border-radius: 16px;
        padding: 32px;
        margin-bottom: 24px;
    }

    .enrollment-header h1,
    .enrollment-header p {
        color: #fff !important;
    }

    .enrollment-card {
        background: var(--surface);
        color: var(--text);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
    }

    .enrollment-card .card-body {
        padding: 32px;
    }

    .enrollment-card .form-label {
        color: var(--text);
        font-weight: 600;
    }

    .enrollment-card .form-control,
    .enrollment-card .form-select {
        background-color: var(--surface);
        color: var(--text);
        border-color: var(--border);
        padding: 12px 14px;
        border-radius: 9px;
    }

    .enrollment-card .form-control:focus,
    .enrollment-card .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem var(--soft-bg);
    }

    .enrollment-note {
        background: var(--soft-bg);
        color: var(--soft-text);
        border: 1px solid var(--border);
        border-radius: 10px;
        padding: 16px;
    }

    .enrollment-note p {
        color: var(--soft-text);
    }

    .enrollment-submit {
        background: var(--primary);
        border-color: var(--primary);
        color: #fff;
        border-radius: 9px;
        padding: 12px 24px;
        font-weight: 600;
    }

    .enrollment-submit:hover {
        background: var(--primary-hover);
        border-color: var(--primary-hover);
        color: #fff;
    }

    .enrollment-footer {
        color: var(--muted);
    }

    @media (max-width: 576px) {
        .enrollment-header {
            padding: 24px;
        }

        .enrollment-card .card-body {
            padding: 22px;
        }
    }
</style>

<div class="container py-5">

    <div class="enrollment-wrapper">

        <div class="enrollment-header">
            <div class="mb-2 small opacity-75">
                KURSUSKU / PENDAFTARAN
            </div>

            <h1 class="h3 fw-bold mb-2">
                Pendaftaran Kursus
            </h1>

            <p class="mb-0 opacity-75">
                Daftarkan peserta ke program kursus yang tersedia.
                Pastikan data yang dipilih sudah benar.
            </p>
        </div>

        <div class="card enrollment-card">
            <div class="card-body">

                <div class="mb-4">
                    <h2 class="h5 fw-bold">Informasi Pendaftaran</h2>

                    <p class="small mb-0" style="color: var(--muted)">
                        Pilih peserta dan kursus yang akan diikuti.
                    </p>
                </div>

                <form method="POST" action="{{ route('enrollments.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="participant_id" class="form-label">
                            Peserta
                        </label>

                        <select
                            name="participant_id"
                            id="participant_id"
                            class="form-select @error('participant_id') is-invalid @enderror"
                            required
                        >
                            <option value="">-- Pilih peserta --</option>

                            @foreach ($participants as $participant)
                                <option
                                    value="{{ $participant->id }}"
                                    @selected(old('participant_id') == $participant->id)
                                >
                                    {{ $participant->name }} — {{ $participant->email }}
                                </option>
                            @endforeach
                        </select>

                        @error('participant_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="course_id" class="form-label">
                            Kursus
                        </label>

                        <select
                            name="course_id"
                            id="course_id"
                            class="form-select @error('course_id') is-invalid @enderror"
                            required
                        >
                            <option value="">-- Pilih kursus --</option>

                            @foreach ($courses as $course)
                                <option
                                    value="{{ $course->id }}"
                                    @selected(old('course_id') == $course->id)
                                >
                                    {{ $course->code }} — {{ $course->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('course_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="enrollment-note mb-4">
                        <strong>Informasi Pendaftaran</strong>

                        <p class="small mb-0 mt-1">
                            Setiap peserta hanya dapat mendaftar satu kali
                            pada kursus yang sama. Pilih kursus yang masih
                            berstatus terbuka.
                        </p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            Terdapat kesalahan pada formulir.
                            Silakan periksa kembali data yang dimasukkan.
                        </div>
                    @endif

                    <div class="d-flex flex-wrap gap-2">

                        <button type="submit" class="btn enrollment-submit">
                            Simpan Pendaftaran
                        </button>

                        <a href="{{ route('enrollments.index') }}"
                           class="btn btn-outline-secondary px-4">
                            Lihat Laporan
                        </a>

                    </div>

                </form>

            </div>
        </div>

        <p class="text-center small enrollment-footer mt-4">
            KursusKu — Platform Pengelolaan Kursus
        </p>

    </div>

</div>

@endsection