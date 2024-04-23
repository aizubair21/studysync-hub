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
        Schema::create('exam_has_attandances', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("exam_id")->nullable();
            $table->bigInteger("vendor")->nullable();
            $table->bigInteger("e_id")->nullable(); //examinee id
            $table->string("total_mark", "4")->nullable();
            $table->string("c", "3")->nullable(); //correct answer
            $table->string("w", "3")->nullable(); //wrong answer
            $table->string("s", "3")->nullable(); // skipp question
            $table->boolean("is_retake", "1")->nullable(); //if wanna retake  this exam, set true else false
            $table->timestamp("retake_on")->nullable(); //retake date. if exam been retaken
            $table->boolean("is_reviewed")->nullable(); //
            $table->timestamp("review_on")->nullable(); //
            $table->timestamp("is_open")->nullable(); //open for student to review the question
            $table->text("token_id")->nullable();
            $table->string("is_rejected", "300")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_has_attandances');
    }
};
