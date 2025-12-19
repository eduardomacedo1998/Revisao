<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\UserService;

class UserControllers extends Controller
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->listAllUsers();
        return response()->json($users);
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = $this->userService->loginUser($username, $password);

        if ($user) {

            session(['user' => $user]);
            // rederecionar para a home.blade.php e enviar mensagem de sucesso
            return  redirect()->route('home')->with('success', 'Login successful');
           
        } else {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
    }

    public function register(Request $request)
    {
        $data = $request->only(['usuario_nome', 'senha', 'adminxuser']);
        $data['adminxuser'] = $data['adminxuser'] === 'admin' ? 1 : 0;
        $user = $this->userService->registerUser($data);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }
    
}
