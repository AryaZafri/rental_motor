<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentUser extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'motor_id', 'customer_name', 'price', 'payment_date'];
}
