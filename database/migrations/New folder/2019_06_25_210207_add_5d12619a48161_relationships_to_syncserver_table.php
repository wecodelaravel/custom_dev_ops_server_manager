<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d12619a48161RelationshipsToSyncserverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('syncservers', function(Blueprint $table) {
            if (!Schema::hasColumn('syncservers', 'ss_type_id')) {
                $table->integer('ss_type_id')->unsigned()->nullable();
                $table->foreign('ss_type_id', '284513_5d0d350d7850d')->references('id')->on('sync_server_functions')->onDelete('cascade');
                }
                if (!Schema::hasColumn('syncservers', 'group_id')) {
                $table->integer('group_id')->unsigned()->nullable();
                $table->foreign('group_id', '284513_5caf8201167f0')->references('id')->on('groups')->onDelete('cascade');
                }
                if (!Schema::hasColumn('syncservers', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '284513_5c9e74751a4a8')->references('id')->on('channel_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('syncservers', 'parent_as_id')) {
                $table->integer('parent_as_id')->unsigned()->nullable();
                $table->foreign('parent_as_id', '284513_5c9e7aee76981')->references('id')->on('aggregation_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('syncservers', 'notification_server_type_id')) {
                $table->integer('notification_server_type_id')->unsigned()->nullable();
                $table->foreign('notification_server_type_id', '284513_5c9e6f8855b79')->references('id')->on('notification_server_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('syncservers', 'timezone_id')) {
                $table->integer('timezone_id')->unsigned()->nullable();
                $table->foreign('timezone_id', '284513_5c9e6f887f1ce')->references('id')->on('timezones')->onDelete('cascade');
                }
                if (!Schema::hasColumn('syncservers', 'filter_preset_for_ui_id')) {
                $table->integer('filter_preset_for_ui_id')->unsigned()->nullable();
                $table->foreign('filter_preset_for_ui_id', '284513_5c9e6f88a46e8')->references('id')->on('filters')->onDelete('cascade');
                }
                if (!Schema::hasColumn('syncservers', 'video_server_type_id')) {
                $table->integer('video_server_type_id')->unsigned()->nullable();
                $table->foreign('video_server_type_id', '284513_5c9e6f88f1ce1')->references('id')->on('video_server_types')->onDelete('cascade');
                }
                if (!Schema::hasColumn('syncservers', 'country_id')) {
                $table->integer('country_id')->unsigned()->nullable();
                $table->foreign('country_id', '284513_5c9e6f88c7c25')->references('id')->on('countries')->onDelete('cascade');
                }
                if (!Schema::hasColumn('syncservers', 'host_id')) {
                $table->integer('host_id')->unsigned()->nullable();
                $table->foreign('host_id', '284513_5cd0bd76e395d')->references('id')->on('hosts')->onDelete('cascade');
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
        Schema::table('syncservers', function(Blueprint $table) {
            if(Schema::hasColumn('syncservers', 'ss_type_id')) {
                $table->dropForeign('284513_5d0d350d7850d');
                $table->dropIndex('284513_5d0d350d7850d');
                $table->dropColumn('ss_type_id');
            }
            if(Schema::hasColumn('syncservers', 'group_id')) {
                $table->dropForeign('284513_5caf8201167f0');
                $table->dropIndex('284513_5caf8201167f0');
                $table->dropColumn('group_id');
            }
            if(Schema::hasColumn('syncservers', 'channel_server_id')) {
                $table->dropForeign('284513_5c9e74751a4a8');
                $table->dropIndex('284513_5c9e74751a4a8');
                $table->dropColumn('channel_server_id');
            }
            if(Schema::hasColumn('syncservers', 'parent_as_id')) {
                $table->dropForeign('284513_5c9e7aee76981');
                $table->dropIndex('284513_5c9e7aee76981');
                $table->dropColumn('parent_as_id');
            }
            if(Schema::hasColumn('syncservers', 'notification_server_type_id')) {
                $table->dropForeign('284513_5c9e6f8855b79');
                $table->dropIndex('284513_5c9e6f8855b79');
                $table->dropColumn('notification_server_type_id');
            }
            if(Schema::hasColumn('syncservers', 'timezone_id')) {
                $table->dropForeign('284513_5c9e6f887f1ce');
                $table->dropIndex('284513_5c9e6f887f1ce');
                $table->dropColumn('timezone_id');
            }
            if(Schema::hasColumn('syncservers', 'filter_preset_for_ui_id')) {
                $table->dropForeign('284513_5c9e6f88a46e8');
                $table->dropIndex('284513_5c9e6f88a46e8');
                $table->dropColumn('filter_preset_for_ui_id');
            }
            if(Schema::hasColumn('syncservers', 'video_server_type_id')) {
                $table->dropForeign('284513_5c9e6f88f1ce1');
                $table->dropIndex('284513_5c9e6f88f1ce1');
                $table->dropColumn('video_server_type_id');
            }
            if(Schema::hasColumn('syncservers', 'country_id')) {
                $table->dropForeign('284513_5c9e6f88c7c25');
                $table->dropIndex('284513_5c9e6f88c7c25');
                $table->dropColumn('country_id');
            }
            if(Schema::hasColumn('syncservers', 'host_id')) {
                $table->dropForeign('284513_5cd0bd76e395d');
                $table->dropIndex('284513_5cd0bd76e395d');
                $table->dropColumn('host_id');
            }
            
        });
    }
}
