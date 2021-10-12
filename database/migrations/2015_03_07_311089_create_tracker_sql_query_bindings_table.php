<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackerSqlQueryBindingsTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_sql_query_bindings';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        // $this->builder->create(
        //     $this->table,
        //     function ($table) {
        //         $table->bigIncrements('id');

        //         $table->string('sha1', 40)->index();
        //         $table->text('serialized');

        //         $table->timestamps();
        //         $table->index('created_at');
        //         $table->index('updated_at');
        //     }
        // );

        Schema::create('tracker_sql_query_bindings',function(Blueprint $table){
            $table->id();

            $table->string('sha1', 40)->index();
            $table->text('serialized');

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
        Schema::drop('tracker_sql_query_bindings');
    }
}
