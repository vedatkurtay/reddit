<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Community
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Community newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Community newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Community query()
 * @mixin \Eloquent
 */
class Community extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description'];

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }
}
