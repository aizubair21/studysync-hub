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
        Schema::create('question_has_option', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger("question");
            $table->string("type"); //text, image
            $table->text("option");
            $table->boolean("is_correct");
            $table->timestamps();

            //foreign
            // $table->foreign("question")->references("id")->on("exam_has_question")->onDelete("cascade"); //when question delete, related option has been deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_has_option ');
    }
};
