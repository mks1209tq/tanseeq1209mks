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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_code', 20);
            $table->string('full_name', 255)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamp('hire_date')->nullable();
            $table->timestamp('termination_date')->nullable();
            $table->string('salutation', 10)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('employee_status', 50)->nullable();
            $table->string('company', 255);
            $table->string('gender', 10)->nullable();
            $table->string('sponsor', 255)->nullable();
            $table->string('nationality', 100)->nullable();
            $table->string('category', 50)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('physically_challenged', 3)->nullable();
            $table->string('division', 50)->nullable();
            $table->string('designation', 100)->nullable();
            $table->string('company_transportation', 3)->nullable();
            $table->string('medical_insurance', 50)->nullable();
            $table->string('salary_transfer_letter', 50)->nullable();
            $table->string('cost_head', 100)->nullable();
            $table->string('entity', 255)->nullable();
            $table->string('line_manager_1', 255)->nullable();
            $table->string('line_manager_2', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
