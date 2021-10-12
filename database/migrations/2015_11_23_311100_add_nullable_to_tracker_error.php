<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNullableToTrackerError extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    // private $table = 'tracker_errors';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // try {
        //     $this->builder->table(
        //         $this->table,
        //         function ($table) {
        //             $table->string('code')->nullable()->change();
        //         }
        //     );
        // } catch (\Exception $e) {
        // }
            Schema::table('tracker_errors',function(Blueprint $table){
                $table->string('code')->nullable()->change();
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
