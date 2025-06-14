<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fpurchaseorder extends Model
{
    use HasFactory;

     protected $guarded = [];

        protected $fillable = [
  
        'frequisition_id',
        'requisitionNumber',
        'companyId',
        'invoiceamount',
        'jobcardfile',
        'invoice',
        'userId',
        'status',
        'purchaseorderstatus',
        'balance',
        'approvallevel',
        'totalapprovallevels',
        'isActive',
        'reason',
        'approvedby',
        'releaseStatus',
        'uploadStatus'
       
    ];



        public function histories()
    {
        return $this->hasMany(RequisitionHistory::class, 'frequisition_id', 'frequisition_id');

    }
}
