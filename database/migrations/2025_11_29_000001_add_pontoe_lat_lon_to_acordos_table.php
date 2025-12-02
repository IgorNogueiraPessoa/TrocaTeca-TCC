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
        Schema::table('acordos', function (Blueprint $table) {
            $table->decimal('pontoe_lat', 10, 7)->nullable()->after('local_encontro');
            $table->decimal('pontoe_lon', 10, 7)->nullable()->after('pontoe_lat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('acordos', function (Blueprint $table) {
            $table->dropColumn(['pontoe_lat', 'pontoe_lon']);
        });
    }
};
