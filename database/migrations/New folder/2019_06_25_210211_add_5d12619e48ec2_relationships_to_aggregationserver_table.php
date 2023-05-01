<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d12619e48ec2RelationshipsToAggregationServerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aggregation_servers', function(Blueprint $table) {
            if (!Schema::hasColumn('aggregation_servers', 'group_id')) {
                $table->integer('group_id')->unsigned()->nullable();
                $table->foreign('group_id', '285680_5cae8ba593756')->references('id')->on('groups')->onDelete('cascade');
                }
                if (!Schema::hasColumn('aggregation_servers', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '285680_5ca29584c216f')->references('id')->on('channel_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('aggregation_servers', 'notification_server_type_id')) {
                $table->integer('notification_server_type_id')->unsigned()->nullable();
                $table->foreign('notification_server_type_id', '285680_5ca29584e578f')->references('id')->on('notification_server_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('aggregation_servers', 'timezone_id')) {
                $table->integer('timezone_id')->unsigned()->nullable();
                $table->foreign('timezone_id', '285680_5ca2958512461')->references('id')->on('timezones')->onDelete('cascade');
                }
                if (!Schema::hasColumn('aggregation_servers', 'filter_preset_for_ui_id')) {
                $table->integer('filter_preset_for_ui_id')->unsigned()->nullable();
                $table->foreign('filter_preset_for_ui_id', '285680_5ca2958532ea8')->references('id')->on('filters')->onDelete('cascade');
                }
                if (!Schema::hasColumn('aggregation_servers', 'country_id')) {
                $table->integer('country_id')->unsigned()->nullable();
                $table->foreign('country_id', '285680_5ca295855ad27')->references('id')->on('countries')->onDelete('cascade');
                }
                if (!Schema::hasColumn('aggregation_servers', 'video_server_type_id')) {
                $table->integer('video_server_type_id')->unsigned()->nullable();
                $table->foreign('video_server_type_id', '285680_5ca295857bc7d')->references('id')->on('video_server_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('aggregation_servers', 'host_id')) {
                $table->integer('host_id')->unsigned()->nullable();
                $table->foreign('host_id', '285680_5cd0bdcd586c7')->references('id')->on('hosts')->onDelete('cascade');
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
        Schema::table('aggregation_servers', function(Blueprint $table) {
            if(Schema::hasColumn('aggregation_servers', 'group_id')) {
                $table->dropForeign('285680_5cae8ba593756');
                $table->dropIndex('285680_5cae8ba593756');
                $table->dropColumn('group_id');
            }
            if(Schema::hasColumn('aggregation_servers', 'channel_server_id')) {
                $table->dropForeign('285680_5ca29584c216f');
                $table->dropIndex('285680_5ca29584c216f');
                $table->dropColumn('channel_server_id');
            }
            if(Schema::hasColumn('aggregation_servers', 'notification_server_type_id')) {
                $table->dropForeign('285680_5ca29584e578f');
                $table->dropIndex('285680_5ca29584e578f');
                $table->dropColumn('notification_server_type_id');
            }
            if(Schema::hasColumn('aggregation_servers', 'timezone_id')) {
                $table->dropForeign('285680_5ca2958512461');
                $table->dropIndex('285680_5ca2958512461');
                $table->dropColumn('timezone_id');
            }
            if(Schema::hasColumn('aggregation_servers', 'filter_preset_for_ui_id')) {
                $table->dropForeign('285680_5ca2958532ea8');
                $table->dropIndex('285680_5ca2958532ea8');
                $table->dropColumn('filter_preset_for_ui_id');
            }
            if(Schema::hasColumn('aggregation_servers', 'country_id')) {
                $table->dropForeign('285680_5ca295855ad27');
                $table->dropIndex('285680_5ca295855ad27');
                $table->dropColumn('country_id');
            }
            if(Schema::hasColumn('aggregation_servers', 'video_server_type_id')) {
                $table->dropForeign('285680_5ca295857bc7d');
                $table->dropIndex('285680_5ca295857bc7d');
                $table->dropColumn('video_server_type_id');
            }
            if(Schema::hasColumn('aggregation_servers', 'host_id')) {
                $table->dropForeign('285680_5cd0bdcd586c7');
                $table->dropIndex('285680_5cd0bdcd586c7');
                $table->dropColumn('host_id');
            }
            
        });
    }
}
