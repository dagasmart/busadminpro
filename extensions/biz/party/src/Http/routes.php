<?php

use Biz\Party\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('party', [Controllers\PartyController::class, 'index']);
