<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::when($request->search, function ($query, $search) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        })->orderBy('id', 'desc')->paginate(15);

        return view('admin.users', compact('users'));
    }

    public function toggleAdmin($id): RedirectResponse
    {
        /** @var User $user */
        $user = User::findOrFail($id);
        
        /** @var User|null $currentUser */
        $currentUser = auth()->user();
        
        if (!$currentUser) {
            return redirect()->back()->with('error', 'Пользователь не авторизован');
        }
        
        if ($user->getKey() === $currentUser->getKey()) {
            return redirect()->back()->with('error', 'Вы не можете изменить свои права администратора');
        }
        
        $user->is_admin = !$user->is_admin;
        $user->save();
        
        $status = $user->is_admin ? 'назначен администратором' : 'снят с должности администратора';
        
        return redirect()->back()->with('success', "Пользователь {$user->name} {$status}");
    }
}