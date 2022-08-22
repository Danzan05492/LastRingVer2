<?php
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
//метод для проверки авторизован или нет юзер
Route::get('/sanctum/check',function(Request $request){
    if (auth('sanctum')->check()){
        return 1;
    }
    else{
        return -1;
    }
});
//Генерация токена
Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
    $user = User::where('email', $request->email)->first();
    //удалим существующие
    $user->tokens()->where('name',$request->device_name)->delete();
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
    return $user->createToken($request->device_name)->plainTextToken;
});
