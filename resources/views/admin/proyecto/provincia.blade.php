

<div class="form-group">
                  <label for="provincia">Provincia</label>

                  <select name="idprovincia" class="form-control" id="select-provincia">
                   @foreach ($provincias as $prov)
                      <option value="{{$prov->idprovincia}}">{{$prov->nombreprovincia}} </option>
                    @endforeach
                  </select>
 </div>

