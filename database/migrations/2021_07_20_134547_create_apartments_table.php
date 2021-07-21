<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->tinyInteger('rooms')->default(1)->unsigned();
            $table->tinyInteger('beds')->default(1)->unsigned();
            $table->tinyInteger('bathrooms')->default(1)->unsigned();
            $table->integer('mq')->unsigned();
            $table->string('address');
            $table->float('gps_lng', 9, 6);
            $table->float('gps_lat', 8, 6);
            $table->string('img_cover')->nullable();
            $table->integer('price')->default(25);
            $table->boolean('searchable')->default(true);

            //collegamento tabella users(agnese)
            $table->unsignedBigInteger('user_id'); 
            $table->foreign("user_id")
                ->references("id")
                ->on("users");
                

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
        Schema::table('apartments', function(Blueprint $table) {
            $table->dropForeign('apartments_user_id_foreign');
            $table->dropColumn('user_id');
        });
        
        Schema::disableForeignKeyConstraints();  
        Schema::dropIfExists('apartments');
        
    }
}
