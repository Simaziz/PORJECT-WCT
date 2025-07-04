<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('job_applications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('job_id');
        $table->string('applicant_name');
        $table->string('applicant_email');
        $table->string('resume')->nullable(); // path to resume file if uploaded
        $table->text('cover_letter')->nullable();
        $table->timestamps();

        $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
