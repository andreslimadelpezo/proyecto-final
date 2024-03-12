<div class="mb-3">
    <label for="cur_titulo" class="form-label">Titulo del curso</label>
    <input type="text" class="form-control" value="{{isset($curso)?$curso->cur_titulo:''}}" id="cur_titulo" name="cur_titulo" >

    <label for="cur_descripcion" class="form-label">descripcion</label>
    <input type="text" class="form-control" value="{{isset($curso)?$curso->cur_descripcion:''}}"  id="cur_descripcion" name="cur_descripcion" >

    <label for="cur_grupo" class="form-label">grupo</label>
    <input type="text" class="form-control" value="{{isset($curso)?$curso->cur_grupo:''}}"  id="cur_grupo" name="cur_grupo" >


  </div>
  <button type="submit" class="btn btn-primary">GUARDAR</button>