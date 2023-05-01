<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d126198bfad2RelationshipsToCsoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('csos', function(Blueprint $table) {
            if (!Schema::hasColumn('csos', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '284509_5c9e681d8d4fb')->references('id')->on('channel_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('csos', 'channel_id')) {
                $table->integer('channel_id')->unsigned()->nullable();
                $table->foreign('channel_id', '284509_5cab68f738dc7')->references('id')->on('channels')->onDelete('cascade');
                }
                if (!Schema::hasColumn('csos', 'select_aggregation_server_for_a_id')) {
                $table->integer('select_aggregation_server_for_a_id')->unsigned()->nullable();
                $table->foreign('select_aggregation_server_for_a_id', '284509_5c9e72e27721f')->references('id')->on('aggregation_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('csos', 'select_sync_server_for_a_id')) {
                $table->integer('select_sync_server_for_a_id')->unsigned()->nullable();
                $table->foreign('select_sync_server_for_a_id', '284509_5c9e72e297a2a')->references('id')->on('syncservers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('csos', 'select_aggregation_server_for_b_id')) {
                $table->integer('select_aggregation_server_for_b_id')->unsigned()->nullable();
                $table->foreign('select_aggregation_server_for_b_id', '284509_5c9e72e2b22f1')->references('id')->on('aggregation_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('csos', 'select_sync_server_for_b_id')) {
                $table->integer('select_sync_server_for_b_id')->unsigned()->nullable();
                $table->foreign('select_sync_server_for_b_id', '284509_5c9e72e2cca6f')->references('id')->on('syncservers')->onDelete('cascade');
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
        Schema::table('csos', function(Blueprint $table) {
            if(Schema::hasColumn('csos', 'channel_server_id')) {
                $table->dropForeign('284509_5c9e681d8d4fb');
                $table->dropIndex('284509_5c9e681d8d4fb');
                $table->dropColumn('channel_server_id');
            }
            if(Schema::hasColumn('csos', 'channel_id')) {
                $table->dropForeign('284509_5cab68f738dc7');
                $table->dropIndex('284509_5cab68f738dc7');
                $table->dropColumn('channel_id');
            }
            if(Schema::hasColumn('csos', 'select_aggregation_server_for_a_id')) {
                $table->dropForeign('284509_5c9e72e27721f');
                $table->dropIndex('284509_5c9e72e27721f');
                $table->dropColumn('select_aggregation_server_for_a_id');
            }
            if(Schema::hasColumn('csos', 'select_sync_server_for_a_id')) {
                $table->dropForeign('284509_5c9e72e297a2a');
                $table->dropIndex('284509_5c9e72e297a2a');
                $table->dropColumn('select_sync_server_for_a_id');
            }
            if(Schema::hasColumn('csos', 'select_aggregation_server_for_b_id')) {
                $table->dropForeign('284509_5c9e72e2b22f1');
                $table->dropIndex('284509_5c9e72e2b22f1');
                $table->dropColumn('select_aggregation_server_for_b_id');
            }
            if(Schema::hasColumn('csos', 'select_sync_server_for_b_id')) {
                $table->dropForeign('284509_5c9e72e2cca6f');
                $table->dropIndex('284509_5c9e72e2cca6f');
                $table->dropColumn('select_sync_server_for_b_id');
            }
            
        });
    }
}
