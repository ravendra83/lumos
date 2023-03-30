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
        Schema::create('reviewdar', function (Blueprint $table) {
            $table->id();
            $table->Integer('userid');
            $table->Integer('taskid');
            $table->Integer('activitycategory');
            $table->Integer('activitysubcategory');
            $table->string('title',255);
            $table->date('dardate');
            $table->string('projectid',20);
            $table->string('language',5);
            $table->string('product',10);
            $table->string('contenttype',10);
            $table->string('projecttype',10);
            $table->Integer('wordcount');
            $table->Integer('output');
            $table->Integer('hours');
            $table->Integer('minutes');
            $table->Integer('seconds');
            $table->longText('comments');
            $table->longText('unapprovereason');
            $table->string('status',1);
            $table->string('isapprove',1);
            $table->string('approvedby',5);
            $table->timestamp('actiondate');
            $table->string('dartype',10);
            $table->Integer('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviewdar');
    }
};
