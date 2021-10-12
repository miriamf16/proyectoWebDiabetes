<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackerAgentsTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_agents';

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

        //         $table->string('name')->unique();
        //         $table->string('browser')->index();
        //         $table->string('browser_version');

        //         $table->timestamps();
        //         $table->index('created_at');
        //         $table->index('updated_at');
        //     }
        // );

        Schema::create('tracker_agents',function(Blueprint $table){
            $table->id();

            $table->string('name')->unique();
            $table->string('browser')->index();
            $table->string('browser_version');

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
        Schema::drop('tracker_agents');
    }
}
