<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

//    protected $fillable = [
//        'title',
//        'cat_id',
//        'product_type',
//    ];
protected $guarded=[];

    /**
     * @var string[]
     */
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productVariant():HasMany
    {
        return $this->hasMany(ProductVariant::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }


}
