<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AutenticacaoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [\App\Http\Controllers\PrincipalController::class,'principal'])
->name('site.index');

Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class,'sobreNos'])->name('site.sobrenos');

Route::get('/contato', [\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [\App\Http\Controllers\LoginController::class,'login'])->name('site.login');
Route::post('/login', [\App\Http\Controllers\LoginController::class,'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao')->prefix('/app')->group(function(){
  Route::get('/home', [\App\Http\Controllers\HomeController::class,'index'])->name('app.home');
  Route::get('/sair', [\App\Http\Controllers\LoginController::class,'sair'])->name('app.sair');
 
  Route::get('/fornecedor', [\App\Http\Controllers\FornecedorController::class,'index'])->name('app.fornecedor');
  Route::post('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class,'listar'])->name('app.fornecedor.listar');
  Route::get('/fornecedor/listar', [\App\Http\Controllers\FornecedorController::class,'listar'])->name('app.fornecedor.listar');
  Route::get('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
  Route::post('/fornecedor/adicionar', [\App\Http\Controllers\FornecedorController::class,'adicionar'])->name('app.fornecedor.adicionar');
  Route::get('/fornecedor/editar/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class,'editar'])->name('app.fornecedor.editar');
  Route::get('/fornecedor/excluir/{id}/{msg?}', [\App\Http\Controllers\FornecedorController::class,'excluir'])->name('app.fornecedor.excluir');
  Route::resource('produto', \App\Http\Controllers\ProdutoController::class);  
  Route::get('produto/edit/{produto}', [\App\Http\Controllers\ProdutoController::class,'edit'])->name('app.fornecedor.edit');
  Route::resource('produtos-detalhe', \App\Http\Controllers\ProdutosDetalheController::class); 
  Route::resource('cliente', \App\Http\Controllers\ClienteController::class);
  Route::resource('pedido', \App\Http\Controllers\PedidoController::class);
  Route::get('pedido-produto/create/{pedido}', [\App\Http\Controllers\PedidoProdutoController::class,'create'])->name('pedido-produto.create');
  Route::post('pedido-produto/store/{pedido}', [\App\Http\Controllers\PedidoProdutoController::class,'store'])->name('pedido-produto.store');
  Route::delete('pedido-produto.destroy/{pedidoProduto}/{pedido_id}', [\App\Http\Controllers\PedidoProdutoController::class,'destroy'])->name('pedido-produto.destroy');
  Route::get('cliente/excluir/{id}', [\App\Http\Controllers\ClienteController::class,'excluir'])->name('cliente.excluir');
  Route::get('cliente/edit/{cliente}', [\App\Http\Controllers\ClienteController::class,'edit'])->name('app.fornecedor.edit');
  

});

Route::get('/teste/{p1}/{p2}', [\App\Http\Controllers\TesteControler::class,'teste'])->name('teste');

Route::fallback(function(){
  echo 'A rota acessada não existe. 
  <a href="'.route ('site.index').'">Clique aqui</a>
   para ir para página principal';
});

// Route::get(
//   '/contato/{nome}/{categoria_id}',
//   function(
//     string $nome = 'Desconhecido',
//     int $categoria_id = 1
//   ){
//     echo "Estamos aqui: $nome - $categoria_id";
//   }
// )->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');