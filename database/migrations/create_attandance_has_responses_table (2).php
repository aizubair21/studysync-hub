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
        Schema::create('group_has_student', function (Blueprint $table) {
            /**
             * database schemas
             */
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

            // Foreign keys references to other table
            // $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            // $table->foreign('vendor')->references("id")->on('users')->onDelete("cascade");

            // $table->foreign("vendor")->references("id")->on("users")->onDelete("cascade");
            // A user can be in multiple groups, but a group can only have one moderator per time.
            // So we create an unique index for `vendor` and `group_id`. This will prevent duplicate entries of the same user in the

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_has_student');
    }
};
