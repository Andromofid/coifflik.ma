<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 20)->unique();
            $table->foreignId('client_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('coiffeur_profile_id')
                ->constrained('coiffeur_profiles')
                ->cascadeOnDelete();
            $table->foreignId('service_id')
                ->nullable()
                ->constrained('services')
                ->cascadeOnDelete();
            $table->date('booking_date');
            $table->time('booking_time');
            $table->string('address')
                ->nullable()
            ;
            $table->string('city', 60);
            $table->text('notes')->nullable();
            $table->enum('status', [
                'pending',
                'confirmed',
                'completed',
                'cancelled'
            ])->default('pending');
            $table->string('cancel_reason')->nullable();
            $table->decimal('total_price', 8, 2);
            $table->decimal('commission_amount', 8, 2)->default(0.00);
            $table->enum('payment_status', [
                'pending',
                'paid'
            ])->default('pending');
            $table->timestamps();

            // prevent double booking same coiffeur same slot
            $table->unique([
                'coiffeur_profile_id',
                'booking_date',
                'booking_time'
            ], 'unique_coiffeur_slot');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
