<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('category');

            $table->text('description')->nullable();

            $table->date('date');

            $table->time('start_time');

            $table->time('end_time');

            $table->string('instructor')->nullable();

            $table->string('location')->nullable();

            $table->string('image')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};