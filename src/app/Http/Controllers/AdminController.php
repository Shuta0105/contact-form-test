<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
    public function export(Request $request)
    {
        $query = Contact::with('category');

        if ($request->filled('name_or_email')) {
            $query->where(function ($q) use ($request) {
                $q->where('last_name', 'LIKE', '%' . $request->name_or_email . '%')
                    ->orWhere('first_name', 'LIKE', '%' . $request->name_or_email . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->name_or_email . '%');
            });
        };
        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        };
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        };
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        };

        $contacts = $query->get();

        $response = new StreamedResponse(function () use ($contacts) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                '名前',
                '性別',
                'メールアドレス',
                'お問い合わせの種類'
            ]);

            foreach ($contacts as $contact) {
                $full_name = $contact->last_name . '　' . $contact->first_name;
                $gender_name = $contact->gender == 1 ? '男性' : ($contact->gender == 2 ? '女性' : 'その他');
                fputcsv($handle, [
                    $full_name,
                    $gender_name,
                    $contact->email,
                    $contact->category->content
                ]);
            };

            fclose($handle);
        });

        $filename = 'contacts' . now()->format('Ymd_His') . '.csv';

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set(
            'Content-Disposition',
            "attachment; filename={$filename}"
        );

        return $response;
    }
}
