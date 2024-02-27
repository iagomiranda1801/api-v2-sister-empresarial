<?php

use App\Models\School;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(School::class)->constrained();
            $table->string('enrollment_number')->nullable();
            $table->string('equipament_id')->nullable();
            $table->string('name');
            $table->text('template')->nullable();
            $table->text('qrcode')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('responsible_id')->nullable();
            $table->string('responsible_name')->nullable();
            $table->date('responsible_birthdate')->nullable();
            $table->string('responsible_cpf')->nullable();
            $table->string('responsible_email')->nullable();
            $table->string('responsible_contact')->nullable();
            $table->boolean('responsible_whastapp')->default(0);
            $table->json('response_toaqui')->nullable();
            $table->timestamp('sync')->nullable();
            $table->timestamp('last_updated')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
