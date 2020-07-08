<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function completed($id) {
        $this->completed = true;
        $this->save();
        echo 'works';
    }
}
