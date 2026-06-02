<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('image_path'); // Resmin dosya yolu
            $table->string('alt_text')->nullable(); // SEO ve erişilebilirlik için alt metin
            $table->boolean('is_active')->default(true); // Banner'ı silmeden gizlemek isterseniz diye
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
