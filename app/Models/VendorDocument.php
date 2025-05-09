<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorDocument extends Model
{
    use HasFactory;

    protected $fillable = [
        'vendor_id',
        'document_name',
        'file_path',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
