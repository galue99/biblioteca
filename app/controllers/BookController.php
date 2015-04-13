<?php

class BookController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /book
	 *
	 * @return Response
	 */
	public function index()
	{
		$books = Book::paginate(10);
		return View::make('book.index')->with('books', $books);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /book/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('book.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /book
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$book = new Book;
        // Obtenemos la data enviada por el usuario
        $data = Input::all();

        $file = Input::file("cover");

        // Revisamos si la data es válido
        if ($book->isValid($data))
        {

        	$book = new Book(array(
			"isbn"	          =>  Input::get("isbn"),
			"cod_idioma"	  =>  Input::get("cod_idioma"),
			"title"	          =>  Input::get("title"),
			"cota"	          =>  Input::get("cota"),
			"author"	      =>  Input::get("author"),
			"tematica"	      =>  Input::get("tematica"),
			"ubicacion"	      =>  Input::get("ubicacion"),
			"cover"           =>  Input::file("cover")->getClientOriginalName(),//nombre original de la foto
			"disponibilidad"  =>  Input::get("disponibilidad")
		));
            // Si la data es valida se la asignamos al usuario
            //$book->fill($data);
            // Guardamos el usuario
            $book->save();
            $file->move("assets/imgs",$file->getClientOriginalName());
            // Y Devolvemos una redirección a la acción show para mostrar el usuario
            return Redirect::route('book.show', array($book->id));
        }
        else
        {
            // En caso de error regresa a la acción create con los datos y los errores encontrados
			return Redirect::to('/book')->withInput()->withErrors($book->errors);
        }
	}





	/**
	 * Display the specified resource.
	 * GET /book/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$book = Book::find($id);
        
        if (is_null($book)) App::abort(404);
        
      	return View::make('book.show', array('book' => $book));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /book/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$book = Book::find($id);
        if (is_null ($book))
        {
            App::abort(404);
        }
        
        $form_data = array('route' => array('book.update', $book->id), 'method' => 'PATCH');
        $action    = 'Editar';
        
        return View::make('book.edit', compact('book', 'form_data', 'action'));		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /book/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /book/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$book = User::find($id);
        
	        if (is_null ($book))
	        {
	            App::abort(404);
	        }
        
        	$book->delete();

        return Redirect::route('book.index');
	}

}