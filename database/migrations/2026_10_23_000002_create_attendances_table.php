<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('activity_id')
                ->constrained('activities')
                ->cascadeOnDelete();

            /*
            |------------------------------------------------------------------
            | STATUS KEHADIRAN
            | hadir        → peserta hadir
            | tidak_hadir  → peserta tidak hadir tanpa keterangan
            | izin         → peserta tidak hadir dengan keterangan/izin
            |------------------------------------------------------------------
            */
            $table->enum('status', ['hadir', 'tidak_hadir', 'izin'])
                ->default('hadir');

            $table->text('note')->nullable();

            $table->timestamps();

            /*
            |------------------------------------------------------------------
            | UNIQUE: satu peserta hanya boleh punya satu record per kegiatan
            |------------------------------------------------------------------
            */
            $table->unique(['user_id', 'activity_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
