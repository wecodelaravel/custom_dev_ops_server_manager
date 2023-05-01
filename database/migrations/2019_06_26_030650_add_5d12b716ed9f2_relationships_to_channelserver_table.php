<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d12b716ed9f2RelationshipsToChannelServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('channel_servers', function(Blueprint $table) {
            if (!Schema::hasColumn('channel_servers', 'group_id')) {
                $table->integer('group_id')->unsigned()->nullable();
                $table->foreign('group_id', '284500_5cae8be36411b')->references('id')->on('groups')->onDelete('cascade');
                }
                if (!Schema::hasColumn('channel_servers', 'host_id')) {
                $table->integer('host_id')->unsigned()->nullable();
                $table->foreign('host_id', '284500_5cd0bcad882c5')->references('id')->on('hosts')->onDelete('cascade');
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
        Schema::table('channel_servers', function(Blueprint $table) {
            if(Schema::hasColumn('channel_servers', 'group_id')) {
                $table->dropForeign('284500_5cae8be36411b');
                $table->dropIndex('284500_5cae8be36411b');
                $table->dropColumn('group_id');
            }
            if(Schema::hasColumn('channel_servers', 'host_id')) {
                $table->dropForeign('284500_5cd0bcad882c5');
                $table->dropIndex('284500_5cd0bcad882c5');
                $table->dropColumn('host_id');
            }
            
        });
    }
}
