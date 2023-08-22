<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvKuali extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'inventory_kuali';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'item_name', 
        'item_ttl', 
        'date', 
        'created_by'
    ];
}
