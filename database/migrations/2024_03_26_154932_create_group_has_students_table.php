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
        Schema::create('group_has_students', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger('vendor');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');
            $table->text('status')->nullable(); //0, 9->active, 1->Processing, 2->under considering, 3->temp_banned, 4->schedule for banned forever
            $table->timestamp('is_moderator')->nullable();
            $table->timestamp('moderator_until')->nullable();
            $table->timestamp('banned_until')->nullable();
            $table->string('banned_as')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_has_students');
    }
};
