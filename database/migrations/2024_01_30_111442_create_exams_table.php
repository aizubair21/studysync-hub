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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("g_id")->nullable();
            $table->bigInteger("m_id")->nullable();
            $table->string("exm_type")->nullable();
            $table->string('exm_name')->nullable();
            $table->string('exm_subject')->nullable();
            $table->string('exm_start')->nullable();
            $table->string('exm_date')->nullable();
            $table->string('exm_duration')->nullable();
            $table->string('exm_end')->nullable();
            $table->text('for_cr')->nullable(1);
            $table->text('for_wr')->nullable(0);
            $table->text('for_skp')->nullable(0);
            $table->bigInteger('antrance_id')->nullable();
            $table->string('status')->nullable();
            $table->string('is_public')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
