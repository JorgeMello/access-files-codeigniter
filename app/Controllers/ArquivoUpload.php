<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ArquivoModel;
use CodeIgniter\HTTP\ResponseInterface;

class ArquivoUpload extends BaseController
{

    public function __construct()
    {
        helper('form', 'session');
    }

    public function index()
    {
        //
        $model = new ArquivoModel();
        $data['imagens'] = $model->findAll();

        return view('listar_arquivos', $data);
    }

    public function criar()
    {
        return view('enviar_arquivo');
    }


    public function upload()
    {
        //dd($this->request->getFile('imagem'));
        $modelArquivo = new ArquivoModel();
        $nome = $this->request->getPost('nome');
        $descricao = $this->request->getPost('descricao');
        $imagem = $this->request->getFile('imagem');
        $nomeAleatorioArquivo = $imagem->getRandomName();
        $imagem->move('uploads', $nomeAleatorioArquivo);

        $ArquivoDados = [
            'nome' => $nome,
            'imagem' => 'uploads/' . $nomeAleatorioArquivo,
            'descricao' => $descricao
        ];

        $modelArquivo->save($ArquivoDados);
        return redirect()->to('/uploadEnvio')->with('sucesso', 'Arquivo enviado com sucesso');
    }

    public function editar()
    {
        //dd($this->request->getPost());
        $id_arquivo = $this->request->getPost('id_arquivo');
        $model = new ArquivoModel();
        $data['arquivo'] = $model->find($id_arquivo);
        //dd($data);
        return view('edidar_arquivo', $data);
    }


    public function atualizar()
    {
        $id_arquivo = $this->request->getPost('id_arquivo');
        $model = new ArquivoModel();
        $arquivo = $model->find($id_arquivo);
        $imagem = $this->request->getFile('imagem');

        if (empty($imagem) == true || $imagem == null || $imagem == '') {
            $data['imagem'] = $arquivo['imagem'];
            //echo 'imagem vazia';
        } else {
            if ($imagem->isValid() && !$imagem->hasMoved()) {
               // dd($imagem);
                if (file_exists($arquivo['imagem'])) {
                    unlink($arquivo['imagem']);
                }
                $imagemNome = $imagem->getRandomName();
                $imagem->move('uploads', $imagemNome);
                $data['imagem'] = 'uploads/' .$imagemNome;
                //echo 'imagem não vazia';
            }
        }

        $data['nome'] = $this->request->getPost('nome');
        $data['descricao'] = $this->request->getPost('descricao');
        $model->update($id_arquivo, $data);
        return redirect()->to('/uploadEnvio');
    }

    public function excluir()
    {
        $id_arquivo = $this->request->getPost('id_arquivo');
        $model = new ArquivoModel();
        $arquivo = $model->find($id_arquivo);
        if (file_exists($arquivo['imagem'])) {
            unlink($arquivo['imagem']);
        }
        $model->delete($id_arquivo);
        return redirect()->to('/uploadEnvio')->with('sucesso', 'Arquivo excluido com sucesso');
    }

    public function download()
    {
        $file = $this->request->getFile('arquivo');
        if ($file->isValid() && !$file->hasMoved()) {
            $file->move('uploads');
        }
        return view('enviar_arquivo');
    }
}
