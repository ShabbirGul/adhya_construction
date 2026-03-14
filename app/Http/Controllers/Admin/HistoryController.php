<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index(Request $request)
    {
        $query = History::query();
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }
        $perPage = $request->get('per_page', 10);
        $histories = $query->latest()->paginate($perPage);
        return view('admin.histories.index', compact('histories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|string|max:10',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = 'storage/' . $request->file('image')->store('histories', 'public');
        }

        History::create($data);
        return redirect()->route('histories.index')->with('success', 'History record created successfully');
    }

    public function update(Request $request, History $history)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|string|max:10',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->all();
        if ($request->hasFile('image')) {
            if ($history->image && strpos($history->image, 'storage/') === 0) {
                Storage::disk('public')->delete(str_replace('storage/', '', $history->image));
            }
            $data['image'] = 'storage/' . $request->file('image')->store('histories', 'public');
        }

        $history->update($data);
        return redirect()->route('histories.index')->with('success', 'History record updated successfully');
    }

    public function destroy(History $history)
    {
        if ($history->image && strpos($history->image, 'storage/') === 0) {
            Storage::disk('public')->delete(str_replace('storage/', '', $history->image));
        }
        $history->delete();
        return redirect()->route('histories.index')->with('success', 'History record deleted successfully');
    }
}
