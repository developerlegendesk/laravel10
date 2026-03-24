<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('My App');
            $table->string('app_email')->default('test@gmail.com');
            $table->string('app_logo')->nullable();
            $table->string('app_favicon')->nullable();
            $table->string('app_phone')->nullable();

            // Email settings
            $table->string('email_from')->nullable();
            $table->string('email_host')->nullable();
            $table->string('email_port')->nullable();
            $table->string('email_username')->nullable();
            $table->string('email_password')->nullable();
            $table->string('email_encryption')->nullable();

            // Social Media Links
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
