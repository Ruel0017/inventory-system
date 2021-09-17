<?php

namespace App\Http\Controllers;

use App\Models\RequestProduct;
use Illuminate\Http\Request;

class RequestProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $products = RequestProduct::latest()->paginate(5);

        return view('members.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'qty' => 'required',
        ]);

        RequestProduct::create($request->all());

        return redirect()->route('members.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function show(RequestProduct $requestProduct)
    {
        return view('members.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestProduct $requestProduct)
    {
        return view('members.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestProduct $requestProduct)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'qty' => 'required',
        ]);

        //dd($request->{'qty'}); -> get ng qty

        $requestProduct->update($request->all());

        return redirect()->route('members.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestProduct  $requestProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestProduct $requestProduct)
    {
        $requestProduct->delete();

        return redirect()->route('members.index')
            ->with('success', 'Product deleted successfully');
    }
}
