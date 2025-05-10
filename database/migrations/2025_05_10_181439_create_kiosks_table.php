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
        Schema::create('kiosks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('user_id', 36)->nullable();
            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->longText('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->decimal('is_verifed', 65, 30)->nullable();
            $table->string('verifed_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kiosks');
    }
};
