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
    Schema::create('applications', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('job_id');
        $table->unsignedBigInteger('employee_id')->nullable();
        $table->string('status')->default('Applied'); // Track application status
        $table->timestamps();

        // Foreign key constraints
        $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
        $table->foreign('employee_id')->references('id')->on('users')->onDelete('cascade');
        $table->string('resume')->nullable(); 
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
