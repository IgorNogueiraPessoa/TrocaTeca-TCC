<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Proposta;
use App\Models\Mensagem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class PropostaController extends Controller
{
    public function create(Request $req){

        $req->merge(['uso_art' => str_replace(',', '.', $req->input('uso_art'))]);

        $validator = Validator::make($req->all(), [
            'nome_art' => 'required|string|max:100',
            'catepropo' => 'required|string|max:10',
            'condpropo' => 'required|string|max:8',
            'uso_art' => 'required|numeric|min:1|max:31',
            'uso_art2' => 'required|in:ano(s),mês(es),dia(s)',
            'img_principal' => 'required|image|max:10240',
        ], [
            'nome_art.required' => 'O campo nome do artigo é obrigatório.',
            'catepropo.required' => 'O campo categoria é obrigatório.',
            'condpropo.required' => 'O campo condição é obrigatório.',
            'uso_art.required' => 'O campo tempo de uso é obrigatório.',
            'uso_art2.required' => 'O campo tempo de uso é obrigatório.',
            'img_principal.required' => 'O campo da imagem é obrigatório.',

            'nome_art.string' => 'O campo nome deve conter apenas texto.',
            'catepropo.string' => 'O campo categoria deve conter apenas texto.',
            'condpropo.string' => 'O campo condição deve conter apenas texto.',
            'uso_art.numeric' => 'O campo tempo de uso deve conter apenas números.',
            'img_principal.image' => 'Tipo de arquivo incorreto inserido no campo da imagem.',

            'nome_art.max' => 'O campo nome deve conter no maximo 100 caracteres.',
            'catepropo.max' => 'O campo categoria deve conter no maximo 10 caracteres.',
            'condpropo.max' => 'O campo condição deve conter no maximo 8 caracteres.',
            'uso_art.min' => 'O campo tempo de uso deve conter no maximo 1 caracteres.',
            'uso_art.max' => 'O campo tempo de uso deve conter no maximo 31 caracteres.',
            'img_principal.max' => 'O arquivo da imagem é muito pesado.',

            'val.min' => 'O campo valor sugerido deve conter um número maior que 0.',

        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

        $prst = new Proposta();

        $prst->id_artigo = $req->id_artigo;
        $prst->nome_proposta = $req->nome_art;
        $prst->categoria_proposta = $req->catepropo;
        $prst->condicao_proposta = $req->condpropo;
        $prst->tempo_uso_proposta = $req->uso_art." ".$req->uso_art2;

        $imagem = "image/users-img/". uniqid("", true) . "." . pathinfo($_FILES['img_principal']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['img_principal']["tmp_name"], $imagem);
        $prst->endereco_img_prop = $imagem;

        $prst->id_usuario_int = $req->user()->id;
        $prst->status_proposta = 0; //proposta pendente

        $prst->save();

        $mensagens = new Mensagem();

        $mensagem = "Proposta: ".$prst->nome_proposta."
Categoria: ".$prst->categoria_proposta." 
Tempo de uso: ".$prst->tempo_uso_proposta;

        $mensagens->id_usuario = $prst->id_usuario_int;
        $mensagens->id_proposta = $prst->id;
        $mensagens->conteudo_mensagem = $mensagem;
        $mensagens->endereco_anexo = $prst->endereco_img_prop;
        $mensagens->visto = 0;

        $mensagens->save();

        return redirect('/mep');

    }

    public function clone(Request $req, $id_artigo, $id)
    {
        $prst = new Proposta();

        $artg = new Artigo();
        $artg = $artg::find($id_artigo);

        $prst->id_artigo = $id;
        $prst->nome_proposta = $artg->nome_artigo;
        $prst->categoria_proposta = $artg->categoria_artigo;
        $prst->condicao_proposta = $artg->condicao_artigo;
        $prst->tempo_uso_proposta = $artg->tempo_uso_artigo;

        foreach($artg->imagens as $imagem){
            if($imagem->imagem_principal){
                $prst->endereco_img_prop = $imagem->endereco_imagem;
                break;
            }
        }        

        $prst->id_usuario_int = $req->user()->id;
        $prst->status_proposta = 0; //proposta pendente

        $prst->save();

        $mensagens = new Mensagem();

        $mensagem = "Proposta: ".$prst->nome_proposta."
Categoria: ".$prst->categoria_proposta." 
Tempo de uso: ".$prst->tempo_uso_proposta;

        $mensagens->id_usuario = $prst->id_usuario_int;
        $mensagens->id_proposta = $prst->id;
        $mensagens->conteudo_mensagem = $mensagem;
        $mensagens->endereco_anexo = $prst->endereco_img_prop;
        $mensagens->visto = 0;

        $mensagens->save();

        return redirect('/mep');
    }

    public function show(Request $req){
        $prst = new Proposta();
        $prst = $prst::where('id_usuario_int', $req->user()->id)->orWhereHas('artigo', function ($query) use ($req) {
            $query->where('id_usuario_ofertante', $req->user()->id);
        })->with(['artigo.user'])->orderBy('created_at', 'desc')->paginate(4);

        return view('mensagensepropostas')->with('propostas', $prst);
    }

    public function showPropose(Request $req, $id){
        $propostas = Proposta::where('id', $id)->with('acordo')->with(['artigo.user'])->with('mensagem')->with('user')->get();

        return view('chat', compact('propostas', 'id'));
    }

    public function showMessage(Request $req, $id){
        $propostas = Proposta::where('id', $id)->with('acordo')->with(['artigo.user'])->with('mensagem')->with('user')->get();
        foreach($propostas as $prop){
            foreach($prop->mensagem as $msgs){
                if($msgs->id_usuario != $req->user()->id){
                    $msgs->visto = true;
                    $msgs->save();
                }
            }
        }

        return view('messages', compact('propostas', 'id'));
    }

    public function updateStatusCancel($id){

        $propostas = new Proposta();
        $propostas = $propostas::where('id', $id)->get();

        foreach ($propostas as $proposta) {
            $proposta->status_proposta = 3; //proposta cancelada
            $proposta->save();
        }

        return redirect('/mep');
    }

    public function updateStatusChatting($id){

        $propostas = new Proposta();
        $propostas = $propostas::where('id',$id)->get();

        foreach ($propostas as $proposta) {
            $proposta->status_proposta = 1; //proposta em andamento
            $proposta->save();
        }

        return redirect()->back();
    }
}
