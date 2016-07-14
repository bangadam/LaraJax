<?php
$encrypter = app('Illuminate\Encryption\Encrypter');
$encrypted_token = $encrypter->encrypt(csrf_token());
?>

@extends('layouts.app')

@section('content')
  <div class="container">
    <button class="btn-success btn-sm" id="btn-add"><i class="fa fa-plus-circle"></i> Add</button><br><br>
    <div class="alert alert-danger info" style="display:none;">
      <ul></ul>
    </div>
    <div class="row">
      <table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody id="crud-list" name="crud-list">
          @foreach($crud as $cruds)
            <tr id="crud{{ $cruds->id }}">
              <td>{{ $cruds->first_name }}</td>
              <td>{{ $cruds->last_name }}</td>
              <td>{{ $cruds->address }}</td>
              <td>{{ $cruds->email }}</td>
              <td>
                <button class="btn btn-xs btn-primary open-modal" value="{{ $cruds->id }}"><i class="glyphicon glyphicon-edit"></i> Edit</button>
                <button class="btn btn-xs btn-danger delete" value="{{ $cruds->id }}"><i class="glyphicon glyphicon-trash"></i> Delete</button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog" tabindex="-1" aria-labelledit="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title" id="myModalLabel">Crud Form</h4>
            </div>
          <div class="modal-body">
            {!! Form::open(array('id' => 'frm', 'name' => 'frm', 'class' => 'form-hosrizontal')) !!}
            <input type="hidden" id="token" value="{{ $encrypted_token }}">
            @include('crud.form')
            {!! Form::close() !!}
          </div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/dt/dt-1.10.11/datatables.min.js"></script>
{!! Html::script("/js/app.js") !!}
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
</script>
