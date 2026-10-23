<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_material_progress', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('material_id')
                ->constrained('materials')
                ->cascadeOnDelete();

            /*
            |------------------------------------------------------------------
            | STATUS PROGRESS
            | belum_dibaca  → materi belum dibuka
            | sedang_dibaca → materi sedang dalam proses
            | selesai       → peserta sudah menyelesaikan materi
            |------------------------------------------------------------------
            */
            $table->enum('status', ['belum_dibaca', 'sedang_dibaca', 'selesai'])
                ->default('belum_dibaca');

            $table->timestamp('completed_at')->nullable();

            $table->timestamps();

            /*
            |------------------------------------------------------------------
            | UNIQUE: satu peserta satu record per materi
            |------------------------------------------------------------------
            */
            $table->unique(['user_id', 'material_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_material_progress');
    }
};
