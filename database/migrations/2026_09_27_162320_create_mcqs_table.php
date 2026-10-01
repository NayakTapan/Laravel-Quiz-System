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
        Schema::create('mcqs', function (Blueprint $table) {
            $table->id();

            $table->string('question',300)->nullable();
            $table->string('a',255)->nullable();
            $table->string('b',255)->nullable();
            $table->string('c',255)->nullable();
            $table->string('d',255)->nullable();
            $table->string('correct_ans',255)->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('quiz_id')->nullable();
            $table->integer('category_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mcqs');
    }
};
