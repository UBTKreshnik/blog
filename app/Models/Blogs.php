<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Parsedown;

class Blogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];

    public function getMarkdownBodyAttribute() : string {
        
        $parsedown = new Parsedown();
        return $parsedown->text($this->body);
    }

    public function comments() : HasMany {
        return $this->hasMany(Comments::class);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
