<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_id',
        'group_name',
        'group_code',
        'group_opening_date',
        'group_opening_fund',
        'group_email',
        'group_contact_number',
        'state',
        'city',
        'area',
        'pincode',
    ];
}
