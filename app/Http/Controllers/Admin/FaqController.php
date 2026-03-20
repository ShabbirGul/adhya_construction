<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();

        if ($request->has('search')) {
            $query->where('question', 'like', '%' . $request->search . '%');
        }

        $perPage = $request->get('per_page', 10);
        $faqs = $query->latest()->paginate($perPage);

        return view('admin.faqs.index', compact('faqs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'status' => 'required|boolean',
        ]);

        Faq::create($validatedData);

        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        return response()->json($faq);
    }

    public function update(Request $request, Faq $faq)
    {
        $validatedData = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'status' => 'required|boolean',
        ]);

        $faq->update($validatedData);

        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
