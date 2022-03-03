<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller
{
    private $produtos;
    private $categorias;

    public function __construct(Produto $produtos, Categoria $categorias)
    {
        $this->produtos = $produtos;
        $this->categorias = $categorias;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produtos->all();
        $categorias = $this->categorias->all();

        return view('produto.index', compact('produtos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = $this->categorias->all();
        return view('produto.crud', compact('categorias'));
    }

    /**                             
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutoRequest $request)
    {
        $data = $request->all();

        $produto = new Produto();
        $produto->name = $request->input('nome');
        $produto->price = $request->input('preco');
        $produto->description = $request->input('descricao');
        $produto->amount = $request->input('quantidade');
        $photo = $request->file('imagem')->store('produtos', 'public');
        $produto->photo = $photo;
        $produto->categoria_id = $request->input('categoria_id');

        $produto->save();

        return redirect('produto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = $this->produtos->find($id);
        $categoria = $this->categorias->find($produto->categoria_id);

        return json_encode([$produto, $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = $this->produtos->find($id);
        $categorias = $this->categorias->all();
        return view('produto.crud', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdutoRequest $request, $id)
    {
        $datas = $request->all();
        $produto = $this->produtos->find($id);

        $produto->update(['name' => $request->input('nome')]);
        $produto->update(['price' => $request->input('preco')]);
        $produto->update(['description' => $request->input('descricao')]);
        $produto->update(['amount' => $request->input('quantidade')]);
        $produto->update(['categoria_id' => $request->input('categoria_id')]);
        
        //Verificando se a imagem é valida
        if ($request->hasFile('imagem')) {
            Storage::delete('public/' . $produto->photo);
            $datas['photo'] = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($datas);
        return redirect('produto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produto = $this->produtos->find($id);
        Storage::drive('public')->delete($produto->photo);

        $produto->delete();
        return redirect(route('produto.index'));
    }
}
