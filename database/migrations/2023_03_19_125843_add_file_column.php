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
        if(Schema::hasColumn('messages','file'))
            return;
        Schema::table('messages', function (Blueprint $table) {
            $table->string('file');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if(Schema::hasColumn('messages','file'))
            Schema::table('messages', function (Blueprint $table) {
                $table->dropColumn('file');
            });
    }
};
