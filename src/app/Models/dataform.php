<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dataform extends Model
{
    use HasFactory;
    protected $table = 'dataforms';
    
    protected $casts = [
        'date' => 'date',
        // Remove or change the 'time' cast
        'time' => 'string', // If you're treating it as a string
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        // Continue with your fillable fields...
    ];

    // If you need to work with 'time' as a Carbon instance, consider creating a custom accessor
    public function getTimeAttribute($value)
    {
        // Assuming 'time' is stored in 'H:i:s' format
        return Carbon::createFromFormat('H:i:s', $value);
    }
}