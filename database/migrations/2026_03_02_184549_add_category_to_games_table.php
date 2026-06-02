<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // Spor dalını tutacağımız sütun (Varsayılan olarak futbol yaptık)
            $table->enum('category', ['football', 'basketball', 'volleyball'])->default('football')->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
