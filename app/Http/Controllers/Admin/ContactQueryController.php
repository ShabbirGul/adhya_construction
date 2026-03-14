<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactQuery;

class ContactQueryController extends Controller
{
    public function index(Request $request)
    {
        $query = ContactQuery::query();
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%');
        }
        $perPage = $request->get('per_page', 10);
        $queries = $query->latest()->paginate($perPage);
        return view('admin.contacts.index', compact('queries'));
    }

    public function destroy(ContactQuery $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact query deleted successfully');
    }
}
