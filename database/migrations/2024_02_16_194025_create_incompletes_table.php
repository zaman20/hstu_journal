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
        Schema::create('incompletes', function (Blueprint $table) {
            $table->id();
            $table->string('author')->nullable();
            $table->string('type')->nullable();
            $table->string('files')->nullable();
            $table->string('classification')->nullable();
            $table->string('reviewers')->nullable();
            $table->string('language')->nullable();
            $table->string('author_comment')->nullable();
            $table->string('title')->nullable();
            $table->string('abstract')->nullable();
            $table->string('keyword')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incompletes');
    }
};
