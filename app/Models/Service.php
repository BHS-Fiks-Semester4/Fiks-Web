<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';
    protected $guarded = ['id'];

    public static function getService($search = null)
    {
        $query = Service::where('status', 'aktif')->latest();
    
        if ($search) {
            $query->where('nama_service', 'LIKE', "%$search%");
        }
    
        return $query->paginate(4)->withQueryString();
    }
}