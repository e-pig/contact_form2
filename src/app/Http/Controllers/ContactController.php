<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if ($request->has('gender') && $request->gender !== '性別') {
            $query->where('gender', $request->gender);
        }

        if ($request->has('contact_type') && $request->contact_type !== '全て') {
            $query->where('contact_type', $request->contact_type);
        }

        if ($request->has('contact_date') && $request->contact_date !== '') {
        $query->whereDate('contact_date', '=', $request->contact_date);
        }

        $contacts = $query->paginate(7);

        return view('admin', compact('contacts'));
    }
}
