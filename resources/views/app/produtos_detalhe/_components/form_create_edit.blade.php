@if (isset($produtos_detalhe->id))
  <form method="post" action="{{ route('produtos-detalhe.update', ['produtos_detalhe' => $produtos_detalhe->id])}}">
    @csrf
    @method('PUT')
@else
    <form method="post" action="{{ route('produtos-detalhe.store')}}">
      @csrf
@endif
  <input type="text" name="produto_id" value="{{ $produtos_detalhe->produto_id ?? old('produto_id') }}" placeholder="ID do Produto" class="borda-preta">
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
  <input type="text" name="comprimento" value="{{ $produtos_detalhe->comprimento ?? old('comprimento') }}" placeholder="Comprimento" class="borda-preta">
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}
  <input type="text" name="largura" value="{{ $produtos_detalhe->largura ?? old('largura') }}" placeholder="Largura" class="borda-preta">
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}
  <input type="text" name="altura" value="{{ $produtos_detalhe->altura ?? old('altura') }}" placeholder="Altura" class="borda-preta">
  {{ $errors->has('altura') ? $errors->first('altura') : '' }}
  <select name="unidade_id">
    <option>--Selecione a unidade de medida--</option>
      
    @foreach ($unidades as $unidade)
        <option value="{{ $unidade->id }}" {{ $produtos_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }}</option>
@endforeach
  </select>
  {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
  <button type="submit" class="borda-preta">Cadastrar</button>
</form>