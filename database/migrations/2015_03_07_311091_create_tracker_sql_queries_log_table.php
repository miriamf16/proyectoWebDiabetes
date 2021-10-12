<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackerSqlQueriesLogTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_sql_queries_log';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $this->builder->create(
        //     $this->table,
        //     function ($table) {
        //         $table->bigIncrements('id');

        //         $table->bigInteger('log_id')->unsigned()->index();
        //         $table->bigInteger('sql_query_id')->unsigned()->index();

        //         $table->timestamps();
        //         $table->index('created_at');
        //         $table->index('updated_at');
        //     }
        // );

        Schema::create('tracker_sql_queries_log',function(Blueprint $table){
            $table->id();

            $table->bigInteger('log_id')->unsigned()->index();
            $table->bigInteger('sql_query_id')->unsigned()->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $this->drop($this->table);
        Schema::drop('tracker_sql_queries_log');
    }
}
