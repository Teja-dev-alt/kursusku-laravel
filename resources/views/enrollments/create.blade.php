@extends('layouts.app')

@section('title', 'Pendaftaran Kursus - KursusKu')

@section('content')

<section class="py-5">
    <div class="container">

```
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h1 class="h3 mb-3">Pendaftaran Kursus</h1>

                    <p class="text-secondary">
                        Pilih kursus untuk memeriksa sisa kursi.
                    </p>

                    <form
                        method="POST"
                        action="{{ route('enrollments.preview') }}"
                    >
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">
                                Nama
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                required
                            >

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                required
                            >

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="course_id" class="form-label">
                                Pilih Kursus
                            </label>

                            <select
                                id="course_id"
                                name="course_id"
                                class="form-select @error('course_id') is-invalid @enderror"
                                required
                            >
                                <option value="">
                                    -- Pilih kursus --
                                </option>

                                @foreach ($courses as $id => $course)
                                    <option
                                        value="{{ $id }}"
                                        @selected(old('course_id') == $id)
                                    >
                                        {{ $course['name'] }}
                                    </option>
                                @endforeach
                            </select>

                            @error('course_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div
                            id="availability"
                            class="alert alert-secondary"
                            aria-live="polite"
                        >
                            Pilih kursus untuk melihat sisa kursi.
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                Periksa kembali data yang Anda masukkan.
                            </div>
                        @endif

                        <button
                            class="btn btn-success"
                            type="submit"
                        >
                            Kirim Pendaftaran
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
```

</section>
@endsection

@push('scripts')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const courseSelect = document.getElementById('course_id');
    const availabilityBox = document.getElementById('availability');

    if (!courseSelect || !availabilityBox) {
        console.error('Elemen availability tidak ditemukan.');
        return;
    }

    const availabilityUrl = @json(url('/courses'));

    async function loadAvailability(courseId) {
        if (!courseId) {
            availabilityBox.className = 'alert alert-secondary';
            availabilityBox.textContent =
                'Pilih kursus untuk melihat sisa kursi.';

            return;
        }

        availabilityBox.className = 'alert alert-secondary';
        availabilityBox.textContent = 'Memuat ketersediaan kursus...';

        try {
            const response = await fetch(
                `${availabilityUrl}/${encodeURIComponent(courseId)}/availability`,
                {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json'
                    }
                }
            );

            if (!response.ok) {
                throw new Error(`HTTP ${response.status}`);
            }

            const data = await response.json();

            if (
                typeof data.course === 'undefined' ||
                typeof data.remaining === 'undefined'
            ) {
                throw new Error('Format JSON availability tidak sesuai.');
            }

            availabilityBox.className = 'alert alert-success';
            availabilityBox.textContent =
                `${data.course} — Tersisa ${data.remaining} kursi.`;

        } catch (error) {
            console.error('Availability error:', error);

            availabilityBox.className = 'alert alert-danger';
            availabilityBox.textContent =
                'Gagal memuat ketersediaan kursus.';
        }
    }

    courseSelect.addEventListener('change', function () {
        loadAvailability(this.value);
    });

    // Memuat availability jika sebelumnya sudah ada pilihan kursus.
    if (courseSelect.value) {
        loadAvailability(courseSelect.value);
    }
});
</script>

@endpush
