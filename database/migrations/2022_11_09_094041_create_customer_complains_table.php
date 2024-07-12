<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_complains', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('title');
            $table->String('complain');
            $table->String('email');
            $table->bigInteger('status')->default(0);
            $table->bigInteger('seen_by')->default(0); // auth_id
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
        Schema::dropIfExists('customer_complains');
    }
};
