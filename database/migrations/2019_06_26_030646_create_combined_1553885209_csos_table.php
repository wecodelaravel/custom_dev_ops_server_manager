<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1553885209CsosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('csos')) {
            Schema::create('csos', function (Blueprint $table) {
                $table->increments('id');
                $table->tinyInteger('use_channel_server_localhost')->nullable()->default('0');
                $table->tinyInteger('use_as_for_a')->nullable()->default('0');
                $table->tinyInteger('use_sync_server_for_a')->nullable()->default('0');
                $table->tinyInteger('use_custom_a')->nullable()->default('0');
                $table->string('ocloud_a')->nullable();
                $table->integer('ocp_a')->nullable()->unsigned();
                $table->tinyInteger('use_as_for_b')->nullable()->default('0');
                $table->tinyInteger('use_sync_server_for_b')->nullable()->default('0');
                $table->tinyInteger('use_custom_for_b')->nullable()->default('0');
                $table->string('ocloud_b')->nullable();
                $table->string('ocp_b')->nullable();
                
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
        Schema::dropIfExists('csos');
    }
}
