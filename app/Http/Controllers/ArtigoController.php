<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Imagem_artigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class ArtigoController extends Controller
{
    public function create(Request $req)
    {

        $req->merge(['val' => str_replace(',', '.', $req->input('val'))]);
        $req->merge(['uso_art' => str_replace(',', '.', $req->input('uso_art'))]);

        $validator = Validator::make($req->all(), [
            'nome_art' => 'required|string|max:100',
            'val' => 'nullable|numeric|min:0',
            'pref' => 'nullable|string|max:50',
            'catepropo' => 'required|string|max:10',
            'condpropo' => 'required|string|max:8',
            'uso_art' => 'required|numeric|min:1|max:31',
            'uso_art2' => 'required|in:ano(s),mês(es),dia(s)',
            'img_principal' => 'required|image|max:10240',
            'img' => 'max:10240'
        ], [
            'nome_art.required' => 'O campo nome do artigo é obrigatório.',
            'catepropo.required' => 'O campo categoria é obrigatório.',
            'condpropo.required' => 'O campo condição é obrigatório.',
            'uso_art.required' => 'O campo tempo de uso é obrigatório.',
            'uso_art2.required' => 'O campo tempo de uso é obrigatório.',

            'nome_art.string' => 'O campo nome deve conter apenas texto.',
            'val.numeric' => 'O campo valor sugerido deve conter apenas números.',
            'pref.string' => 'O campo preferência de troca deve conter apenas texto.',
            'catepropo.string' => 'O campo categoria deve conter apenas texto.',
            'condpropo.string' => 'O campo condição deve conter apenas texto.',
            'uso_art.numeric' => 'O campo tempo de uso deve conter apenas números.',
            'img_principal.image' => 'Tipo de arquivo incorreto inserido no campo da imagem.',

            'nome_art.max' => 'O campo nome deve conter no maximo 100 caracteres.',
            'pref.max' => 'O campo preferência de troca deve conter no maximo 50 caracteres.',
            'catepropo.max' => 'O campo categoria deve conter no maximo 10 caracteres.',
            'condpropo.max' => 'O campo condição deve conter no maximo 8 caracteres.',
            'uso_art.min' => 'O campo tempo de uso deve conter no maximo 1 caracteres.',
            'uso_art.max' => 'O campo tempo de uso deve conter no maximo 31 caracteres.',
            'img_principal.max' => 'O arquivo da imagem é muito pesado.',
            'img.max' => 'Um arquivo das imagens é muito pesado.',

            'val.min' => 'O campo valor sugerido deve conter um número maior que 0.',

        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

        $artg = new Artigo;
        $artg->nome_artigo = $req->nome_art;
        if($req->val > 0){
            $artg->valor_sugerido_artigo = $req->val;
        }
        $artg->preferencia_troca_artigo = $req->pref;
        $artg->categoria_artigo = $req->catepropo;
        $artg->condicao_artigo = $req->condpropo;
        $artg->id_usuario_ofertante = $req->user()->id;
        $artg->tempo_uso_artigo = $req->uso_art." ".$req->uso_art2;
        $artg->status_artigo = 0;

        $artg->save();

        $img = new Imagem_artigo;

        $img->imagem_principal = 1;

        $imagem = "image/users-img/" . uniqid("", true) . "." . pathinfo($_FILES['img_principal']['name'], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['img_principal']["tmp_name"], $imagem);
        $img->endereco_imagem = $imagem;

        $img->id_artigo = $artg->id;

        $img->save();

        if ($req->img) {
            foreach ($_FILES['img']['name'] as $key => $name) {
                if ($name != "") {
                    $img = new Imagem_artigo;
                    $img->imagem_principal = 0;

                    $imagem = "image/users-img/" . uniqid("", true) . "." . pathinfo($name, PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['img']["tmp_name"][$key], $imagem);
                    $img->endereco_imagem = $imagem;

                    $img->id_artigo = $artg->id;
                    $img->save();
                }
            }
        }

        return redirect()->to('/meusartigos');
    }

    public function select(Request $req) //apresentar meus próprios anúncios
    {
        $artigo = Artigo::where('id_usuario_ofertante', $req->user()->id)
            ->whereDoesntHave('proposta', function ($query) {
                $query->whereHas('acordo', function ($query) {
                    $query->where('status_acordo', 4); // Excluir artigos com acordos bem-sucedidos
                });
            })->with('imagens')->get();
        $artigo_sucedido = Artigo::where('id_usuario_ofertante', $req->user()->id)
        ->whereHas('proposta', function ($query) {
            $query->whereHas('acordo', function ($query) {
                $query->where('status_acordo', 4); // Excluir artigos com acordos bem-sucedidos
            });
        })->with('imagens')->get();
        return view('meusartigos', compact('artigo', 'artigo_sucedido'));
    }

    public function search(Request $req)
    {
        // Subconsulta para contar acordos bem-sucedidos por usuário
        $subQuery = DB::table('acordos')
            ->join('propostas', 'acordos.id_proposta', '=', 'propostas.id')
            ->where('acordos.status_acordo', 4)
            ->select('propostas.id_usuario_int', DB::raw('COUNT(*) as trocas_bem_sucedidas'))
            ->groupBy('propostas.id_usuario_int');
    
        // Consulta principal
        $artg = Artigo::where('nome_artigo', 'LIKE', $req->search . '%')
            ->whereHas('user', function ($query) {
                $query->whereNull('estado_conta'); // Apenas usuários com estado da conta como null
            })
            ->whereDoesntHave('proposta', function ($query) {
                $query->whereHas('acordo', function ($query) {
                    $query->where('status_acordo', 4); // Excluir artigos com acordos bem-sucedidos
                });
            })
            ->where('status_artigo', '0')
            ->with(['imagens', 'user'])
            ->leftJoinSub($subQuery, 'acordos_count', function ($join) {
                $join->on('artigos.id_usuario_ofertante', '=', 'acordos_count.id_usuario_int');
            })
            ->orderByDesc('acordos_count.trocas_bem_sucedidas') // Ordenar pela quantidade de trocas bem-sucedidas
            ->orderByDesc('artigos.created_at') // Ordenar por data de criação
            ->paginate(4);
    
    return view('announcements', [
        'artigo' => $artg,
        'searchTerm' => $req->search, // Passa o termo de pesquisa para a view
    ]);
    }

    public function list(Request $req)
    {
    // Subconsulta para contar acordos bem-sucedidos por usuário
    $subQuery = DB::table('acordos')
        ->join('propostas', 'acordos.id_proposta', '=', 'propostas.id')
        ->where('acordos.status_acordo', 4)
        ->select('propostas.id_usuario_int', DB::raw('COUNT(*) as trocas_bem_sucedidas'))
        ->groupBy('propostas.id_usuario_int');

    // Consulta principal para listar artigos
    $artigo = Artigo::select('artigos.*')
        ->join('users', 'users.id', '=', 'artigos.id_usuario_ofertante')
        ->leftJoinSub($subQuery, 'acordos_count', function ($join) {
            $join->on('users.id', '=', 'acordos_count.id_usuario_int');
        })
        ->whereNull('users.estado_conta') // Exclui artigos de usuários inativados
        ->whereDoesntHave('proposta', function ($query) {
            $query->whereHas('acordo', function ($query) {
                $query->where('status_acordo', 4); // Excluir artigos com acordos bem-sucedidos
            });
        })
        ->where('status_artigo', '0')
        ->with('imagens', 'user') // Carrega relações de imagens e usuário
        ->orderByDesc('acordos_count.trocas_bem_sucedidas') // Prioriza usuários com mais trocas bem-sucedidas
        ->orderByDesc('artigos.created_at') // E depois os mais recentes
        ->paginate(4);

        if (null !== $req->user() && $req->user()->email == 'trocatecaltda@gmail.com') {
            return view('adm.announcements', compact(['artigo']));
        }

        return view('welcome')->with('artigo', $artigo);
    }

    public function edit(Request $req)
    {
        $artigo = Artigo::with('imagens')->where('id', $req->id)->first();
        $reported = !Artigo::where('id', $req->id)
                ->whereHas('denuncia_artigo')
                ->exists();
        return view('editannounce', compact('artigo', 'reported'));
    }

    public function update(Request $req)
    {
        $req->merge(['val' => str_replace(',', '.', $req->input('val'))]);
        $req->merge(['tempo_uso_artigo' => str_replace(',', '.', $req->input('tempo_uso_artigo'))]);

        $validator = Validator::make($req->all(), [
            'nome_artigo' => 'required|string|max:100',
            'valor_sugerido_artigo' => 'nullable|numeric|min:0',
            'preferencia_troca_artigo' => 'nullable|string|max:50',
            'categoria_artigo' => 'required|string|max:10',
            'condicao_artigo' => 'required|string|max:8',
            'tempo_uso_artigo' => 'required|numeric|min:1|max:31',
            'tempo_uso_artigo2' => 'required|in:ano(s),mês(es),dia(s)',
            'img_principal' => 'image|max:10240',
            'img' => 'max:10240'
        ], [
            'nome_artigo.required' => 'O campo nome do artigo é obrigatório.',
            'categoria_artigo.required' => 'O campo categoria é obrigatório.',
            'condicao_artigo.required' => 'O campo condição é obrigatório.',
            'tempo_uso_artigo.required' => 'O campo tempo de uso é obrigatório.',
            'tempo_uso_artigo2.required' => 'O campo tempo de uso é obrigatório.',

            'nome_artigo.string' => 'O campo nome deve conter apenas texto.',
            'valor_sugerido_artigo.numeric' => 'O campo valor sugerido deve conter apenas números.',
            'preferencia_troca_artigo.string' => 'O campo preferência de troca deve conter apenas texto.',
            'categoria_artigo.string' => 'O campo categoria deve conter apenas texto.',
            'condicao_artigo.string' => 'O campo condição deve conter apenas texto.',
            'img_principal.image' => 'Tipo de arquivo incorreto inserido no campo da imagem.',
            'tempo_uso_artigo.numeric' => 'O campo tempo de uso deve conter apenas números.',

            'nome_artigo.max' => 'O campo nome deve conter no maximo 100 caracteres.',
            'preferencia_troca_artigo.max' => 'O campo preferência de troca deve conter no maximo 50 caracteres.',
            'categoria_artigo.max' => 'O campo categoria deve conter no maximo 10 caracteres.',
            'condicao_artigo.max' => 'O campo condição deve conter no maximo 8 caracteres.',
            'img_principal.max' => 'O arquivo da imagem é muito pesado.',
            'img.max' => 'Um arquivo das imagens é muito pesado.',
            'tempo_uso_artigo.max' => 'O campo tempo de uso deve conter no maximo 31 caracteres.',

            'valor_sugerido_artigo.min' => 'O campo valor sugerido deve conter um número maior que 0.',
            'tempo_uso_artigo.min' => 'O campo tempo de uso deve conter no maximo 1 caracteres.',
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

        if(!isEmpty(Artigo::with('denuncia_artigo')->get())){
            return redirect()->back();
        }

        $artg = Artigo::find($req->id);
        $artg->update(
            [
                "nome_artigo" => $req->nome_artigo,
                "valor_sugerido_artigo" => $req->valor_sugerido_artigo,
                "preferencia_troca_artigo" => $req->preferencia_troca_artigo,
                "categoria_artigo" => $req->categoria_artigo,
                "condicao_artigo" => $req->condicao_artigo,
                "tempo_uso_artigo" => $req->tempo_uso_artigo." ".$req->tempo_uso_artigo2

            ]
        );

        if ($req->hasFile('img_principal')) {
            $img = new Imagem_artigo;

            $img = $img::where('imagem_principal', 1);

            $imagem = "image/users-img/" . uniqid("", true) . "." . pathinfo($_FILES['img_principal']['name'], PATHINFO_EXTENSION);
            move_uploaded_file($_FILES['img_principal']["tmp_name"], $imagem);
            $img->update([
                "endereco_imagem" => $imagem
            ]);
        }

        if ($req->hasFile('img')) {
            foreach ($_FILES['img']['name'] as $key => $name) {
                if ($name != "") {
                    $img = new Imagem_artigo;
                    $img->imagem_principal = 0;

                    $imagem = "image/users-img/" . uniqid("", true) . "." . pathinfo($name, PATHINFO_EXTENSION);
                    move_uploaded_file($_FILES['img']["tmp_name"][$key], $imagem);
                    $img->endereco_imagem = $imagem;

                    $img->id_artigo = $artg->id;
                    $img->save();
                }
            }
        }

        return redirect()->to('/meusartigos');
    }

    public function delete(Request $req)
    {
        $artg = Artigo::find($req->id);
        $artg->delete();
        return redirect()->to('/meusartigos');
    }

    /*ver dados do artigo do usuário ofertante*/
    public function viewAnnounce($id_artigo, Request $req, $denun_id = NULL)
    {
        $artigo = Artigo::with(['imagens', 'user'])->findOrFail($id_artigo);

        $meusartigos = Artigo::where('id_usuario_ofertante', $req->user()->id)
            ->whereDoesntHave('proposta', function ($query) {
                $query->whereHas('acordo', function ($query) {
                    $query->where('status_acordo', 4); // Excluir artigos com acordos bem-sucedidos
                });
            })->with('imagens')->paginate(4);

        
        if (isset($denun_id))
        return view('adm.viewannounce', compact('artigo','denun_id'));

        return view('viewannounce', compact('artigo', 'meusartigos'));
    }

    public function filter($type, $value, Request $req)
    {
    // Inicializa a consulta base para evitar repetição de código
    $artigoQuery = Artigo::whereDoesntHave('proposta', function ($query) {
            $query->whereHas('acordo', function ($query) {
                $query->where('status_acordo', 4); // Excluir artigos com acordos bem-sucedidos
            });
        })
        ->where('status_artigo', '0')
        ->wherehas('user', function ($query){
            $query->whereNull('estado_conta');
        }) // Exclui artigos de usuários inativados
        ->with('imagens'); // Carregar a relação 'imagens'

    // Filtra de acordo com o tipo
    if ($type == 'categoria') {
        $artigoQuery->where('categoria_artigo', $value);

    } elseif ($type == 'condicao') {
        $artigoQuery->where('condicao_artigo', 'LIKE', $value);

    } elseif ($type == 'local') {
        if(!isset($req->user()->id)){
            return redirect()->back();
        }

        if($value == 'minha cidade'){
            $artigoQuery->whereHas('user', function ($query) use ($req) {
                $query->where('cidade', $req->user()->cidade)
                ->where('estado', $req->user()->estado);
            })->where('id_usuario_ofertante', '!=' , $req->user()->id);
        }else{
            $artigoQuery->whereHas('user', function ($query) use ($req) {
                $query->where('estado', $req->user()->estado);
            })->where('id_usuario_ofertante', '!=' , $req->user()->id);
        }

    }

    // Executa a consulta e obtém os resultados
    $artigo = $artigoQuery->paginate(4);

    // Retorna a view com os artigos filtrados
    return view('announcements', compact(['artigo', 'type', 'value'])); 
    }
}
