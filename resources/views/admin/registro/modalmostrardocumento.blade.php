        <div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-mostrardocumento">
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title"><label for="titulodocumento"></label></h4>
              </div>


              <div class="modal-body">

             <input type="hidden" id="estudiotext2" name="estudiotext2" class="form-control" >

            <table id="tabladocumento" class="table table-bordered table-striped">
               
                
             </table>

             {!!Form::open(array('url'=>'admin/proyecto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
                {{Form::token()}}

               <div class="col-md-8">
                <div class="form-group">
                  <label for="descripciondocumento">Descripción</label>
                  <input type="text" id="descripciondocumento" name="descripciondocumento" class="form-control" placeholder="Ingrese Descripción">
                </div>
               </div>

               <div class="col-md-4">
                 <div class="form-group">
                  <label for="tipodocumento">Tipo Documento</label>
                  <select name="tipodocumento" id="tipodocumento" class="form-control dynamic">
              <option value="">Seleccione Tipo</option>  
               @foreach($documentos as $doc)
                 <option value="{{ $doc->iddocumento}}">{{ $doc->nombredocumento}}</option>
               @endforeach
                  </select>
                </div>
                </div>

                <div class="col-md-12">
                <div class="form-group">
                   <label for="url">Subir Documento</label>
                  <input type="file" name="url" id="url" class="form-control" placeholder="Seleccione Documento">
                </div>
              </div>

        {{ csrf_field() }}
     
              </div>
              <div class="modal-footer">
               <div class="col-md-12"> 
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" id="agregardocumento" class="btn btn-success">Agregar</button>
              </div>
              </div>
              {!!Form::close()!!}
            
            </div>
            <!-- /.modal-content -->
          <!-- /.modal-dialog -->
          </div>
      <!--{{Form::Close()}}-->
        </div>



  





