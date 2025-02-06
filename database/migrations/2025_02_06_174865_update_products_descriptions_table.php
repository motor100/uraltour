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
        Schema::table('products_descriptions', function (Blueprint $table) {
            $table->unsignedBigInteger('recommendation_id')->after('text_html')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_descriptions', function (Blueprint $table) {
            $table->dropColumn('recommendation_id');
        });
    }
};
