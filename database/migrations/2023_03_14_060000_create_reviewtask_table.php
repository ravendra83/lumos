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
        Schema::create('reviewtask', function (Blueprint $table) {
            $table->id();
            $table->string('projectid',11);
            $table->string('worldcount',11);
            $table->string('category',20);
            $table->string('subcategory',20);
            $table->string('title',255);
            $table->string('projecttype',255);
            $table->string('contenttype',255);
            $table->string('product',255);
            $table->string('requestinstruction',255);
            $table->string('documentid',255);
            $table->string('sourcelanguage',255);
            $table->string('targetlanguage',255);
            $table->string('status',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewtask');
    }
};
