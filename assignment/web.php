<?php

// routes/web.php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmailCampaignController;

Route::resource('customers', CustomerController::class);
Route::resource('email_campaigns', EmailCampaignController::class);