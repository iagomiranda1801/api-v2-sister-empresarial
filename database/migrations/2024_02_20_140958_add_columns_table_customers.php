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
        Schema::table('customers', function (Blueprint $table) {
            $table->string('name_whastapp')->nullable();
            $table->string('phone_whastapp')->nullable();
            $table->string('image_whastapp')->nullable();
            $table->text('msg_whastapp')->nullable();
            $table->boolean('is_active_whastapp')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['name_whastapp','phone_whastapp','image_whastapp','msg_whastapp','is_active_whastapp']);
        });
    }
};
