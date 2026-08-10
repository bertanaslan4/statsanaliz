<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email', 'created_at', 'is_admin', 'premium_ends_at');

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('is_admin', function($row) {
                    return $row->is_admin ? '<span class="badge badge-success">Yönetici</span>' : '<span class="badge badge-secondary">Üye</span>';
                })
                ->editColumn('premium_ends_at', function($row) {
                    return $row->hasActivePremium() ? '<span class="badge badge-success">VIP (' . $row->premium_ends_at->format('d.m.Y') . ')</span>' : '<span class="badge badge-secondary">Standart</span>';
                })
                ->editColumn('created_at', function($row) {
                    return $row->created_at ? $row->created_at->format('d.m.Y H:i') : '-';
                })
                ->addColumn('action', function($row){
                    $editUrl = route('yonetim.users.edit', $row->id);
                    return '<a href="' . $editUrl . '" class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i> Düzenle</a>';
                })
                ->rawColumns(['action', 'is_admin', 'premium_ends_at'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'is_admin' => 'required|boolean',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => $request->is_admin,
        ]);

        return redirect()->route('yonetim.users.index')->with('success', 'Kullanıcı başarıyla oluşturuldu.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'is_admin' => 'required|boolean',
            'premium_days' => 'nullable|integer|min:0',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => $request->is_admin,
        ]);

        if ($request->filled('premium_days')) {
            if ($request->premium_days > 0) {
                $user->premium_ends_at = now()->addDays($request->premium_days);
            } else {
                $user->premium_ends_at = null;
            }
            $user->save();
        }

        return redirect()->route('yonetim.users.index')->with('success', 'Kullanıcı başarıyla güncellendi.');
    }
}
