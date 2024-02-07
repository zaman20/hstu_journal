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
        Schema::create('papers', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('article_type');
            $table->string('files');
            $table->string('classification');
            $table->string('reviewers')->nullable();
            $table->string('language');
            $table->string('author_comment')->nullable();
            $table->string('editor_comment')->nullable();
            $table->string('reviewer_comment')->nullable();
            $table->string('title');
            $table->string('abstract');
            $table->string('keyword');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('papers');
    }
};
