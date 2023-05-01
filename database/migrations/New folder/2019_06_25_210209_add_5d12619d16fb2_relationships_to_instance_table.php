<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d12619d16fb2RelationshipsToInstanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instances', function(Blueprint $table) {
            if (!Schema::hasColumn('instances', 'group_id')) {
                $table->integer('group_id')->unsigned()->nullable();
                $table->foreign('group_id', '284546_5c9e942658699')->references('id')->on('groups')->onDelete('cascade');
                }
                if (!Schema::hasColumn('instances', 'role_convention_id')) {
                $table->integer('role_convention_id')->unsigned()->nullable();
                $table->foreign('role_convention_id', '284546_5c9e94263cb7c')->references('id')->on('role_conventions')->onDelete('cascade');
                }
                if (!Schema::hasColumn('instances', 'channel_server_id')) {
                $table->integer('channel_server_id')->unsigned()->nullable();
                $table->foreign('channel_server_id', '284546_5cb128fa1c2ff')->references('id')->on('channel_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('instances', 'aggregation_server_id')) {
                $table->integer('aggregation_server_id')->unsigned()->nullable();
                $table->foreign('aggregation_server_id', '284546_5cb128fa3604f')->references('id')->on('aggregation_servers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('instances', 'env_id')) {
                $table->integer('env_id')->unsigned()->nullable();
                $table->foreign('env_id', '284546_5c9e942620590')->references('id')->on('environments')->onDelete('cascade');
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
        Schema::table('instances', function(Blueprint $table) {
            if(Schema::hasColumn('instances', 'group_id')) {
                $table->dropForeign('284546_5c9e942658699');
                $table->dropIndex('284546_5c9e942658699');
                $table->dropColumn('group_id');
            }
            if(Schema::hasColumn('instances', 'role_convention_id')) {
                $table->dropForeign('284546_5c9e94263cb7c');
                $table->dropIndex('284546_5c9e94263cb7c');
                $table->dropColumn('role_convention_id');
            }
            if(Schema::hasColumn('instances', 'channel_server_id')) {
                $table->dropForeign('284546_5cb128fa1c2ff');
                $table->dropIndex('284546_5cb128fa1c2ff');
                $table->dropColumn('channel_server_id');
            }
            if(Schema::hasColumn('instances', 'aggregation_server_id')) {
                $table->dropForeign('284546_5cb128fa3604f');
                $table->dropIndex('284546_5cb128fa3604f');
                $table->dropColumn('aggregation_server_id');
            }
            if(Schema::hasColumn('instances', 'env_id')) {
                $table->dropForeign('284546_5c9e942620590');
                $table->dropIndex('284546_5c9e942620590');
                $table->dropColumn('env_id');
            }
            
        });
    }
}
