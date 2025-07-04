<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitionHistory extends Model
{
    use HasFactory;

    protected $fillable = [

        'frequisition_id',
        'companyId',
        'vendor',
        'services',
        'paymentmethod',
        'department',
        'expenses',
        'projectcode',
        'amount',
        'file',
        'userId',
        'status',
        'approvallevel',
        'isActive',
        'doneby',
        'action',
        'reason'
       
    ];


    public function frequisition()
    {
        return $this->belongsTo(Frequisition::class);
    }

    public function fpurchaseorder()
    {
        return $this->belongsTo(fpurchaseorder::class);
    }
}


