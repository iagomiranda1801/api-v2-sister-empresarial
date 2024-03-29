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
        Schema::create('equipments_commands', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Equipment::class,'equipament_id')->constrained();
            $table->json('command');
            $table->json('response')->nullable();
            $table->timestamp('exec');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments_commands');
    }
};
