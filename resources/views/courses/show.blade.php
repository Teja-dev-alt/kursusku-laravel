@extends('layouts.app')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Detail Kursus</h1>
            <p>{{ $course->code }} - {{ $course->name }}</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                Kembali
            </a>

            <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary">
                Edit
            </a>
        </div>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">

            <p><strong>Kode:</strong> {{ $course->code }}</p>

            <p><strong>Nama:</strong> {{ $course->name }}</p>

            <p><strong>Deskripsi:</strong> {{ $course->description ?: '-' }}</p>

            <p><strong>Biaya:</strong>
                Rp {{ number_format($course->fee, 0, ',', '.') }}
            </p>

            <p><strong>Kuota:</strong> {{ $course->quota }} peserta</p>

            <p><strong>Tanggal Mulai:</strong>
                {{ $course->start_date?->format('d-m-Y') }}
            </p>

            <p><strong>Status:</strong> {{ ucfirst($course->status) }}</p>

        </div>
    </div>

</div>
@endsection