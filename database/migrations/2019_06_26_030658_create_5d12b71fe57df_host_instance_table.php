<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5d12b71fe57dfHostInstanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('host_instance')) {
            Schema::create('host_instance', function (Blueprint $table) {
                $table->integer('host_id')->unsigned()->nullable();
                $table->foreign('host_id', 'fk_p_290118_284546_instan_5d12b71fe5929')->references('id')->on('hosts')->onDelete('cascade');
                $table->integer('instance_id')->unsigned()->nullable();
                $table->foreign('instance_id', 'fk_p_284546_290118_host_i_5d12b71fe59fa')->references('id')->on('instances')->onDelete('cascade');
                
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
        Schema::dropIfExists('host_instance');
    }
}
