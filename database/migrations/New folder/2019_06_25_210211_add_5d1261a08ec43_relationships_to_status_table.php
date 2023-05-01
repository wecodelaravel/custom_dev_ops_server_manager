<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d1261a08ec43RelationshipsToStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('statuses', function(Blueprint $table) {
            if (!Schema::hasColumn('statuses', 'host_id')) {
                $table->integer('host_id')->unsigned()->nullable();
                $table->foreign('host_id', '292548_5cd378e771dac')->references('id')->on('hosts')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('statuses', function(Blueprint $table) {
            if(Schema::hasColumn('statuses', 'host_id')) {
                $table->dropForeign('292548_5cd378e771dac');
                $table->dropIndex('292548_5cd378e771dac');
                $table->dropColumn('host_id');
            }
            
        });
    }
}
