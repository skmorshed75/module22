<?php

// app/Models/Customer.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'email', 'contact_number'];
    // Add more fillable fields as needed
}


