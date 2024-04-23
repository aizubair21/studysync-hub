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
        Schema::create('group_has_exams', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->bigInteger('group');
            $table->bigInteger('vendor');
            $table->text('exm_type');
            $table->string('exm_type_of');
            $table->text('exm_function');
            $table->string('exm_name');
            $table->text('exm_subject');
            $table->text('exm_key_note')->nullable();
            $table->timestamp('is_retake')->nullable();
            $table->boolean('isLinkOpen')->nullable()->default(false);
            $table->dateTime('link_open_at')->nullable();
            $table->dateTime('link_close_at')->nullable();
            $table->dateTime('can_attend_until')->nullable();
            $table->boolean('isResultPublished')->nullable()->default(false);
            $table->dateTime('result_published_on')->nullable();
            $table->dateTime('exm_date');
            $table->integer('exm_duration')->nullable();
            $table->float('for_cr')->nullable();
            $table->float('for_wr')->nullable();
            $table->float('for_skp')->nullable();
            $table->float('pass_mark')->nullable();
            $table->string('status')->nullable();
            $table->integer('total_mark')->nullable();
            $table->integer('total_question')->nullable();
            $table->boolean('Is_prevent_change_option')->nullable()->default(true);
            $table->boolean('ransomized_question')->nullable()->default(true);
            $table->boolean('mouse_track')->nullable()->default(true);
            $table->boolean('window_track')->nullable()->default(true);
            $table->boolean('have_moderate')->nullable()->default(true);
            $table->boolean('have_moderable_question')->nullable()->default(false);
            $table->boolean('is_moderated')->nullable()->default(false);
            $table->string('attend_endpoint')->nullable();
            // $table->timestamps();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_has_exams');
    }
};
