<?php

use Biz\Erps\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('erps', [Controllers\ErpsController::class, 'index']);
