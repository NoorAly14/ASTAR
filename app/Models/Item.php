<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [

        'item_name',
        'item_price',
        'category_id',
        'partition_id'

    ];

    public  function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function partitions()
    {
        return $this->belongsTo(Partition::class, 'partition_id', 'id');
    }
}
