<style>
  #mapacanvas{
    width: 320px;
    height: 320px;
  }
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"
  type="text/javascript"></script>

<div class="modal modal-default fade" aria-hidden="true" role="dialog" tabindex="-1" id="modal-mostrardelimitacion">
     <!-- {{Form::Open(array('action'=>array('RegistroController@create'),'method'=>'delete'))}} --> 
  <div class="modal-dialog">
     <div class="modal-content" >
           <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><label for="titulodelimitacion"></label></h4>
              </div>


    <div class="modal-body">

                  <input type="hidden" id="estudiotext" name="estudiotext" class="form-control" >

          
            <table id="tabladelimitacion" class="table table-bordered table-striped">
               
            </table>
     
             

{!!Form::open(array('url'=>'admin/proyecto','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}


   <div class="col-md-7">
       <div class="form-group">
        
        <div id="mapacanvas"></div>

        <label for="">Buscar</label>
        <input type="text" name="buscarmapa" id="buscarmapa">
      </div>   
    </div>
   <div class="col-md-5">

                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese Descripción">
                </div>
                <div class="form-group">
                  <label for="coordenadax">Coordenada x</label>
                  <input type="text" name="lat" id="lat" class="form-control" placeholder="Ingrese Coordenada x">
                </div>
                <div class="form-group">
                  <label for="coordenaday">Coordenada y</label>
                  <input type="text" name="lng" id="lng" class="form-control" placeholder="Ingrese Coordenada y">
                </div>

               <div class="form-group">
                  <label for="departamento">Departamento</label>
                  <select name="departamento" id="departamento" class="form-control dynamic" 
                  data-dependent="provincia">
              <option value="">Seleccione Departamento</option>  
               @foreach($departamentos as $dep)
               @if($dep->iddepartamento=='030000')
               <option value="{{ $dep->iddepartamento}}" selected>{{ $dep->nombredepartamento }}</option>
               @else
                 <option value="{{ $dep->iddepartamento}}">{{ $dep->nombredepartamento }}</option>
               @endif
               @endforeach
                  </select>
                </div>

          <div class="form-group">
                  <label for="provincia" disabled>Provincia</label>
                  <select name="provincia" id="provincia" class="form-control dynamic" data-dependent="distrito"> 
                    <option value="">Seleccione Provincia</option>  
                  @foreach($provincias as $pro)
                  <option value="{{ $pro->idprovincia}}">{{ $pro->nombreprovincia }}</option>
                  @endforeach
               </select>
                </div>

            <div class="form-group">
                  <label for="distrito">Distrito</label>
                  <select name="distrito" id="distrito" class="form-control dynamic">
               </select>
             </div>
        {{ csrf_field() }}

              </div>

        </div>
              <div class="modal-footer">
               <div class="col-md-12"> 
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                <button type="button" id="agregardelimitacion" class="btn btn-primary">Agregar</button>
              </div>
             </div>
       {!!Form::close()!!}
      
            
           
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
      <!--{{Form::Close()}}-->
    </div>
  </div>

  


