<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Token;
use Illuminate\Http\Request;

/**
 * Class TokenController
 * @package App\Http\Controllers
 */
class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:tokens-list',  ['only' => ['index']]);
        $this->middleware('permission:tokens-view',  ['only' => ['show']]);
        $this->middleware('permission:tokens-create',['only' => ['create','store']]);
        $this->middleware('permission:tokens-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:tokens-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tokens = Token::get();

        return view('admin.token.index', compact('tokens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $token = new Token();
        return view('admin.token.create', compact('token'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $token = Token::create($request->all());
        return redirect()->route('tokens.index')
            ->with('success', 'Token created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $token = Token::find($id);

        return view('admin.token.show', compact('token'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $token = Token::find($id);

        return view('admin.token.edit', compact('token'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Token $token
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Token $token)
    {
        $token->update($request->all());

        return redirect()->route('tokens.index')
            ->with('success', 'Token updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $token = Token::find($id)->delete();

        return redirect()->route('tokens.index')
            ->with('success', 'Token deleted successfully');
    }
}
