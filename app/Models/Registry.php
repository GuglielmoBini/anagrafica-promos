<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
    use HasFactory;

    protected $fillable = ['business_name', 'status', 'sector', 'vat_number', 'tax_id_code', 'activity_start_date', 'rating', 'chamber_of_commerce', 'notes', 'email', 'phone_number', 'username', 'password'];
}
