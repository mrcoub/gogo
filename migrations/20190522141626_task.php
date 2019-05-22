<?php

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Task extends Migration
{
    public function up()
    {
        $this->schema->create('task', function(Blueprint $table){
            $table->increments('id');

            $table->string('title', 50);
            $table->text('description')->nullable();
            $table->enum('status', [
                'TODO',
                'DOING',
                'DONE'
            ])->default('TODO');

            $table->timestamps();
        });
    }

    public function down()
    {
        $this->schema->drop('task');
    }
}
