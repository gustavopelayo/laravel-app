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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique(); // "book-reviews", "travel", "my-cv"
            $table->text('body');
            $table->string('type');
            $table->timestamp('published_at')->nullable();
            $table->string('book_title')->nullable();
            $table->string('book_author')->nullable();
            $table->unsignedTinyInteger('rating')->nullable();
            $table->json('etc')->nullable();
            $table->timestamps();

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
