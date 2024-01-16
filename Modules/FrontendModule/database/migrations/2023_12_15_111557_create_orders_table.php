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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->json('product_ids')->nullable();
            $table->json('images')->nullable();
            $table->integer('trash_weight')->nullable();
            $table->string('customer_note_1')->nullable();
            $table->string('customer_note_2')->nullable();
            $table->string('agent_note')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->foreignId('location_id')->nullable();
            $table->foreignId('agent_user_id')->nullable();
            $table->date('available_date')->nullable();
            $table->time('available_time')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
