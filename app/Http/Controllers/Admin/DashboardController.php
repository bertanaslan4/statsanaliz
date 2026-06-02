<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Kullanıcı modelini dahil ettik
use Yajra\DataTables\Facades\DataTables; // Yajra sınıfını dahil ettik

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Eğer istek Yajra (AJAX) üzerinden geliyorsa:

        if ($request->ajax()) {
            $data = User::select('id', 'name', 'email', 'created_at');

            return DataTables::of($data)
                ->addIndexColumn() // Otomatik sıra numarası (DT_RowIndex) ekler
                ->editColumn('created_at', function($row) {
                    return $row->created_at ? $row->created_at->format('d.m.Y H:i') : '-';
                })
                ->addColumn('action', function($row){
                    // İşlem butonları (Şimdilik görsel olarak ekliyoruz)
                    return '<button class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i></button>
                                   <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>';
                })
                ->rawColumns(['action']) // HTML kodlarının metin olarak değil, HTML olarak basılmasını sağlar
                ->make(true);
        }

        // Normal sayfa ziyaretiyse sadece arayüzü döndür
        return view('admin.dashboard');
    }
}
