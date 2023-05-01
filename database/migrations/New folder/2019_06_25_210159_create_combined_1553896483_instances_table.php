<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1553896483InstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('instances')) {
            Schema::create('instances', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('quantity_to_create')->nullable()->unsigned();
                $table->text('details')->nullable();
                $table->text('notes')->nullable();
                $table->string('cs_token')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instances');
    }
}
