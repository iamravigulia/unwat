<?php
use Illuminate\Support\Facades\Route;

// Route::get('greeting', function () {
//     return 'Hi, this is your awesome package! Unwat';
// });

// Route::get('unwat/test', 'EdgeWizz\Unwat\Controllers\UnwatController@test')->name('test');

Route::post('fmt/unjumblewords/at/store', 'EdgeWizz\Unwat\Controllers\UnwatController@store')->name('fmt.unwat.store');

Route::post('fmt/unjumblewords/at/csv_upload/store', 'EdgeWizz\Unwat\Controllers\UnwatController@uploadFile')->name('fmt.unwat.csv_upload');
