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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('status')->default('Active');
            $table->string('name');
            $table->string('employee_id');
            $table->string('division');
            $table->string('department');
            $table->string('designation');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('site');
            $table->string('access_type');
            $table->date('date_of_request');
            $table->text('business_justification');
            $table->string('attachment');
            $table->string('validator');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
