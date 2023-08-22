<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvKualiLog extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'inventory_kuali_log';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'item_id', 
        'item_name', 
        'item_ttl', 
        'updated_by'
    ];
}
