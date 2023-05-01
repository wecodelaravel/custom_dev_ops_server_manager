<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d12b71e8f350RelationshipsToHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hosts', function(Blueprint $table) {
            if (!Schema::hasColumn('hosts', 'group_id')) {
                $table->integer('group_id')->unsigned()->nullable();
                $table->foreign('group_id', '290118_5cae5b0f2465b')->references('id')->on('groups')->onDelete('cascade');
                }
                if (!Schema::hasColumn('hosts', 'status_id')) {
                $table->integer('status_id')->unsigned()->nullable();
                $table->foreign('status_id', '290118_5cb4f6c416031')->references('id')->on('statuses')->onDelete('cascade');
                }
                if (!Schema::hasColumn('hosts', 'instance_id')) {
                $table->integer('instance_id')->unsigned()->nullable();
                $table->foreign('instance_id', '290118_5d12a6309d9d1')->references('id')->on('instances')->onDelete('cascade');
                }
                if (!Schema::hasColumn('hosts', 'rc_id')) {
                $table->integer('rc_id')->unsigned()->nullable();
                $table->foreign('rc_id', '290118_5d12a93769a4c')->references('id')->on('role_conventions')->onDelete('cascade');
                }
                if (!Schema::hasColumn('hosts', 'ss_func_id')) {
                $table->integer('ss_func_id')->unsigned()->nullable();
                $table->foreign('ss_func_id', '290118_5d12b6fb7df57')->references('id')->on('sync_server_functions')->onDelete('cascade');
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
        Schema::table('hosts', function(Blueprint $table) {
            if(Schema::hasColumn('hosts', 'group_id')) {
                $table->dropForeign('290118_5cae5b0f2465b');
                $table->dropIndex('290118_5cae5b0f2465b');
                $table->dropColumn('group_id');
            }
            if(Schema::hasColumn('hosts', 'status_id')) {
                $table->dropForeign('290118_5cb4f6c416031');
                $table->dropIndex('290118_5cb4f6c416031');
                $table->dropColumn('status_id');
            }
            if(Schema::hasColumn('hosts', 'instance_id')) {
                $table->dropForeign('290118_5d12a6309d9d1');
                $table->dropIndex('290118_5d12a6309d9d1');
                $table->dropColumn('instance_id');
            }
            if(Schema::hasColumn('hosts', 'rc_id')) {
                $table->dropForeign('290118_5d12a93769a4c');
                $table->dropIndex('290118_5d12a93769a4c');
                $table->dropColumn('rc_id');
            }
            if(Schema::hasColumn('hosts', 'ss_func_id')) {
                $table->dropForeign('290118_5d12b6fb7df57');
                $table->dropIndex('290118_5d12b6fb7df57');
                $table->dropColumn('ss_func_id');
            }
            
        });
    }
}
