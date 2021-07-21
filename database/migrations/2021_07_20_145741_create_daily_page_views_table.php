<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyPageViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_page_views', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip');
            $table->date('date');

            // collegamento apartment
            $table->unsignedBigInteger('apartment_id');
            $table->foreign("apartment_id")
                ->references("id")
                ->on("apartments");

            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_page_views');
    }
}
