<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackFieldsTable extends Migration
{
    public function up(): void
    {
        Schema::create('feedback_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feedback_type_id')
                ->constrained('feedback_types')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('title');
            $table->string('slug');
            $table->string('type')->default('string');
            $table->string('validation')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback_fields');
    }
}