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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname',50);
            $table->string('lastname',50);
            $table->string('fullname',50);
            $table->date('dob');
            $table->date('doj');
            $table->integer('location');
            $table->string('usertl',50);
            $table->string('user_language',50);
            $table->string('user_number',10);
            $table->string('user_password',100);
            $table->string('email',100);
            $table->string('ldap_email',100);
            $table->string('sesame_email',100);
            $table->string('type',10);
            $table->enum('status',array('active', 'inactive'));
            $table->string('onboard',10);            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
