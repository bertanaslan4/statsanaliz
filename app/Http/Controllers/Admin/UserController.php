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
            $data = User::select('id', 'name', 'email', 'created_at', 'is_admin');

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('is_admin', function($row) {
                    return $row->is_admin ? '<span class="badge badge-success">Yönetici</span>' : '<span class="badge badge-secondary">Üye</span>';
                })
                ->editColumn('created_at', function($row) {
                    return $row->created_at ? $row->created_at->format('d.m.Y H:i') : '-';
                })
                ->addColumn('action', function($row){
                    return '<button class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i></button>
                                   <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                })
                ->rawColumns(['action', 'is_admin'])
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

        return redirect()->route('yonetim.index')->with('success', 'Kullanıcı başarıyla oluşturuldu.');
    }
}
