<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'sec_no', 'text', 'url', 'route', 'icon', 'target', 'badge_text', 'badge_context', 'badge_pill', 'fa_family', 'is_section', 'is_route', 'can', 'parent_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'id',
        'sec_no',
        'is_section',
        'is_route',
        'parent_id'
    ];

    public function Parent()
    {
        return $this->belongsTo(Menu::class , 'parent_id');
    }

    public function Children() {
        return $this->hasMany(Menu::class,'parent_id','id');
    }

    public function submenu()
    {
        return $this->Children()->with('submenu');
    }
}
