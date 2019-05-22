<?php

use App\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class Comment extends Migration
{
    public function up()
    {
        $this->schema->create('comment', function(Blueprint $table){
            $table->increments('id');

            $table->integer('task_id');
            $table->text('message');
            $table->string('name');

            $table->timestamps();
        });

        Model::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }

    public function down()
    {
        $this->schema->drop('comment');
    }
}
