<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coiffeur_profile_id')
                ->constrained('coiffeur_profiles')
                ->cascadeOnDelete();
            $table->string('name');
            $table->enum('category', [
                'coupe',
                'coloration',
                'soin',
                'coiffage',
                'lissage',
                'autre'
            ]);
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->unsignedSmallInteger('duration_min');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
