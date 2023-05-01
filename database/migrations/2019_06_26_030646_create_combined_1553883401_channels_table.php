<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCombined1553883401ChannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('channels')) {
            Schema::create('channels', function (Blueprint $table) {
                $table->increments('id');
                $table->string('source_name')->nullable();
                $table->string('channelid')->nullable();
                $table->string('env')->nullable();
                $table->string('ffmpegsource')->nullable();
                $table->string('ssm')->nullable();
                $table->string('imc')->nullable();
                $table->string('port')->nullable();
                $table->string('pid')->nullable();
                $table->string('source_ip')->nullable();
                $table->string('udp')->nullable();
                $table->datetime('valid_as_of')->nullable();
                
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
        Schema::dropIfExists('channels');
    }
}
