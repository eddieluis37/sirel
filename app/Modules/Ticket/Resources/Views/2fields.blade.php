@section('content')

    <div id="TicketController" style="padding-top: 2em">

            <form class="form" v-validator="newTicket">


                <div class="alert alert-danger alert-dismissable" v-if="!isValid">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>
                        <i class="icon fa fa-ban"></i> Atención
                    </h4>

                    <ul>
                        <li v-if="!validation.name.required">Nombre es requerido.</li>
                        <li v-if="!validation.name.minlength">Nombre es muy corto.</li>
                        <li v-if="!validation.text">Texto Requerido.</li>
                        <li v-if="!validation.description">Descripción es requerido.</li>

                    </ul>
                </div>


                <div class="form-group">
                    <label for="name">Name:</label>
                    <input v-model="newTicket.name" required minlength="3" type="text" id="name" name="name" class="form-control"
                    >
                </div>

                <div class="form-group">
                    <label for="name">Text:</label>
                    <input v-model="newTicket.text" type="text" id="text" name="text" class="form-control">
                </div>


                <div class="form-group">
                    <label for="name">Descripcion:</label>
                    <input v-model="newTicket.description" type="text" id="description" name="description"
                           class="form-control"
                           v-validate="required: true">
                </div>


            </form>




        {!! Form::label('type_id', 'Types') !!}
        {!! Form::select('type_id', (['0' => 'Seleccione Tipos'] + $types),null, ['class' => 'form-control']) !!}

        {!! Form::label('importance_id', 'Importancia') !!}
        {!! Form::select('importance_id', (['0' => 'Seleccione nivel de Importancia'] + $importances),null, ['class' => 'form-control']) !!}

        {!! Form::label('section_id', 'Section') !!}
        {!! Form::select('section_id', (['0' => 'Seleccione seccion'] + $sections),null, ['class' => 'form-control']) !!}

        <hr>

        <div class="form-group">
            <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="!edit">Add New User</button>

            <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="edit" @click="EditUser(newUser.id)"
            >
            Edit User</button>
        </div>


        <div class="alert alert-success" transition="success" v-if="success">Add new user successful.</div>

        <hr>

    </div>

@endsection
