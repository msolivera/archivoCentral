@extends('layout')

@section('header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
           <h4> Fichas Personales
        <small>• Crear</small>
        </h4>
    </ol>

  </nav>

@stop

@section('content')
<section class="content">
<form method="POST" action="{{route('fichasPersonales.store')}}">
  {{ csrf_field() }}  
  <div class="row">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h5 class="card-title">Nueva Ficha</h5>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        
          <div class="card-body">
            <div class="row">
              <div class="col-md-3">
                <div class="card-body">
              </div>
                <div class="form-group {{$errors->has('numeroPaquete') ? 'has-error' : ''}} ">
                  <label for="numeroPaquete">Nro. Paquete de Ingreso</label>
                  <input name = "numeroPaquete" 
                        type="imput" 
                        class="form-control" 
                        id="numeroPaquete" 
                        placeholder="..." 
                        value="{{old('numeroPaquete')}}">
                  <!--- Muestro los errores de validacion.-->
                  {!! $errors->first('numeroPaquete','<span class=error style=color:red>:message</span>')!!}
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group {{$errors->has('clasificacion') ? 'has-error' : ''}} ">
                  <label for="clasificacion">Clasificacion</label>
                  <input name = "clasificacion" 
                        type="imput" 
                        class="form-control" 
                        id="clasificacion" 
                        placeholder="..." 
                        value="{{old('clasificacion')}}">
                  <!--- Muestro los errores de validacion.-->
                  {!! $errors->first('clasificacion','<span class=error style=color:red>:message</span>')!!}
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="temas">Temas</label>
                  <select  name="unidades[]" 
                          class="select2" 
                          multiple="multiple" 
                          data-placeholder="Seleccione Uno o mas temas" 
                          style="width: 100%;">
                    @foreach ($unidades as $unidad)
                      <option {{collect(old('unidades'))->contains($unidad->id) ? 'selected' : ''}} 
                        value={{$unidad->id}}> {{$unidad->nombre}}
                      </option>
                    @endforeach
                  </select>  
                </div>  
              </div>
              
              <div class="col-md-6" style= "display: inline-block;" >
                <div class="form-group {{$errors->has('primerNombre') ? 'has-error' : ''}} ">
                  <label for="nombre">Primer Nombre</label>
                  <input name = "primerNombre" 
                        type="imput" 
                        class="form-control" 
                        id="nombre" 
                        placeholder="..." 
                        value="{{old('primerNombre')}}">
                  <!--- Muestro los errores de validacion.-->
                  {!! $errors->first('primerNombre','<span class=error style=color:red>:message</span>')!!}
                </div>
                
                <div class="form-group {{$errors->has('primerApellido') ? 'has-error' :''}}">
                  <label for="apellido">Primer apellido</label>
                  <input name = "primerApellido" 
                        type="imput" 
                        class="form-control" 
                        id="apellido" 
                        placeholder="..."
                        value="{{old('primerApellido')}}">
                  {!! $errors->first('primerApellido','<span class=error style=color:red>:message</span>')!!}
                </div>
                
                <div class="form-group">
                  <label for="cedula">Cedula</label>
                  <input name = "cedula" 
                        type="imput" 
                        class="form-control" 
                        id="cedula" placeholder="..."
                        value="{{old('cedula')}}">
                </div>

                <div class="form-group">
                  <label for="otroDoc1">Otro Documento</label>
                  <div class="row">
                  <div class="col-md-6" >
                    <select name="otroDoc1" 
                      class="form-control select2" 
                      style="width: 100%;" 
                      id="otroDoc1">
                      <option value=""> Seleccione un Documento</option> 
                      <option value="dni">DNI</option>      
                      <option value="libretaEmbarque">Libreta de Embarque</option>      
                    </select> 
                  </div>
                  <div class="col-md-6" style= "display: inline-block; float: right;">
                    <input name = "otroDoc" 
                    type="imput" 
                    class="form-control" 
                    id="otroDoc" placeholder="..."
                    value="{{old('otroDoc')}}">
                  </div>
                  </div>

                </div>

                <div class="form-group">
                  <label for="pais">Pais</label>
                  <select name="paisId" 
                          class="form-control select2" 
                          style="width: 100%;" 
                          id="paisId">
                    <option value=""> Seleccione un Pais</option>
                    @foreach ($paises as $pais)
                      <option value="{{$pais->id}}"
                        {{old('paisId') == $pais->id ? 'selected' : ''}}>
                        {{$pais->nombre}}</option>
                    @endforeach
                  </select> 
                </div>

                <div class="form-group">
                  <label for="departamento">Departamento</label>
                  <input name = "departamento" 
                        type="imput" 
                        class="form-control" 
                        id="departamento" 
                        placeholder="..."
                        value="{{old('departamento')}}" readonly>
                </div>

                <div class="form-group {{$errors->has('correoElectronico') ? 'has-error' : ''}} ">
                  <label for="correoElectronico">Correo Electrónico</label>
                  <input name = "correoElectronico" 
                        type="imput" 
                        class="form-control" 
                        id="correoElectronico" 
                        placeholder="..." 
                        value="{{old('correoElectronico')}}">
                  <!--- Muestro los errores de validacion.-->
                  {!! $errors->first('correoElectronico','<span class=error style=color:red>:message</span>')!!}
                </div>

                <div class="form-group" style= 'margin-bottom: 35px;'>
                  <label for="sexo">Sexo</label>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="sexo1" name="sexo">
                    <label for="sexo1" class="custom-control-label">Hombre</label>
                  </div>
                  <div class="custom-control custom-radio" >
                    <input class="custom-control-input" type="radio" id="sexo2" name="sexo" >
                    <label for="sexo2" class="custom-control-label">Mujer</label>
                  </div>
                </div>

                <div class="form-group">
                  <label for="estadoIngreso">Estado de Ingreso</label>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="estado0" name="estado">
                    <label for="estado0" class="custom-control-label">No Aplica</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="estado1" name="estado">
                    <label for="estado1" class="custom-control-label">Primera Vez</label>
                  </div>
                  <div class="custom-control custom-radio" >
                    <input class="custom-control-input" type="radio" id="estado2" name="estado" >
                    <label for="estado2" class="custom-control-label">Reingreso</label>
                  </div>
                  <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="estado3" name="estado" >
                    <label for="estado3" class="custom-control-label">Sol. Anteriores</label>
                  </div>
                </div>

                <div class="form-group">
                  
                  <div class="row">
                    <div class="col-md-6" >
                      <label for="fuerza">Fuerza</label>
                      <select name="fuerza" 
                        class="form-control select2" 
                        style="width: 100%;" 
                        id="fuerza">
                        <option value=""> </option> 
                      </select> 
                    </div>
                    <div class="col-md-6" style= "display: inline-block; float: right;">
                      <label for="grado">Grado</label>
                      <select name="grado" 
                        class="form-control select2" 
                        style="width: 100%;" 
                        id="grado">
                        <option value=""> </option> 
                      </select>
                    </div>
                    </div>
                </div>

              </div>

              <div class="col-md-6" style= "display: inline-block; float: right;" >
                <div class="form-group {{$errors->has('segundoNombre') ? 'has-error' : ''}} ">
                  <label for="nombre">Segundo Nombre</label>
                  <input name = "segundoNombre" 
                        type="imput" 
                        class="form-control" 
                        id="nombre" 
                        placeholder="..." 
                        value="{{old('segundoNombre')}}">
                  <!--- Muestro los errores de validacion.-->
                  {!! $errors->first('segundoNombre','<span class=error style=color:red>:message</span>')!!}
                </div>

                <div class="form-group {{$errors->has('segundoApellido') ? 'has-error' :''}}">
                  <label for="apellido">Segundo apellido</label>
                  <input name = "segundoApellido" 
                        type="imput" 
                        class="form-control" 
                        id="apellido" 
                        placeholder="..."
                        value="{{old('segundoApellido')}}">
                  {!! $errors->first('segundoApellido','<span class=error style=color:red>:message</span>')!!}
                </div>

                <div class="form-group">
                  <label for="credencial">Credencial Cívica</label>
                  <input name = "credencial" 
                        type="imput" 
                        class="form-control" 
                        id="credencial" placeholder="..."
                        value="{{old('credencial')}}">
                </div>

                <div class="form-group">
                  <label>Fecha de Nacimiento</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name = "fechaNac" 
                              type="text" 
                              class="form-control datetimepicker-input" 
                              data-target="#reservationdate"
                              value="{{old('fechaNac')}}"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                  <label for="barrio">Ciudad - Barrio</label>
                  <select name="barrioId" 
                          class="form-control select2" 
                          style="width: 100%;" 
                          id="barrioId">
                    <option value=""> Seleccione una Ciudad - Barrio</option>
                    @foreach ($paises as $pais)
                      <option value="{{$pais->id}}"
                        {{old('paisId') == $pais->id ? 'selected' : ''}}>
                        {{$pais->nombre}}</option>
                    @endforeach
                  </select> 
                </div>

                <div class="form-group">
                  <label for="estadoCivil">Estado Civil</label>
                  <select name="estadoCivilId" 
                          class="form-control select2" 
                          style="width: 100%;" 
                          id="estadoCivilId">
                    <option value=""> Seleccione un Estado Civil</option>
                    @foreach ($paises as $pais)
                      <option value="{{$pais->id}}"
                        {{old('paisId') == $pais->id ? 'selected' : ''}}>
                        {{$pais->nombre}}</option>
                    @endforeach
                  </select> 
                </div>

                <div class="form-group {{$errors->has('seccional') ? 'has-error' : ''}} ">
                  <label for="seccional">Seccional Policial</label>
                  <input name = "seccional" 
                        type="imput" 
                        class="form-control" 
                        id="seccional" 
                        placeholder="..." 
                        value="{{old('seccional')}}">
                  <!--- Muestro los errores de validacion.-->
                  {!! $errors->first('seccional','<span class=error style=color:red>:message</span>')!!}
                </div>

                <div class="form-group">
                  <label>Fecha de Defuncion</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input name = "fechaDef" 
                              type="text" 
                              class="form-control datetimepicker-input" 
                              data-target="#reservationdate"
                              value="{{old('fechaDef')}}"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                  <label for="unidad">Unidades</label>
                  <select  name="unidades[]" 
                          class="select2" 
                          multiple="multiple" 
                          data-placeholder="Seleccione Una o mas unidades" 
                          style="width: 100%;">
                    @foreach ($unidades as $unidad)
                      <option {{collect(old('unidades'))->contains($unidad->id) ? 'selected' : ''}} 
                        value={{$unidad->id}}> {{$unidad->nombre}}
                      </option>
                    @endforeach
                  </select>  
                </div>  
            
                <div class="form-group">
                  <label for="situacion">Situación</label>
                  <select name="situacionId" 
                          class="form-control select2" 
                          style="width: 100%;" 
                          id="situacionId">
                    <option value=""> Seleccione un Situación</option>
                    @foreach ($paises as $pais)
                      <option value="{{$pais->id}}"
                        {{old('paisId') == $pais->id ? 'selected' : ''}}>
                        {{$pais->nombre}}</option>
                    @endforeach
                  </select> 
                </div>

                <div class="form-group">
                  <label for="cuerpo">Cuerpo/Arma</label>
                  <select name="cuerpoId" 
                          class="form-control select2" 
                          style="width: 100%;" 
                          id="cuerpoId">
                    <option value=""> Seleccione Cuerpo/Arma</option>
                    @foreach ($paises as $pais)
                      <option value="{{$pais->id}}"
                        {{old('paisId') == $pais->id ? 'selected' : ''}}>
                        {{$pais->nombre}}</option>
                    @endforeach
                  </select> 
                </div>
              
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Ideologias</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Profesiones</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Domicilios</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Estudios</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Organizaciones</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Anotaciones</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Fichas personales relacionadas</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Fichas Impersonales Relacionadas</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Dossier Relacionados</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>

              <div class="col-12">
                <div class="card" style="background-color: #E6EFF6;">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-8">
                      <h3 class="card-title">Documentos Relacionados</h3>
                      </div>
                      <div class="col-4">
                      <button style="float: right; padding: 15px;" class="btn btn-xs btn-warning" 
                      data-toggle="modal" data-target="#insertModal"><i class="fa fa-regular fa-plus"></i></button>
                      </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ideologias</th>
                        <th>Acciones</th>
                      </tr>
                      </thead>
                      <tbody>        
                        <tr>
                          <td>1</td>
                          <td>prueba</td>
                          <td>  
                          <a href="#" class="btn btn-xs btn-info"><i class="fa fa-light fa-pen"></i></a>  
                          <form method="POST" action="#" style="display: inline"> {{ csrf_field() }} {{method_field('DELETE')}}
                            <button class="btn btn-xs btn-danger"
                              onclick="return confirm('¿Esta seguro que desea elminirar este registro?')"
                            ><i class="fa fa-light fa-trash"></i></button>
                          </form> 
                          </td> 
                        </tr> 
                       
                                  
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>



          </div>
          <!-- /.card-body -->
        
          <div class="card-footer">
            <div class="col-md-4" style="float: left;">
              <button type="submit" class="btn btn-success btn-block">Guardar</button>
              </div>
              <div class="col-md-4" style="float: right;">
              <a href="{{route('fichasPersonales.index')}}"  class="btn btn-block btn-outline-primary">Atrás</a>
              </div>
          </div>
       
      </div>
      <!-- /.card -->

    </div>
 
    </div>
  </form>

</section>
@stop

@push('styles')
<!-- estilos para las tablas -->
<link rel="stylesheet" href="adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<!--ESTILOS PARA CALENDARIO daterange picker -->

<link rel="stylesheet" href="adminLTE/plugins/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="adminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="adminLTE/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="adminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminLTE/css/adminlte.min.css">
@endpush
@push('scripts')
<!-- INICIO DataTables  & Plugins -->
<script src="adminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="adminLTE/plugins/jszip/jszip.min.js"></script>
<script src="adminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="adminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- FIN DataTables  & Plugins -->
<!-- INICIO TODO ESTO PARA CALENDARIO -->
<!-- date-range-picker -->
<script src="adminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Select2 -->
<script src="adminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="adminLTE/plugins/moment/moment.min.js"></script>
<script src="adminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="adminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Page specific script DE LA TABLA DE FICHAS -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", /*"csv",*/ "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
<!-- Page specific script DE LA TABLA DE FICHAS -->
<script>
 $(function () {
   //Initialize Select2 Elements
   $('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
  theme: 'bootstrap4'
})
    
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })

  </script>
@endpush



