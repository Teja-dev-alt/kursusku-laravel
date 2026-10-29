import './bootstrap';
import 'bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

// Fungsi untuk mengambil dan menampilkan sisa kursi
function loadAvailability(id) {
    const box = $('#availability');

    if (!id) {
        box.removeClass('alert-success alert-danger')
            .addClass('alert-secondary')
            .text('Pilih kursus untuk melihat sisa kursi.');

        return;
    }

    box.removeClass('alert-success alert-danger')
        .addClass('alert-secondary')
        .text('Memuat ketersediaan kursus...');

    $.ajax({
        url: `/courses/${encodeURIComponent(id)}/availability`,
        type: 'GET',
        dataType: 'json',

        success: function (data) {
            box.removeClass('alert-secondary alert-danger')
                .addClass('alert-success')
                .text(
                    `${data.remaining} kursi tersisa untuk ${data.course}.`
                );
        },

        error: function (xhr) {
            console.error(
                'Ajax availability gagal:',
                xhr.status,
                xhr.responseText
            );

            box.removeClass('alert-secondary alert-success')
                .addClass('alert-danger')
                .text('Gagal memuat ketersediaan kursus.');
        }
    });
}

// Jalankan ketika halaman siap
$(function () {
    // Ketika pengguna memilih kursus
    $('#course_id').on('change', function () {
        loadAvailability(this.value);
    });

    // Periksa pilihan kursus jika sudah terisi
    const selectedCourse = $('#course_id').val();

    if (selectedCourse) {
        loadAvailability(selectedCourse);
    }

    console.log('KursusKu Ajax aktif:', typeof window.jQuery);
});
$(document).on('change', '#course_id', function () {
    const id = this.value;

    if (!id) {
        $('#availability')
            .removeClass('alert-success alert-danger')
            .addClass('alert-secondary')
            .text('Pilih kursus untuk melihat sisa kursi.');

        return;
    }

    $('#availability')
        .removeClass('alert-success alert-danger')
        .addClass('alert-secondary')
        .text('Memuat ketersediaan...');

    $.ajax({
        url: `/courses/${id}/availability`,
        method: 'GET',
        dataType: 'json',

        success(data) {
            $('#availability')
                .removeClass('alert-secondary alert-danger')
                .addClass('alert-success')
                .text(`${data.course} — Tersisa ${data.remaining} kursi.`);
        },

        error() {
            $('#availability')
                .removeClass('alert-secondary alert-success')
                .addClass('alert-danger')
                .text('Gagal memuat ketersediaan kursus.');
        }
    });
});