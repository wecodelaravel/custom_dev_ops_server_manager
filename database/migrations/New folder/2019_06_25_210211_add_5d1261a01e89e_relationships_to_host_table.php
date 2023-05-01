<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5d1261a01e89eRelationshipsToHostTable extends Migration
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
            
        });
    }
}
