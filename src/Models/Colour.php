<?php

namespace JianJye\LaravelBasicSearch\Models;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        ['id' => 1, 'name' => 'pink'],
        ['id' => 2, 'name' => 'red'],
        ['id' => 3, 'name' => 'blue'],
        ['id' => 4, 'name' => 'black'],
        ['id' => 5, 'name' => 'light black'],
        ['id' => 6, 'name' => 'dark black'],
    ];
}
