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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();

            $table->unsignedBiginteger('diningtable_id');
            $table->unsignedBiginteger('users_id');

            $table->unsignedBiginteger('drinks_id');
            $table->unsignedBiginteger('dishes_id');

            $table->string('name');
            $table->integer('order_number')->unique();

            $table->foreign('drinks_id')->references('id')
                 ->on('drinks')->onDelete('cascade');
            $table->foreign('dishes_id')->nullable()->references('id')
            ->on('dishes')->onDelete('cascade');

            $table->foreign('diningtable_id')->references('id')
                 ->on('dining_tables')->onDelete('cascade');
            $table->foreign('users_id')->nullable()->references('id')
            ->on('users')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
