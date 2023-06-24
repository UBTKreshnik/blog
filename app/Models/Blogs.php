<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}
