<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            // slug per usare URL leggibili / identificativi
            $table->string('slug')->nullable()->after('name');

            // logo opzionale (se vuoi usarlo nel portfolio)
            $table->string('image')->nullable()->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('technologies', function (Blueprint $table) {
            $table->dropColumn(['slug', 'image']);
        });
    }
};
