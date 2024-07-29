<?php

namespace App\Controllers;
use CodeIgniter\Files\File;

class Home extends BaseController
{
    public function index(): string
    {
        //mostrando o diretório atual do projeto
       //echo getcwd();
        //echo '<br>';

        //mostrando o diretório atual do projeto
       // echo $path = $this->request->getPath();
       
       //entrando no diretório public
       echo $path = FCPATH.'public';
       // echo $path = FCPATH.'\\file\\hello.txt';
       echo '<br>';

      // acessando o arquivo que já foi criado no diretório public
       $path2 = $path.'\\file\\hello.txt';
    //    echo $path2;
    
    // instanciando o arquivo
       $file = new \CodeIgniter\Files\File($path2);
       echo $file->getBasename();
       echo '<br>';
       echo $file->getRealPath();
       echo '<br>';
       echo $file->getSize();
       echo '<br>';
       echo $file->getMimeType();
       echo '<br>';
       echo $file->getExtension();
       echo '<br>';
       //dd($file);

        
        return view('welcome_message');
    }
}
