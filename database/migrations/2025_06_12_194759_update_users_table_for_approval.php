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
        if (Schema::hasColumn('users', 'is_approved')) {
            $table->dropColumn('is_approved');
        }
        if (!Schema::hasColumn('users', 'status')) {
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        }
    });
}

public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->boolean('is_approved')->default(false);
        $table->dropColumn('status');
    });
}

};
