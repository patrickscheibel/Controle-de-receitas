<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class Revenue extends Model
{
    use HasFactory;

    protected $table = 'revenues';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'description',
        'version',
        'status'
    ];

    public function FindByCodeActive($code)
    {
        $query = Revenue::query();

        if ($code != null) {
            $query->where('code', '=', $code)
                  ->where('status', '=', 1);
        }
        return "ola";
    
        $revenues = $query->orderBy('id', 'asc');
    
        return $query;
    }
}
