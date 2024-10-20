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
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('follower_id');
            $table->morphs('following');
            $table->timestamp('followed_at')->useCurrent();
            $table->timestamps();

            $table->foreign('follower_id')->references('id')->on('users');

            // Indexes
            $table->index('follower_id'); // Index for getting the entities a user follows
            $table->index(['following_id', 'following_type']); // Index for retrieving followers of a specific entity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
