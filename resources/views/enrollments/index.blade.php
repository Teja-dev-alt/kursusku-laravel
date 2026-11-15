@extends('layouts.app')

@section('title', 'Laporan Pendaftaran - KursusKu')

@section('content')

<style>
    .report-header {
        background: linear-gradient(
            120deg,
            var(--hero-start),
            var(--hero-end)
        );
        color: #fff;
        padding: 32px;
        border-radius: 16px;
        margin-bottom: 25px;
    }

    .report-header h1,
    .report-header p {
        color: #fff !important;
    }

    .report-card {
        background: var(--surface);
        color: var(--text);
        border: 1px solid var(--border);
        border-radius: 15px;
        box-shadow: 0 5px 22px rgba(0, 0, 0, 0.05);
    }

    .report-stat {
        background: var(--soft-bg);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 20px;
    }

    .report-stat .number {
        font-size: 30px;
        font-weight: 700;
        color: var(--primary);
    }

    .report-stat .label {
        color: var(--muted);
        font-size: 13px;
    }

    .report-table {
        color: var(--text);
        margin-bottom: 0;
    }

    .report-table thead th {
        background: var(--table-head);
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        padding: 16px;
        white-space: nowrap;
        border-color: var(--table-head);
    }

    .report-table tbody td {
        background: var(--surface);
        color: var(--text);
        border-color: var(--border);
        padding: 16px;
        vertical-align: middle;
    }

    .report-table tbody tr:hover td {
        background: var(--section-bg);
    }

    .status-badge {
        display: inline-block;
        background: var(--soft-bg);
        color: var(--soft-text);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
    }

    .empty-state {
        padding: 50px 20px;
        text-align: center;
        color: var(--muted);
    }

    .empty-state .icon {
        font-size: 44px;
        margin-bottom: 15px;
    }

    .empty-state p {
        color: var(--muted);
    }

    @media (max-width: 576px) {
        .report-header {
            padding: 24px;
        }
    }
</style>

<div class="container py-5">

    <div class="report-header">
        <div class="small opacity-75 mb-2">
            KURSUSKU / LAPORAN
        </div>

        <h1 class="h3 fw-bold mb-2">
            Laporan Pendaftaran Kursus
        </h1>

        <p class="mb-0 opacity-75">
            Pantau data peserta yang telah terdaftar pada program kursus.
        </p>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="report-stat">
                <div class="label">
                    Total Pendaftaran
                </div>

                <div class="number">
                    {{ $enrollments->count() }}
                </div>

                <div class="label">
                    Data pendaftaran tercatat
                </div>
            </div>
        </div>
    </div>

    <div class="card report-card">
        <div class="card-body p-4">

            <div class="d-flex justify-content-between
                        align-items-center flex-wrap gap-3 mb-4">

                <div>
                    <h2 class="h5 fw-bold mb-1">
                        Data Enrollment
                    </h2>

                    <p class="small mb-0" style="color: var(--muted)">
                        Informasi peserta dan kursus yang diikuti.
                    </p>
                </div>

                <a href="{{ route('enrollments.create') }}"
                   class="btn btn-primary">
                    + Tambah Pendaftaran
                </a>
            </div>

            @if ($enrollments->isEmpty())

                <div class="empty-state">
                    <div class="icon">📋</div>

                    <h3 class="h5 fw-bold">
                        Belum Ada Pendaftaran
                    </h3>

                    <p>
                        Belum terdapat peserta yang terdaftar pada kursus.
                    </p>

                    <a href="{{ route('enrollments.create') }}"
                       class="btn btn-primary mt-2">
                        Buat Pendaftaran Pertama
                    </a>
                </div>

            @else

                <div class="table-responsive">
                    <table class="table report-table align-middle">

                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Peserta</th>
                                <th>Email</th>
                                <th>Kode Kursus</th>
                                <th>Nama Kursus</th>
                                <th>Tanggal Mulai</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($enrollments as $index => $enrollment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td class="fw-semibold">
                                        {{ $enrollment->participant->name }}
                                    </td>

                                    <td>
                                        {{ $enrollment->participant->email }}
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $enrollment->course->code }}
                                    </td>

                                    <td>
                                        {{ $enrollment->course->name }}
                                    </td>

                                    <td>
                                        {{ $enrollment->course->start_date?->format('d-m-Y') ?? '-' }}
                                    </td>

                                    <td>
                                        <span class="status-badge">
                                            {{ ucfirst($enrollment->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            @endif

        </div>
    </div>

</div>

@endsection