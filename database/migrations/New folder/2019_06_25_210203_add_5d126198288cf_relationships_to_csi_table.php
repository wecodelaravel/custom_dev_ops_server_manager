<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d126198288cfRelationshipsToCsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csis', function(Blueprint $table) {
            if (!Schema::hasColumn('csis', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '284508_5c9e63f980d54')->references('id')->on('channel_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('csis', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '284508_5c9e6526de623')->references('id')->on('channels')->onDelete('cascade');
                }
                if (!Schema::hasColumn('csis', 'protocol_id')) {
                $table->integer('protocol_id')->unsigned()->nullable();
                $table->foreign('protocol_id', '284508_5c9e652704462')->references('id')->on('protocols')->onDelete('cascade');
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
        Schema::table('csis', function(Blueprint $table) {
            if(Schema::hasColumn('csis', 'channel_server_id')) {
                $table->dropForeign('284508_5c9e63f980d54');
                $table->dropIndex('284508_5c9e63f980d54');
                $table->dropColumn('channel_server_id');
            }
            if(Schema::hasColumn('csis', 'channel_id')) {
                $table->dropForeign('284508_5c9e6526de623');
                $table->dropIndex('284508_5c9e6526de623');
                $table->dropColumn('channel_id');
            }
            if(Schema::hasColumn('csis', 'protocol_id')) {
                $table->dropForeign('284508_5c9e652704462');
                $table->dropIndex('284508_5c9e652704462');
                $table->dropColumn('protocol_id');
            }
            
        });
    }
}
