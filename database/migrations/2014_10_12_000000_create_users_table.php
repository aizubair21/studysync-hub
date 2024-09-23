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
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("vendor")->nullable()->default('0');
            $table->string('name');
            $table->string("username")->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->string("nickname")->nullable("Your username");
            $table->integer('subscription')->nullable("101");
            $table->timestamp("subscription_till")->nullable("101");
            $table->integer("privilage")->default(1);
            $table->timestamp("banned_on")->nullable();
            $table->string("profile_photo_path")->nullable();
            $table->string("profile_photo_url")->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string("temp_access_token")->nullable();
            $table->timestamp("is_verified_user")->nullable();
            $table->rememberToken();
            $table->timestamps();

            //foreign
            // $table->foreign("vendor")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
