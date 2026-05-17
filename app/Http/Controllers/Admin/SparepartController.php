<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sparepart;
use Illuminate\Http\Request;

class SparepartController extends Controller
{
    public function index(Request $request)
    {
        $spareparts = Sparepart::query()
            ->when($request->search, fn($q) => $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.spareparts', compact('spareparts'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'category'      => 'required|string',
        'part_number'   => 'nullable|string|max:100',
        'brand'         => 'required|string|max:100',
        'stock'         => 'required|integer|min:0',
        'stock_minimum' => 'required|integer|min:0',
        'price'         => 'required|integer|min:0',
        'unit'          => 'required|string',
        'condition'     => 'required|in:new,used',
        'description'   => 'nullable|string',
    ]);

    Sparepart::create($validated);

    return back()->with('success', 'Sparepart berhasil ditambahkan.');
}

    public function update(Request $request, Sparepart $sparepart)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'category'      => 'required|string',
            'part_number'   => 'nullable|string|max:100',
            'brand'         => 'required|string|max:100',
            'stock'         => 'required|integer|min:0',
            'stock_minimum' => 'required|integer|min:0',
            'price'         => 'required|integer|min:0',
            'unit'          => 'required|string',
            'condition'     => 'required|in:new,used',
            'status'        => 'required|in:active,inactive',
            'description'   => 'nullable|string',
        ]);

        $sparepart->update($validated);

        return back()->with('success', 'Sparepart berhasil diupdate.');
    }

    public function destroy(Sparepart $sparepart)
    {
        $sparepart->delete();

        return back()->with('success', 'Sparepart berhasil dihapus.');
    }
}