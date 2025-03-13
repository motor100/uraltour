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
        Schema::table('products_attributes', function (Blueprint $table) {
            $table->renameColumn('attribute_id', 'attribute_value_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products_attributes', function (Blueprint $table) {
            $table->renameColumn('attribute_value_id', 'attribute_id');
        });
    }
};
