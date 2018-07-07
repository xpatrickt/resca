@extends('layouts.administrator')
 {{ Form::open(['route' =>'admin.evaluacion.store'])}}
      {{Form::token()}}
      <input type="hidden" id="estudio" name="estudio" class="form-control" value="{{$estudio}}" >
      <input type="hidden" id="proyecto" name="proyecto" class="form-control" value="{{$proyecto}}" >

        <div class="box-footer">
        
          <button id="botonac" name="botonac" type="submit" class="btn btn-danger" hidden="hidden"></button>
          {!!Form::close()!!}
        </div>

        <script type="text/javascript">
  document.getElementById("botonac").click();

    </script>