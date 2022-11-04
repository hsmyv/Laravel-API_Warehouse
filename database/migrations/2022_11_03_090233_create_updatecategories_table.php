<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdatecategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updatecategories', function (Blueprint $table) {
            $table->id();
            $table->integer('role_id');
            $table->string('role');
            $table->string('name');
            $table->string('email');
            $table->string('category');
            $table->integer('status');
            $table->string('parentcategory');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('updatecategories');
    }
}
