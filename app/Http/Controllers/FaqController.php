<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index()
{
    $faqs = Faq::orderBy('order')->get();
    return view('admin.faq.index', compact('faqs'));
}

public function create()
{
    return view('admin.faq.create');
}

public function store(Request $request)
{
    Faq::create($request->all());
    return redirect()->route('faq.index');
}

public function edit(Faq $faq)
{
    return view('admin.faq.edit', compact('faq'));
}

public function update(Request $request, Faq $faq)
{
    $faq->update($request->all());
    return redirect()->route('faq.index');
}

public function destroy(Faq $faq)
{
    $faq->delete();
    return back();
}

}
