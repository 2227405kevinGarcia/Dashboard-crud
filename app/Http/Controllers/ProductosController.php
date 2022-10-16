<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('admin.producto.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.producto.create', compact('categorias'));
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
            'nombre' => 'required',
            'caracteristica' => 'required',
            'genero' => 'required',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|integer|min:0',
            'imagen' => 'required|image|mimes:jpeg,png,svg|max:1024',
        ]);

        $producto = $request->all();
        try {

            if ($imagen = $request->file('imagen')) {
                $ruta = 'img-product/';
                $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
                $imagen->move($ruta, $imagenProducto);
                $producto['imagen'] = "$imagenProducto";
            }
            Producto::create($producto);
            return redirect()->route('productos')->with('success', 'Producto creado correctamente');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto == null) {
            return redirect()->route('productos');
        }

        return view('admin.producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto == null) {
            return redirect()->route('productos');
        }

        $categorias = Categoria::all();
        return view('admin.producto.edit', compact('producto', 'categorias'));
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
        $request->validate([
            'nombre' => 'required',
            'caracteristica' => 'required',
            'genero' => 'required',
            'stock' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
            'categoria_id' => 'required|integer|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,svg|max:1024',
        ]);

        $producto = Producto::findOrFail($id);

        if ($producto == null) {
            return redirect()->route('productos');
        }

        try {

            if ($imagen = $request->file('imagen')) {
                $ruta = 'img-product/';
                $imagenProducto = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
                $imagen->move($ruta, $imagenProducto);
                $producto['imagen'] = "$imagenProducto";
            }
            $producto->nombre = $request->get('nombre');
            $producto->caracteristica = $request->get('caracteristica');
            $producto->genero = $request->get('genero');
            $producto->stock = $request->get('stock');
            $producto->precio = $request->get('precio');
            $producto->categoria_id = $request->get('categoria_id');
            $producto->update();

            return redirect()->route('productos')->with('success', 'Producto actualizado correctamente');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);

        if ($producto == null) {
            return redirect()->route('productos');
        }
        try {
            $producto->delete();
            return redirect()->route('productos')->with('success', 'Producto eliminado correctamente');
        } catch (\Throwable $th) {
            return redirect()->route('productos')->with('error', $th->getMessage());
        }
    }
}
