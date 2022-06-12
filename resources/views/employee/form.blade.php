                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input name="dni" type="text" 
                            class="form-control" placeholder="Cedula *" required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <input name="first_lastname" type="text" class="form-control"
                                placeholder="Nombres *" required>
                        </div>
                        <div class="col-sm-4">
                            <input name="second_lastname" type="text" class="form-control"
                                placeholder="Apellido *" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <input name="birthday" type="date" class="form-control" 
                            placeholder="F. Nacimiento*"
                                required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <input name="phone" type="text" class="form-control" placeholder="Teléfono">
                        </div>
                        <div class="col-sm-4">
                            <input name="cell_phone" type="text" class="form-control" placeholder="Celular">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="department_id" class="form-control" required="">
                                <option value="" selected>Selecciona un departamento *</option>
                                @foreach ($departaments as $departament)
                                    <option value="{{ $departament->id }}">{{ $departament->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="company_id" class="form-control" required="">
                                <option value="" selected>Selecciona una empresa *</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="company_id" class="form-control" required="">
                                <option value="" selected>Seleccione ubicacion expediente *</option>
                                @foreach ($locations as $locations)
                                    <option value="{{ $locations->id }}">{{ $locations->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <select name="company_id" class="form-control" required="">
                                <option value="" selected>Seleccione un cargo *</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label class="col-sm-12 col-form-label">Fecha de Nacimiento *</label>
                            <input name="birthday" type="date" class="form-control"
                                placeholder="Fecha de Nacimiento *" required>
                        </div>
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label class="col-sm-12 col-form-label">Fecha de Ingreso *</label>
                            <input name="date_of_admission" type="date" class="form-control"
                                placeholder="Fecha de Nacimiento *" required>
                        </div>


                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <label class="col-sm-12 col-form-label">F. Egreso *</label>
                            <input name="date_of_admission" type="date" class="form-control"
                                placeholder="Fecha de Nacimiento *">
                        </div>
                        <div class="col-sm-4">
                            <label class="col-sm-12 col-form-label">Género</label>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" value="F">
                                            Femenino </label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" value="M">
                                            Masculino </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-user"><i class="fa fa-save"></i>
                            Guardar</button>
                        <a class="btn btn-danger btn-user" href="{{ route('employees.index') }}"><i
                                class="fa fa-times-circle"></i> Cancelar</a>
                    </div>
   