<?php

Route::get('/store', function (\Illuminate\Http\Request $request) {
    $entry = new \App\Entry();
$entry->project_id = $request->input('project_id');
$entry->user_id = $request->input('user_id');
$entry->scope = $request->input('scope');
$entry->key = $request->input('key');
$entry->value = $request->input('value');
$entry->save();
return "saved";
});
Route::get('/fetch', function (\Illuminate\Http\Request $request) {
    $input = $request->all();
$entry = \App\Entry::where($input)->first();
return $entry->value;
});
Route::get('/scopes', function (\Illuminate\Http\Request $request) {
    $scopes = \App\Entry::distinct()->select('scope')->where($request->all())->get()->pluck('scope');
return $scopes;
});
Route::get('/keys', function (\Illuminate\Http\Request $request) {
    $keys = \App\Entry::distinct()->select('key')->where($request->all())->get()->pluck('key');
return $keys;
});
Route::get('/delete', function (\Illuminate\Http\Request $request) {
    $input = $request->all();
$entry = \App\Entry::where($input)->first();
$entry->delete();
return "deleted";
});