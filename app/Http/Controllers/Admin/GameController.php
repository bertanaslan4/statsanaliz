<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use App\Models\Feature;

class GameController extends Controller
{
    // LİSTELEME
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Game::select('id', 'teams', 'match_time', 'iy_05_ust_percent', 'combo_probability_percent', 'status');

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('match_time', function($row) {
                    return Carbon::parse($row->match_time)->format('d.m.Y H:i');
                })
                ->editColumn('status', function($row) {
                    $badges = [
                        'pending' => '<span class="badge badge-warning text-dark">Bekliyor</span>',
                        'started' => '<span class="badge badge-primary">Başladı</span>',
                        'finished' => '<span class="badge badge-success">Bitti</span>',
                    ];
                    return $badges[$row->status] ?? $row->status;
                })
                ->addColumn('action', function($row){
                    $editBtn = '<a href="'.route('yonetim.games.edit', $row->id).'" class="btn btn-sm btn-info text-white"><i class="fa fa-edit"></i></a>';
                    $deleteBtn = '<form action="'.route('yonetim.games.destroy', $row->id).'" method="POST" style="display:inline;" onsubmit="return confirm(\'Bu tahmini silmek istediğinize emin misiniz?\');">
                                        '.csrf_field().method_field('DELETE').'
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                      </form>';
                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('admin.games.index');
    }

    // EKLEME SAYFASI


    public function create()
    {
        $features = Feature::all();
        return view('admin.games.create', compact('features'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teams' => 'required|string|max:255',
            'match_time' => 'required|date',
            'iy_05_ust_percent' => 'nullable|integer|min:0|max:100',
            'combo_probability_percent' => 'nullable|integer|min:0|max:100',
            'status' => 'required|in:pending,started,finished',
            'category' => 'required|in:football,basketball,volleyball',
        ]);

        $game = Game::create($request->except('features'));

        if ($request->has('features')) {
            $syncData = [];
            foreach ($request->features as $featureId => $data) {
                if (isset($data['selected'])) {
                    $syncData[$featureId] = ['comment' => $data['comment'] ?? null];
                }
            }
            $game->features()->sync($syncData);
        }

        return redirect()->route('yonetim.games.index')->with('success', 'Tahmin başarıyla eklendi.');
    }

    public function edit(Game $game)
    {
        $features = Feature::all();
        return view('admin.games.edit', compact('game', 'features'));
    }

    public function update(Request $request, Game $game)
    {
        $request->validate([
            'teams' => 'required|string|max:255',
            'match_time' => 'required|date',
            'iy_05_ust_percent' => 'nullable|integer|min:0|max:100',
            'combo_probability_percent' => 'nullable|integer|min:0|max:100',
            'status' => 'required|in:pending,started,finished',
            'category' => 'required|in:football,basketball,volleyball',
        ]);

        $request->merge([
            'iy_05_ust_result' => $request->has('iy_05_ust_result') ? 1 : 0,
            'ms_15_ust_result' => $request->has('ms_15_ust_result') ? 1 : 0,
        ]);

        $game->update($request->except('features'));

        if ($request->has('features')) {
            $syncData = [];
            foreach ($request->features as $featureId => $data) {
                if (isset($data['selected'])) {
                    $isSuccessful = isset($data['is_successful']) && $data['is_successful'] !== '' ? $data['is_successful'] : null;
                    $syncData[$featureId] = [
                        'comment' => $data['comment'] ?? null,
                        'is_successful' => $isSuccessful,
                    ];
                }
            }
            $game->features()->sync($syncData);
        } else {
            $game->features()->sync([]);
        }

        return redirect()->route('yonetim.games.index')->with('success', 'Tahmin başarıyla güncellendi.');
    }
    // SİLME İŞLEMİ
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('yonetim.games.index')->with('success', 'Tahmin başarıyla silindi.');
    }
}
