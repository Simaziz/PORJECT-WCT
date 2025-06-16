<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'google2fa_secret')) {
                $table->string('google2fa_secret')->nullable();
            }

            if (!Schema::hasColumn('users', 'is_approved')) {
                $table->boolean('is_approved')->default(false);
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['google2fa_secret', 'is_approved']);
        });
    }
};
