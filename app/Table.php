<?php

namespace App;

use \App\Restaurant as RestaurantEloquent;
use \App\DiningTable as DiningTableEloquent;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';
    protected $fillable = [
        'restaurant_id',
        'table',
        'status',
        'row',
        'col',
    ];

    public function restaurant(){
        return $this->belongsTo(RestaurantEloquent::class);
    }
    public function DiningTable(){
        return $this->belongsTo(DiningTableEloquent::class);
    }

}
