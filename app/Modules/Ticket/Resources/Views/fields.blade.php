
@section('content')
    <div class="row" id="TicketController" style="padding-top: 2em">
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo Tiquete</h3>
                    &nbsp;

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Colapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">

                    <validator name="validation1">

                        <form novalidate>

                            &nbsp;

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" v-model="newTicket.name" placeholder="Nombre"
                                               v-validate:name="{ minlength: 3, maxlength: 16 }" id="name" name="name"
                                               class="form-control">
                                        <ul>
                                            <li v-if="$validation1.name.minlength">Minimos 3 letras</li>
                                            <li v-if="$validation1.name.maxlength">Maximo 16 letras</li>

                                        </ul>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Texto</label><br>
                                        <input type="text" v-model="newTicket.text" placeholder="Texto"
                                               v-validate:text="{ min: 99999, max: 9999999999 }" id="text" name="text"
                                               class="form-control">

                                        <ul>
                                            <li v-if="$validation1.text.min">Datos númericos incompletos</li>
                                            <li v-if="$validation1.text.max">Datos númericos excedidos, ! Rectifique ¡
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name">Descripcion</label><br>
                                        <input type="text" v-model="newTicket.description" placeholder="Descripcion"
                                               v-validate:description="{ minlength: 3, maxlength: 16 }" id="description"
                                               name="description"
                                               class="form-control">
                                        <ul>
                                            <li v-if="$validation1.description.minlength">Minimos 3 letras</li>
                                            <li v-if="$validation1.description.maxlength">Maximo 16 letras</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </validator>

                </div>
            </div>
        </div>


@endsection
