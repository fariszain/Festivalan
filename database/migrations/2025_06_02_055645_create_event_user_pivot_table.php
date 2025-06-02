<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('event_user', function (Blueprint $table) {
            // Kolom id bisa ditambahkan jika Anda ingin setiap record pendaftaran punya ID unik,
            // tapi untuk pivot table sederhana, composite primary key dari foreignId sudah cukup.
            // $table->id(); 

            $table->foreignId('event_id')->constrained('events')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Anda bisa menambahkan kolom lain jika perlu, misalnya:
            // $table->string('registration_status')->default('confirmed'); // confirmed, waitlisted, cancelled
            // $table->timestamp('registration_time')->useCurrent();

            $table->primary(['event_id', 'user_id']); // Composite primary key
            $table->timestamps(); // Untuk created_at dan updated_at pendaftaran
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_user');
    }
};