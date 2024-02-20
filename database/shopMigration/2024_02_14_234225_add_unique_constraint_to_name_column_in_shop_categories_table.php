<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // Inside the new migration file
    public function up()
    {
        Schema::table('shop_categories', function (Blueprint $table) {
            $table->unique('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
