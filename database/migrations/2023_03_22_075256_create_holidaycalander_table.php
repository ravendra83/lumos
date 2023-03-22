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
        Schema::create('holidaycalander', function (Blueprint $table) {
            $table->id();
            $table->string('title',30);
            $table->date('holidaydate');
            $table->string('location',10);
            $table->string('year',4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('holidaycalander');
    }
};
