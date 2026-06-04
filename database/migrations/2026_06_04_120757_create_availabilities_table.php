<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coiffeur_profile_id')
                ->constrained('coiffeur_profiles')
                ->cascadeOnDelete();
            $table->tinyInteger('day_of_week'); // 0=Sun, 6=Sat
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // prevent duplicate day entries per coiffeur
            $table->unique(['coiffeur_profile_id', 'day_of_week']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('availabilities');
    }
};
