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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->foreignId('question_id')
                  ->constrained() //questionsテーブルのidカラムを参照
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->boolean('correct_answer'); //trueまたはfalseの値を持つことができる
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
