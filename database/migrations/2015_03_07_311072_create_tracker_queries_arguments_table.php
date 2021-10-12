<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
// use PragmaRX\Tracker\Support\Migration;
use Illuminate\Database\Migrations\Migration;

class CreateTrackerQueriesArgumentsTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_query_arguments';

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

        //         $table->bigInteger('query_id')->unsigned()->index();
        //         $table->string('argument')->index();
        //         $table->string('value')->index();

        //         $table->timestamps();
        //         $table->index('created_at');
        //         $table->index('updated_at');
        //     }
        // );

        Schema::create('tracker_query_arguments',function(Blueprint $table){
            $table->id();
            $table->bigInteger('query_id')->unsigned()->index();
            $table->string('argument')->index();
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
        $this->drop($this->table);
        Schema::drop('tracker_query_arguments');
    }
}
