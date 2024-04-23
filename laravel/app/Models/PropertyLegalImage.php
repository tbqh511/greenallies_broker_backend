<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyLegalImage extends Model
{
    use HasFactory;

    protected $table ='property_images';

    protected $fillable = [
        'propertys_id',
        'image',
    ];
    protected $hidden = [
        'updated_at',
        'deleted_at'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'propertys_id');
    }
}
