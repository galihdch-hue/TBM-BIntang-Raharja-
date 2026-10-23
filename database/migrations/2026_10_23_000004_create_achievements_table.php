<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->text('description')->nullable();

            $table->string('icon')->default('🏆');

            /*
            |------------------------------------------------------------------
            | TIPE ACHIEVEMENT
            | kehadiran → berbasis jumlah hadir di kegiatan
            | materi    → berbasis jumlah materi diselesaikan
            | poin      → berbasis total poin dikumpulkan
            | khusus    → diberikan manual oleh admin
            |------------------------------------------------------------------
            */
            $table->enum('type', ['kehadiran', 'materi', 'poin', 'khusus'])
                ->default('khusus');

            /*
            |------------------------------------------------------------------
            | REQUIREMENT_VALUE
            | Angka minimum yang harus dicapai untuk mendapatkan achievement.
            | Untuk type 'khusus', kolom ini diabaikan (nilai 0).
            |------------------------------------------------------------------
            */
            $table->unsignedInteger('requirement_value')->default(0);

            /*
            |------------------------------------------------------------------
            | REWARD POIN
            | Poin yang diberikan saat achievement berhasil diraih.
            |------------------------------------------------------------------
            */
            $table->unsignedInteger('reward_points')->default(0);

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
