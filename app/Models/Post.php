<?php

namespace App\Models;

 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use Carbon\Carbon;
class Post extends Model
{   
    use HasFactory;
    protected $fillable = ['title', 'content', 'user_id', 'is_approved'];
    protected $casts = [
        'is_approved' => 'boolean',
    ];
    public $timestamps = true;
    public function user()
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
    public function isApproved():bool
    {
        return (bool) $this->is_approved; // Retorna true si está aprobado
    }
    public function approve():void
    {
        $this->update(['is_approved' => true]);
    }
    public function getCreatedAtAttribute($value): string
    {
        return \Carbon\Carbon::parse($value)->format('d/m/Y H:i');
    }
    
}
