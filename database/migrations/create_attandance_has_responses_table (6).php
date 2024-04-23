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
        Schema::create('group', function (Blueprint $table) {
            /**
             * database schemas
             */

            $table->bigIncrements("id");
            $table->string("name");
            $table->unsignedBigInteger('vendor')->nullable(); //creator of group.
            $table->string("info")->nullable(); //gorup details or descripton
            $table->string("status")->nullable()->default(1); //0 -> muted, 1 -> active, 4 -> schedule for delete
            $table->boolean("is_private")->nullable(); //
            $table->timestamp("banned_on")->nullable(); // data for banned
            $table->text("image_url")->nullable();
            $table->timestamps();

            /**
             * foreign key define
             */
            $table->foreign('vendor')->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group');
    }
};
