<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        // Add 'role' only if it does not exist
        if (!Schema::hasColumn('users', 'role')) {
            $table->string('role')->default('user');
        }
        // Do NOT add status because it already exists
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        if (Schema::hasColumn('users', 'role')) {
            $table->dropColumn('role');
        }
        // Do NOT drop status because it existed before
    });
}

};
