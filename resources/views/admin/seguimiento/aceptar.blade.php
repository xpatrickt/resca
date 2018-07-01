 {{ Form::open(['route' =>'admin.seguimiento.store'])}}
      {{Form::token()}}
      <input type="hidden" id="estudio" name="estudio" class="form-control" value="{{$estudio}}" >
      <input type="hidden" id="proyecto" name="proyecto" class="form-control" value="{{$proyecto}}" >

        <div class="box-footer">
          <button name="aceptar" type="submit" class="btn btn-danger">Aceptar</button>
          {!!Form::close()!!}
        </div>

        <script type="text/javascript">
        window.onload = function () {
          alert("entro");
        document.$this.aceptar.click();
        }
    </script>