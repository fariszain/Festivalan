<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\User; // Untuk mengambil user pertama sebagai contoh
use Illuminate\Support\Facades\DB; // Untuk truncate jika diperlukan

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil user pertama sebagai contoh pemilik event dummy
        // Pastikan user ini ada, atau buat seeder untuk user terlebih dahulu.
        // Atau Anda bisa hardcode user_id jika sudah tahu ID-nya.
        $user = User::first(); 
        if (!$user) {
            // Jika tidak ada user, kita bisa buat satu user admin dummy di sini
            // atau berikan pesan error agar user dibuat dulu.
            // Contoh membuat user admin jika tidak ada:
            $user = User::factory()->create([
                'name' => 'Admin Dummy',
                'username' => 'admindummy',
                'email' => 'admindummy@festivalan.com',
                'password' => bcrypt('password'), // ganti dengan password yang aman
                'role' => 'admin',
            ]);
            $this->command->info('User Admin Dummy dibuat dengan ID: ' . $user->id);
        }

        // Hapus data event lama agar tidak duplikat saat seeder dijalankan ulang (opsional)
        // DB::table('events')->truncate(); // Hati-hati jika sudah ada data penting

        $staticEventsData = [
            [
                'user_id' => $user->id, // Gunakan ID user yang ada
                'title' => 'PDH DAY',
                'description' => "<p>PDH DAY adalah inisiatif mingguan yang bertujuan untuk memperkuat identitas dan kebersamaan mahasiswa Festivalan. Setiap Senin, seluruh civitas akademika diajak untuk mengenakan Pakaian Dinas Harian (PDH) sebagai simbol profesionalisme dan semangat belajar. Acara ini juga sering diisi dengan kegiatan-kegiatan kecil seperti diskusi tematik atau sesi sharing inspiratif di berbagai sudut kampus.</p>",
                'schedule_start' => now()->addDays(10)->setTime(9, 0, 0), // Contoh: 10 hari dari sekarang jam 9 pagi
                'schedule_end' => null,
                'location' => 'Lingkungan Kampus Festivalan',
                'event_category' => 'Kegiatan Kampus',
                'image_path' => 'pdhday.jpg', // Nama file gambar di public/storage/event_posters
                'status' => 'approved', // Langsung approved untuk contoh
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'title' => 'Buka Puasa Bersama',
                'description' => "<p>Dalam rangka menyambut bulan suci Ramadhan dan mempererat tali silaturahmi antar mahasiswa, UKM Kerohanian Islam Festivalan akan mengadakan acara Buka Puasa Bersama. Acara ini akan diisi dengan tausiyah, pembacaan ayat suci Al-Quran, doa bersama, dan tentunya hidangan berbuka puasa. Mari kita manfaatkan momen ini untuk meningkatkan keimanan dan kebersamaan.</p>",
                'schedule_start' => now()->addMonths(1)->setTime(17, 0, 0), // Contoh: Bulan depan jam 5 sore
                'schedule_end' => now()->addMonths(1)->setTime(19, 0, 0),
                'location' => 'Aula Utama Kampus Festivalan',
                'event_category' => 'Acara Sosial & Keagamaan',
                'image_path' => 'bukber.jpg',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $user->id,
                'title' => 'Peer Teaching : Belajar Bareng',
                'description' => "<p>Kesulitan memahami mata kuliah tertentu? Atau ingin memperdalam pemahamanmu? Program Peer Teaching hadir sebagai solusi! Di sini, kamu bisa belajar dari teman sebaya yang sudah lebih menguasai materi dalam suasana yang santai dan interaktif. Segera daftarkan dirimu sebagai peserta atau bahkan sebagai tutor jika kamu merasa mampu!</p>",
                'schedule_start' => now()->addWeeks(2)->setTime(10, 0, 0), // Contoh: 2 minggu dari sekarang jam 10 pagi
                'schedule_end' => now()->addWeeks(2)->addHours(2)->setTime(12, 0, 0),
                'location' => 'Ruang Diskusi Fakultas & Perpustakaan Pusat',
                'event_category' => 'Akademik & Workshop',
                'image_path' => 'peerteaching.jpg',
                'status' => 'pending_approval', // Contoh satu yang pending
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        foreach ($staticEventsData as $eventData) {
            // Cek apakah event dengan judul yang sama sudah ada untuk menghindari duplikasi sederhana
            // Untuk sistem produksi, Anda mungkin perlu cara cek duplikasi yang lebih baik
            Event::updateOrCreate(['title' => $eventData['title']], $eventData);
        }

        $this->command->info('EventSeeder berhasil dijalankan!');
    }
}