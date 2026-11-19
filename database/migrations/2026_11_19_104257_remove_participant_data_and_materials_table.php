<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('sessions')
            ->whereIn(
                'user_id',
                DB::table('users')
                    ->select('id')
                    ->where('role', 'peserta')
            )
            ->delete();

        DB::table('users')
            ->where('role', 'peserta')
            ->delete();

        Schema::dropIfExists('materials');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category');
            $table->text('description')->nullable();
            $table->longText('content');
            $table->string('type')->default('materi');
            $table->string('file')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }
};
