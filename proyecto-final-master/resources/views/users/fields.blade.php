<div class="mb-3">
    <label for="name" class="form-label">usuario</label>
    <input type="text" class="form-control" value="{{isset($user)?$user->name:''}}" id="name" name="name" >

    <label for="rol_id" class="form-label">Seleccione un rol</label> <br>
    <select name="rol_id" class="form-select" >

    @foreach($roles as $roles)
    <option class="form-label"  value="{{$roles->rol_id}}" {{isset($user) && $user->rol_id==$roles->rol_id?'selected':''}} > {{$roles->rol_descripcion}} </option>
    @endforeach
    </select>

    <label for="usu_nombres" class="form-label">nombre</label>
    <input type="text" class="form-control" value="{{isset($user)?$user->usu_nombres:''}}"  id="usu_nombres" name="usu_nombres" >

    <label for="usu_telefono" class="form-label">telefono</label>
    <input type="text" class="form-control" value="{{isset($user)?$user->usu_telefono:''}}"  id="usu_telefono" name="usu_telefono" >

    <label for="email" class="form-label">email</label>
    <input type="text" class="form-control" value="{{isset($user)?$user->email:''}}"  id="email" name="email" >


 
    

  </div>
  <button type="submit" class="btn btn-primary">GUARDAR</button>