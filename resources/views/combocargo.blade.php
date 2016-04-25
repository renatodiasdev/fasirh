<div class="form-group{{ $errors->has('setor_id') ? ' has-error' : '' }}">
  <label class="col-md-4 control-label">Setores</label>

  <div class="col-md-3">
    {!! Form::select('setor_id', $setores, null, ['class' => 'form-control']) !!}
  </div>
</div>
