<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{




    public function index(){
        return view('usuarios');
    }




    public function ajax(Request $request){

        switch( $request->proc ){


            
            case 'listar_usuarios':
                //hacemos la consulta
                $usuarios = [
                    ['id'=> 1, 'nombre'=>'Pedro'],
                    ['id'=> 2, 'nombre'=>'Juan'],
                    ['id'=> 3, 'nombre'=>'Manuel'],
                    ['id'=> 4, 'nombre'=>'Elias'],
                    ['id'=> 5, 'nombre'=>'Tony'],
                ];
        
                

                return $usuarios;
            break;





            case 'agregar_usuario':
                //funcion de agregar usuario
                $usuarios = [
                    ['id'=> 1, 'nombre'=>'Pedro'],
                    ['id'=> 2, 'nombre'=>'Juan'],
                    ['id'=> 3, 'nombre'=>'Manuel'],
                    ['id'=> 4, 'nombre'=>'Elias'],
                    ['id'=> 5, 'nombre'=>'Tony'],
                    ['id'=> 6, 'nombre'=>$request->nombre],
                ];
        
                return $usuarios;
            break;



            default:
                return 'La accion que deseas realizar no existe';
            break;
        }


        
        
    }
}
