<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    

    private $produtos;
    private $categorias;
    public function __construct(Produto $produtos, Categoria $categorias)
    {
        $this->produtos = $produtos;
        $this->categorias = $categorias;
    }
    

    public function index(Request $request)
    {
        $filters = $request->all();
        $filtro = request('categoria_id');
        $categorias = Categoria::all();

        if($filtro){
            $produtos=$this->produtos->where('categoria_id', '=', $filtro)->simplepaginate(12);
        }else{
            $produtos = $this->produtos->simplepaginate(12);
        }
        

        return view('site.loja', compact('produtos', 'categorias', 'filtro', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
