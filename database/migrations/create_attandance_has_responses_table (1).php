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
        Schema::create('attandance_has_responses', function (Blueprint $table) {
           
            $table->bigIncrements("id");
            $table->unsignedBigInteger("attandance");
            $table->unsignedBigInteger("question");
            $table->unsignedBigInteger("vendor");
            $table->text("answer")->nullable();
            $table->boolean("is_correct")->nullable();
            $table->integer("mark")->nullable();
            $table->string("type")->nullable()->default("multiple"); // mcq
            $table->text("file", "500")->nullable();
            $table->timestamps();

            //foreign key
            // $table->foreign("attandance")->references("id")->on("exam_has_attandance")->onDelete("cascade"); //constraints
            // $table->foreign("question")->references("id")->on("exam_has_question")->onDelete("cascade"); // constraints

            // $table->foreign("vendor")->references("id")->on("users")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attandance_has_responses');
    }
};
