       <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-documento-{{$idobservacion}}">
    
          <div class="modal-dialog">
            <div class="modal-content" >

          @if(count($errors)>0)
          <div class="alert alert-danger">
           <ul>
         @foreach($errors->all() as $error)
         <li>{{$error}}</li>
         @endforeach
         </ul>
         </div>
        @endif

           {!!Form::model($estudio,['route'=>['admin.observacionevaluacion.update',$idobservacion],'method' =>'PUT','files'=>'true'])!!} 
             {{Form::token()}}

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agregar Documento</h4>
              </div>
              <div class="modal-body">

             <input type="hidden" id="asunto" name="asunto" class="form-control" value="{{$asuntoobservacion}}">
             <input type="hidden" id="descripcion" name="descripcion" class="form-control" value="{{$descripcionobservacion}}">
             <input type="hidden" id="proyec" name="proyec" class="form-control" value="{{$proyecto}}">
             <input type="hidden" id="estu" name="estu" class="form-control" value="{{$estudio}}">
             <input type="hidden" id="nestu" name="nestu" class="form-control" value="{{$nombreestudio}}">
             
                <div class="form-group">
                  <label for="descripciondocumento">Descripción</label>
                  <input type="text" id="descripciondocumento" name="descripciondocumento" class="form-control" placeholder="Ingrese Descripción">
                </div>
                <div class="form-group">
                  <label for="url">Subir Documento</label>
                  <input type="file" name="urlobs" id="urlobs" class="form-control" placeholder="Seleccione Documento">
                </div>
             

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">guardar</button>
              </div>
     {!!Form::close()!!}
            
            </div>
            <!-- /.modal-content -->
          </div>
        </div>