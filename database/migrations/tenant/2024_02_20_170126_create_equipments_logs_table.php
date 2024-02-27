<?php

use App\Models\Equipment;
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
        Schema::create('equipments_logs', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->json('response')->nullable();
            $table->string('type')->nullable();
            $table->bigInteger('log_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments_logs');
    }
};
