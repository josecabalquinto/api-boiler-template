<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'description', 'is_active'];
    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'module_users');
    }
}
