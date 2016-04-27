<div class="form-group{{ $errors->has('cargo_id') ? ' has-error' : '' }}">
  <label class="col-md-4 control-label">Cargos</label>

  <div class="col-md-3">
    {!! Form::select('cargo_id', $cargos, null, ['class' => 'form-control']) !!}
  </div>
</div>
