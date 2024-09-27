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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('property_name');
            $table->foreignId('category_id');
            $table->foreignId('location_id');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->string('currency');
            $table->integer('area');
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms');
            $table->foreignId('status_id');
            $table->date('date_listed');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
