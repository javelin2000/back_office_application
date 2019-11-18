<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Get Role by name
     * @param $name
     * @return mixed
     */
    public static function getRoleByName(string $name): Role
    {
        return self::whereName($name)->first();
    }

    /**
     * Get Role by ID
     * @param int $id
     * @return mixed
     */
    public static function getRoleByID(int $id): Role
    {
        return self::find($id);
    }
}
