<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //seleccionar todos los producto
        $productos = Producto::all();
        //mostrar vista de catalogo
        //llevando a la vista la lista de producto
        return view('productos.index')
        ->with('productos' , $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //seleccionar todas las marcas 
        $marcas = Marca::all();
        //seleccionar todas las categorias
        $categorias = Categoria::all();
        //Mostrar vista de nuevo producto
        //emviamdole los datos de marcas y categorias 
        return view('productos.create' )
        ->with('marcas' , $marcas)
        ->with ('categorias', $categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {

        //validaciones en laravel
        //1.establecer reglas de validacion
        $reglas=[
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:5|max:20',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "marca" => 'required',
            "categoria" => 'required'

        ];

        //2. crear elobjeto validador
        $v = Validator::make($r->all() , $reglas);

        //3. validar
        if($v->fails()){
            //si la validacion falló 
            //redirigirme a la vista de create(ruta productos/create)
            //con los mensajes de error
            return redirect('productos/create')
                    ->withErrors($v);
        }else{
            //validacion exitosa
            $archivo=$r->imagen;
        //obtener el nombre original del archivo
        $nombre_archivo = ($archivo->getClientOriginalName());
        //establecer la ubicacion de guardado del archivo
        $ruta = public_path()."/img";
        //mover el archivo de imagen a la ubicacion y nombre deseados
        $archivo->move($ruta , $nombre_archivo);
        //crear nuevo producto 
        $p = new Producto(); 
        //asignar atributos del producto
        $p->nombre = $r->nombre;
        $p->desc = $r->desc;
        $p->precio = $r->precio;
        $p->marca_id = $r->marca;
        $p->categoria_id = $r->categoria;
        $p->imagen = $nombre_archivo;
        //grabar  producto
        $p->save();
        //redirigir a productos (productos/create) 
        //con mensaje de exito
        return redirect('prodcutos/create')
                ->with('mensajito' , 'Producto registrado correctamente');
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show( $producto)
    {
        echo "aqui va el detalle del producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit( $producto)
    {
        echo "aqui va el formulario para actualizar producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
