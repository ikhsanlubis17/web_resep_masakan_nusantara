<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->longText('ingredients');
            $table->longText('instructions');
            $table->integer('prep_time'); // in minutes
            $table->integer('cook_time'); // in minutes
            $table->integer('servings');
            $table->enum('difficulty', ['Mudah', 'Sedang', 'Sulit']);
            $table->string('image')->nullable();
            $table->string('tags')->nullable();
            $table->enum('status', ['draft', 'pending', 'approved', 'rejected'])->default('draft');
            $table->integer('views')->default(0);
            $table->decimal('rating', 2, 1)->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes(); // Ini akan menambahkan kolom deleted_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipes');
    }
};