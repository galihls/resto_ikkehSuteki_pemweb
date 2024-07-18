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
        Schema::create('dataforms', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Add this line
            $table->string('email');
            $table->string('phone');
            $table->integer('guests');
            $table->time('time');
            $table->date('date');
            $table->string('table');
            // Make table_id nullable
            $table->unsignedBigInteger('table_id')->nullable();
            $table->foreign('table_id')->references('id')->on('tables')->onDelete('cascade');
            $table->integer('total_price');
            $table->enum('status', ['paid', 'unpaid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dataforms');
    }
};
