<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrackerRefererColumnToLog extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_log';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $this->builder->table(
        //     $this->table,
        //     function ($table) {
        //         $table->integer('referer_id')->unsigned()->nullable()->index();
        //     }
        // );

        Schema::table('tracker_log',function(Blueprint $table){
            $table->integer('referer_id')->unsigned()->nullable()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // $this->builder->table(
        //     $this->table,
        //     function ($table) {
        //         $table->dropColumn('referer_id');
        //     }
        // );

        Schema::table('tracker_log',function(Blueprint $table){
            $table->dropColumn('referer_id');
        });
    }
}
