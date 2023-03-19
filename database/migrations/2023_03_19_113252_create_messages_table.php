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
        if(Schema::hasTable('messages'))
            return;
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->text('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasTable('messages'))
        Schema::dropIfExists('messages');
    }
};
