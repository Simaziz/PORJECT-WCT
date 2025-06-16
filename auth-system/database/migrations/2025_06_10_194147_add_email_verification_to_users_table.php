<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // In the migration file
// In your migration file (e.g., 2025_06_10_194147_add_email_verification_to_users_table.php)
public function up()
{
    if (!Schema::hasColumn('users', 'email_verified_at')) {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('email_verified_at')->nullable();
        });
    }
}

public function down()
{
    if (Schema::hasColumn('users', 'email_verified_at')) {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
        });
    }
}
};
