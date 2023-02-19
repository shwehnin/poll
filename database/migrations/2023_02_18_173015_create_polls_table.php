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
        Schema::create('polls', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('created_by')->constrained('users');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->enum('status', array_column(\App\Enums\PollStatus::cases(), 'value'))->default(\App\Enums\PollStatus::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polls');
    }
};
