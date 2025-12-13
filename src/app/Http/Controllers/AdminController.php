<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::with('category')->paginate(7);
        return view('admin', compact('contacts', 'categories'));
    }
    public function search(Request $request)
    {
        $categories = Category::all();
        $contacts = Contact::with('category')
            ->where(function ($q) use ($request) {
                $search = $request->name_or_email;

                $q->where('last_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('first_name', 'LIKE', '%' . $search . '%')
                    ->orWhere('email', 'LIKE', '%' . $search . '%');
            })
            ->when($request->gender, function ($q) use ($request) {
                $q->where('gender', $request->gender);
            })
            ->when($request->category_id, function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            })
            ->when($request->date, function ($q) use ($request) {
                $q->whereDate('created_at', $request->date);
            })
            ->paginate(7);
        return view('admin', compact('contacts', 'categories'));
    }
    public function reset()
    {
        return redirect('/admin');
    }
    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return back();
    }
}
