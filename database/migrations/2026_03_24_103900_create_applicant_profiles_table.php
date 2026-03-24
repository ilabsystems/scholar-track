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
        Schema::create('applicant_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('field_of_study')->nullable();
            $table->decimal('gpa', 3, 2)->nullable();
            $table->string('education_level')->nullable();
            $table->string('employment_status')->nullable();
            $table->decimal('household_income', 12, 2)->nullable();
            $table->text('essay_response')->nullable();
            $table->json('documents')->nullable();
            $table->string('application_status')->default('pending');
            $table->date('submitted_at')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant_profiles');
    }
};
