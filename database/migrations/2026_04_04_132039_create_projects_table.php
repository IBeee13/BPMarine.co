<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('year');
            $table->string('type')->nullable();
            $table->decimal('length', 8, 2)->nullable();
            $table->decimal('beam', 8, 2)->nullable();
            $table->integer('deck')->nullable();
            $table->integer('sail_count')->nullable();
            $table->integer('build_time')->nullable();
            $table->integer('guest_capacity')->nullable();
            $table->integer('cabin_count')->nullable();
            $table->boolean('ensuite')->default(true);
            $table->decimal('cruise_speed', 5, 2)->nullable();
            $table->decimal('max_speed', 5, 2)->nullable();
            $table->text('description')->nullable();
            $table->string('cover_image')->nullable();
            $table->json('gallery_images')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};