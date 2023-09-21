<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('inquires', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('purpose');
            $table->decimal('budget', 10, 2);
            $table->string('contactmethod');
            $table->string('file')->nullable(); // Assuming this is the file field
            $table->boolean('terms')->default(false);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users'); // Checkbox for terms agreement
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('inquires');
    }
};
