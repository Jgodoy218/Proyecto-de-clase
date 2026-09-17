<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $table = 'table_products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'image',
        'club',
    ];

    /**
     * Categoría del jugador.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Usuarios que han comprado/tenido este jugador.
     */
    public function owners(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'player_ownerships',
            'product_id',
            'user_id'
        )->withTimestamps();
    }

    /**
     * Usuario que actualmente tiene el jugador.
     */
    public function owner()
    {
        return $this->owners()
            ->latest('player_ownerships.created_at')
            ->first();
    }
}