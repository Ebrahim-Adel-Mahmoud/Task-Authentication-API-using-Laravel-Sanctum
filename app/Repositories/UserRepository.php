<?php
namespace  App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
   public function all()
   {
       return User::all();
   }

   public function create(array $data)
   {
       $user = User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
       ]);

       $user->token = $user->createToken('authToken')->plainTextToken;

       return $user;
   }

   public function findUser($email, $password)
   {
       $user = User::query()->select('id', 'name', 'email', 'password')->firstWhere('email', $email);

       if (! $user || ! Hash::check($password, $user->password)) {
           return 'Invalid credentials';
       }

       $user->token = $user->createToken('authToken')->plainTextToken;

       return $user;
   }

   public function logout()
   {
        $user = auth()->user();

        $user->tokens()->delete();

        return $user;
   }
}
