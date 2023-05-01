<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1553882699ChannelServersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('channel_servers')) {
            Schema::create('channel_servers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('cs_name')->nullable()->unique();
                $table->string('cs_host')->nullable()->unique();
                $table->string('cs_host_ip')->nullable();
                $table->string('cs_token')->nullable();
                $table->text('notes')->nullable();
                $table->string('username')->nullable();
                $table->string('password')->nullable();
                $table->string('default_cloud_a_address')->nullable();
                $table->string('default_cloud_a_port')->nullable();
                $table->string('default_cloud_b_address')->nullable();
                $table->string('default_cloud_b_port')->nullable();
                $table->string('local_output')->nullable();
                $table->string('local_output_port')->nullable();
                $table->string('license')->nullable();

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
        Schema::dropIfExists('channel_servers');
    }
}
