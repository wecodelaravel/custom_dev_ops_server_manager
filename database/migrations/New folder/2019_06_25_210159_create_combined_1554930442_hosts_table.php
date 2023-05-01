<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1554930442HostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('hosts')) {
            Schema::create('hosts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('host')->nullable();
                $table->tinyInteger('server_exists')->nullable()->default('0');
                $table->tinyInteger('caipy_is_setup')->nullable()->default('0');
                $table->tinyInteger('ready_to_receive_conf')->nullable()->default('0');
                $table->datetime('last_received_conf')->nullable();
                $table->tinyInteger('configured')->nullable()->default('0');
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
        Schema::dropIfExists('hosts');
    }
}
