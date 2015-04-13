<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function index()
	{
		return View::make('index');
	}

	public function search()
	{

        if(!empty(Input::get('author'))){
            $result    = Input::get('author');
            $resultado = Book::where('author', 'LIKE', "%$result%")->get();

            if(count($resultado) == 0){
                return View::make('notfound');
            }
            return View::make('result')->with('resultado', $resultado);
        }

        if(!empty(Input::get('title'))){
            $result    = Input::get('title');
            $resultado = Book::where('title', 'LIKE', "%$result%")->get();

            if(count($resultado) == 0){
                return View::make('notfound');
            }
            return View::make('result')->with('resultado', $resultado);
        }
	}

    public function searchs()
    {
        return View::make('search');
    }

	public function postLogin()
	{
		// Guardamos en un arreglo los datos del usuario.

            $email    = Input::get('email');
            $password = Input::get('password');

        // Validamos los datos y además mandamos como un segundo parámetro la opción de recordar el usuario.
        if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
    		return Redirect::to('/dashboard');
		}
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('/ ')
                    ->with('mensaje_errors', 'Tus datos son incorrectos')
                    ->withInput();
	}

	public function showLogin()
    {
        // Verificamos que el usuario no esté autenticado
        if (Auth::check())
        {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('/dashboard');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)
        return View::make('index');
    }

    public function dashboard()
    {
    	return View::make('dashboard');
    }

    public function prestamos()
    {
    	return View::make('prestamos');
    }

    public function prestamo()
    {

    	$resul     = '';
    	$resultado = '';

    	if(!empty(Input::get('cota'))){
    		$result    = Input::get('cota');
    		$resultado = Book::where('cota', 'LIKE', "%$result%")->get();

            if(count($resultado) == 0){
                return View::make('notfound');
            }
    		return View::make('prestamos1')->with('resultado', $resultado);
    	}

    	if(!empty(Input::get('isbn'))){
    		$result    = Input::get('isbn');
    		$resultado = Book::where('isbn', 'LIKE', "%$result%")->get();

            if(count($resultado) == 0){
                return View::make('notfound');
            }
    		return View::make('prestamos1')->with('resultado', $resultado);
    	}

   	
    	//return View::make('prestamos');
    }

    public function logout()
    {
        Auth::logout();
        
        return Redirect::to('/');
    }


    public function reporteUsuarios()
    {
        $users = User::all();

        $html = View::make("reporte.user")->with('users',$users);

        return PDF::load($html, '11x17', 'portrait')->download('usuarios');;

        //return View::make("reporte.user")->with('users',$users); 
    }




}
