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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            // Kolom user_id sebagai foreign key ke tabel users
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->string('title');
            $table->text('description');
            $table->dateTime('schedule_start');
            $table->dateTime('schedule_end')->nullable();
            $table->string('location')->nullable();
            $table->string('event_category')->nullable();
            $table->string('image_path')->nullable(); // Path untuk poster event
            $table->string('status')->default('pending_approval'); // Status event
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};