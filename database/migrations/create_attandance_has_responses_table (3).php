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
        Schema::create('exam_has_question', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('exam_id');
            $table->string('vendor');
            $table->string('type'); //textOnly, written, voice, attach, withImage, withVideo, imageOnly, videoOnly
            $table->string('answer_type'); //mcq, write, attached
            $table->text('question');
            $table->boolean('has_option')->default(false);
            $table->boolean('has_file')->default(false);
            $table->string('file')->nullable();
            $table->boolean('is_info_and_tags_show')->default(false);
            $table->text('tags')->nullable();
            $table->text('info')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            // Foreign key
            // $table->foreign('exam_id')->references('id')->on('group_has_exam')->onDelete('cascade');
            // $table->foreign('vendor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_has_question');
    }
};
