<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d12619c9a878RelationshipsToChannelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channels', function(Blueprint $table) {
            if (!Schema::hasColumn('channels', 'csi_id')) {
                $table->integer('csi_id')->unsigned()->nullable();
                $table->foreign('csi_id', '284501_5cb12f0e10096')->references('id')->on('csis')->onDelete('cascade');
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
        Schema::table('channels', function(Blueprint $table) {
            if(Schema::hasColumn('channels', 'csi_id')) {
                $table->dropForeign('284501_5cb12f0e10096');
                $table->dropIndex('284501_5cb12f0e10096');
                $table->dropColumn('csi_id');
            }
            
        });
    }
}
