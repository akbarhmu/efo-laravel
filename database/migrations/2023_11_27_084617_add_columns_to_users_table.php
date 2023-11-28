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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['Laki-Laki', 'Perempuan'])->after('birth_date')->nullable();
            $table->text('address')->after('gender')->nullable();
            $table->string('tps_address')->after('address')->nullable();
            $table->string('tps_number')->after('tps_address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('address');
            $table->dropColumn('tps_address');
            $table->dropColumn('tps_number');
        });
    }
};
