<div class="alert alert-danger info" style="display:none;">
  <ul></ul>
</div>
<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>
  <div class="col-md-8">
    {!! Form::text('first_name', null, ['class' => 'form-control', 'id' => 'first_name']) !!}
  </div>
</div>
<br><br>
<div class="form-group">
  <label class="col-md-4 control-label">Last Name</label>
  <div class="col-md-8">
    {!! Form::text('last_name', null, ['class' => 'form-control', 'id' => 'last_name']) !!}
  </div>
</div>
<br><br>
<div class="form-group">
  <label class="col-md-4 control-label">Address</label>
  <div class="col-md-8">
    {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) !!}
  </div>
</div>
<br><br>
<div class="form-group">
  <label class="col-md-4 control-label">Email</label>
  <div class="col-md-8">
    {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
  </div>
</div>
<br><br>
<div class="form-actions">
  <div class="row">
    <div class="col-md-offset-4 col-md-9">
      {!! Form::button('Save', array('class' => 'btn btn-primary save')) !!}
      {!! Form::hidden('id', null, ['id' => 'id']) !!}
    </div>
  </div>
</div>
