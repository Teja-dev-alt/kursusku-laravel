<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnrollmentController extends Controller
{
    /**
     * Menampilkan formulir pendaftaran.
     */
    public function create()
    {
        $participants = Participant::orderBy('name')->get();

        $courses = Course::where('status', 'open')
            ->orderBy('name')
            ->get();

        return view('enrollments.form', compact(
            'participants',
            'courses'
        ));
    }

    /**
     * Menyimpan pendaftaran peserta.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'participant_id' => [
                    'required',
                    'integer',
                    'exists:participants,id',
                ],

                'course_id' => [
                    'required',
                    'integer',
                    Rule::exists('courses', 'id')
                        ->where('status', 'open'),

                    Rule::unique('enrollments', 'course_id')
                        ->where(function ($query) use ($request) {
                            return $query->where(
                                'participant_id',
                                $request->participant_id
                            );
                        }),
                ],
            ],
            [
                'participant_id.required' =>
                    'Silakan pilih peserta.',

                'participant_id.exists' =>
                    'Peserta yang dipilih tidak ditemukan.',

                'course_id.required' =>
                    'Silakan pilih kursus.',

                'course_id.exists' =>
                    'Kursus tidak ditemukan atau belum dibuka.',

                'course_id.unique' =>
                    'Peserta ini sudah terdaftar pada kursus tersebut.',
            ]
        );

        $data['status'] = 'registered';

        Enrollment::create($data);

        return redirect()
            ->route('enrollments.index')
            ->with('success', 'Pendaftaran kursus berhasil disimpan.');
    }

    /**
     * Menampilkan laporan seluruh pendaftaran.
     */
    public function index()
    {
        $enrollments = Enrollment::with([
            'participant',
            'course',
        ])
            ->latest()
            ->get();

        return view('enrollments.index', compact('enrollments'));
    }
}