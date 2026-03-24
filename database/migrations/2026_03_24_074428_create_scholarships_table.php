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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('amount', 10, 2);
            $table->text('criteria');
            $table->date('deadline');
            $table->enum('award_type', ['one-time', 'yearly', 'monthly'])->default('one-time');
            $table->enum('coverage', ['full-tuition', 'partial', 'books', 'other'])->default('partial');
            $table->decimal('gpa_requirement', 2, 1)->nullable();
            $table->string('demographics')->nullable();
            $table->string('field_of_study')->nullable();
            $table->enum('status', ['active', 'inactive', 'draft', 'archived'])->default('draft');
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
