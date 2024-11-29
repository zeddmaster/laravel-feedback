<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTypesTable extends Migration
{
    public function up(): void
    {
        Schema::create('feedback_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('emails')->nullable();
            $table->string('subject')->nullable();
            $table->string('content')->nullable();
            $table->string('blade_template')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedback_types');
    }
}