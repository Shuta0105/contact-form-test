<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }
    public function confirm(ContactRequest $request)
    {
        $form = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel1',
            'tel2',
            'tel3',
            'address',
            'building',
            'detail'
        ]);
        $form['tel'] = $form['tel1'] . $form['tel2'] . $form['tel3'];
        $category_name = Category::find($request->category_id);
        $form['category_name'] = $category_name['content'];

        return view('confirm', compact('form'));
    }
    public function store(Request $request)
    {
        $contact = $request->only([
            'category_id',
            'first_name',
            'last_name',
            'gender',
            'email',
            'tel',
            'address',
            'building',
            'detail'
        ]);
        Contact::create($contact);
        return view('thanks');
    }
    public function modify(Request $request)
    {
        return redirect('/')->withInput();
    }
}
