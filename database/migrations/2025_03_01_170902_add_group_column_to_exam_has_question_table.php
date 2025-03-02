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
        Schema::table('exam_has_questions', function (Blueprint $table) {
            /**
             * add new group_id column to exam_has_question table
             * 
             */
            $table->unsignedBigInteger('group_id')->after('exam_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_has_questions', function (Blueprint $table) {
            /**
             * drop the group_id
             */
            $table->dropColumn('group_id');
        });
    }
};
