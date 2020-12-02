<?php

namespace JianJye\Models;

use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    use \Sushi\Sushi;

    protected $rows = [
        ['id' => 1, 'name' => 'pink', 'date' => '2020-01-30'],
        ['id' => 2, 'name' => 'red', 'date' => '2020-02-28'],
        ['id' => 3, 'name' => 'blue', 'date' => '2020-03-27'],
        ['id' => 4, 'name' => 'black', 'date' => '2020-04-29'],
        ['id' => 5, 'name' => 'light black', 'date' => '2020-05-13'],
        ['id' => 6, 'name' => 'dark black', 'date' => '2020-06-22'],
    ];

    protected $dates = [
        'date'
    ];
}
