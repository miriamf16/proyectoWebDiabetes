<?php

// use PragmaRX\Tracker\Support\Migration;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixQueryArguments extends Migration
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
        // try {
        //     $this->builder->table(
        //         $this->table,
        //         function ($table) {
        //             $table->string('value')->nullable()->change();
        //         }
        //     );
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }
        try {
            //code...
            Schema::table('tracker_query_arguments',function(Blueprint $table){
                $table->string('value')->nullable();
            });
        } catch (\Exception $e) {
            //throw $th;
            dd($e->getMessage());
        }
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // try {
        //     $this->builder->table(
        //         $this->table,
        //         function ($table) {
        //             $table->string('value')->change();
        //         }
        //     );
        // } catch (\Exception $e) {
        //     dd($e->getMessage());
        // }
            try {
                //code...
                Schema::table('tracker_query_arguments',function(Blueprint $table){
                    $table->string('value')->change();
                });
            } catch (\Exception $e) {
                //throw $th;
                dd($e->getMessage());
            }
    }
}
