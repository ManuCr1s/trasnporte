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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount');
            $table->boolean('status')->default(true);
            $table->string('created_by',8)->nullable();
            $table->string('updated_by',8)->nullable();
            $table->foreign('created_by')->references('dni')->on('users')->nullOnDelete();
            $table->foreign('updated_by')->references('dni')->on('users')->nullOnDelete();
            $table->dateTime('created_at',$precision=3);
            $table->dateTime('updated_at',$precision=3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
