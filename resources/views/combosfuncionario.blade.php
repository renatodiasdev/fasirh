<div class="form-group{{ $errors->has('unidade_id') ? ' has-error' : '' }}">
  <label class="col-md-4 control-label">Unidades</label>

  <div class="col-md-3">
    {!! Form::select('unidade_id', $unidades, null, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group{{ $errors->has('setor_id') ? ' has-error' : '' }}">
  <label class="col-md-4 control-label">Setores</label>

  <div class="col-md-3">
    {!! Form::select('setor_id', $setores, null, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group{{ $errors->has('cargo_id') ? ' has-error' : '' }}">
  <label class="col-md-4 control-label">Cargos</label>

  <div class="col-md-3">
    {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group{{ $errors->has('situacao_id') ? ' has-error' : '' }}">
  <label class="col-md-4 control-label">Situações</label>

  <div class="col-md-3">
    {!! Form::select('situacao_id', $situacoes, null, ['class' => 'form-control']) !!}
  </div>
</div>
