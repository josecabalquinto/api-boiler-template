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
            $table->foreignId('community_id')->constrained()->cascadeOnDelete();
            $table->string('property_number');
            $table->string('block')->nullable();
            $table->string('street_address');
            $table->enum('type', ['house', 'condo', 'townhouse', 'apartment'])->default('house');
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->decimal('floor_area_sqm', 8, 2)->nullable();
            $table->boolean('is_occupied')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['community_id', 'property_number']);
        });

        Schema::create('property_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('relationship', ['owner', 'tenant', 'family_member'])->default('owner');
            $table->date('move_in_date')->nullable();
            $table->date('move_out_date')->nullable();
            $table->boolean('is_primary_contact')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property_users');
        Schema::dropIfExists('properties');
    }
};
