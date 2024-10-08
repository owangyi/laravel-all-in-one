<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    /**
     * @var string[]
     *
     * Has Cast
     * {
     *  "id": 1,
     *  "is_admin": false,
     *  "json": {
     *      "age": 22,
     *      "name": "Yi"
     *  },
     *  "created_at": null,
     *  "updated_at": null
     * }
     *
     * No Cast
     * {
     *  "id": 1,
     *  "is_admin": 0,
     *  "json": "{\"age\": 22, \"name\": \"Yi\"}",
     *  "created_at": null,
     *  "updated_at": null
     * }
     */

    protected $casts = [
        'is_admin' => 'bool',
        'json' => 'array',
    ];

    protected $fillable = [
        'is_admin',
        'json',
    ];
}
