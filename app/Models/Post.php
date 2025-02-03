<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{   
    use HasFactory;
    protected $fillable = ['title', 'content', 'user_id', 'is_approved'];
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
    ];
    public $timestamp = true;
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucfirst($value);
    }

   
    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }
    public function isApproved()
    {
        return $this->is_approved; // Retorna true si está aprobado
    }
    public function approve()
    {
        $this->is_approved = true;
        $this->save();
    }
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i');
    }
    
}
