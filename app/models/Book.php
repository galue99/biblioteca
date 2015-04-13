<?php

class Book extends Eloquent {


	protected $table = 'books';

	public $errors;
    
    public function isValid($data)
    {
        $rules = array(
            'isbn'            => 'required|unique:books',
            'cod_idioma'      => 'required|min:4|max:40',
            'title'           => 'required|min:8',
            'cota'            => 'required|min:8',
            'author'          => 'required|min:8',
            'tematica'        => 'required|min:8',
            'ubicacion'       => 'required|min:8',
            'cover'           => 'required|min:8|unique:books',
            'disponibilidad'  => 'required|min:8|integer'
        );
        
        $validator = Validator::make($data, $rules);
        
        if ($validator->passes())
        {
            return true;
        }
        
        $this->errors = $validator->errors();
        
        return false;
    }


	protected $fillable = array('isbn', 'cod_idioma', 'title', 'cota', 'author', 'tematica', 'ubicacion', 'cover', 'disponibilidad');
}