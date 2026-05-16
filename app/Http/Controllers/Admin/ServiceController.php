<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $services = Service::query()
            ->when($request->search, fn($q) => $q->where('name', 'like', '%' . $request->search . '%'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.services', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'estimated_time' => 'required|integer|min:1',
            'price_min' => 'required|integer|min:0',
            'price_max' => 'required|integer|min:0|gte:price_min',
        ]);

        Service::create($validated);

        return back()->with('success', 'Service berhasil ditambahkan.');
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'estimated_time' => 'required|integer|min:1',
            'price_min' => 'required|integer|min:0',
            'price_max' => 'required|integer|min:0|gte:price_min',
        ]);

        $service->update($validated);

        return back()->with('success', 'Service berhasil diupdate.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return back()->with('success', 'Service berhasil dihapus.');
    }
}