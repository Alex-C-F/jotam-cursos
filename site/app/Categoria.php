<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    public function cursos(){
    	//indica que categorias possuem muitos posts
    	return $this->hasMany('App\Curso');
    }
}
