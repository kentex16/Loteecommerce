<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductIdToInquires extends Migration
{
    public function up()
    {
        Schema::table('inquires', function (Blueprint $table) {
            // Add the product_id column as nullable
            $table->unsignedBigInteger('product_id')->nullable();

            // Define the foreign key constraint
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('CASCADE'); // Optional: Specify the desired on delete behavior
        });
    }

    public function down()
    {
        Schema::table('inquires', function (Blueprint $table) {
            // Remove the foreign key constraint
            $table->dropForeign(['product_id']);

            // Drop the product_id column
            $table->dropColumn('product_id');
        });
    }
}
