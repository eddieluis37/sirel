@extends('layouts.master')

@section('head_extra')
        <!-- Select2 css  /opt/lampp/htdocs/l51esk/resources/themes/default/partials/_head_extra_select2_css.blade.php  -->
@include('partials._head_extra_select2_css')

@endsection
@extends('layouts.layout')
@section('content')

    <div id="TicketController" style="padding-top: 2em">


        <div class="alert alert-danger" v-if="!isValid">
            <ul>
                <li v-show="!validation.name">Nombre es requerido.</li>
                <li v-show="!validation.text">Texto es Requerido.</li>
                <li v-show="!validation.description">Descripción es requerido.</li>
            </ul>
        </div>


        <div class="form-group">
            <label for="name">Nombre Tiquet:</label>
            <input v-model="newTicket.name" type="text" id="name" name="name" class="form-control">
        </div>


        <div class="form-group">
            <label for="text">Texto:</label>
            <input v-model="newTicket.text" type="text" id="text" name="text" class="form-control">
        </div>


        <div class="form-group">
            <label for="description">Descripcion:</label>
            <input v-model="newTicket.description" type="text" id="description" name="description"
                   class="form-control">
        </div>


        <div class="form-group">
            {!! Form::label('type_id', 'Types') !!}
            {!! Form::select('type_id', (['0' => 'Seleccione nivel de Importancia'] + $types),null, ['class' => 'form-control']) !!}
        </div>



        <div class="form-group">
            {!! Form::label('importance_id', 'Importancia') !!}
            {!! Form::select('importance_id', (['0' => 'Seleccione nivel de Importancia'] + $importances),null, ['class' => 'form-control']) !!}

        </div>

        <form action="#" @submit.prevent="AddNewTicket" method="POST">


            <div class="form-group">
                <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="!edit">Add New Ticket</button>

                <button :disabled="!isValid" class="btn btn-default" type="submit" v-if="edit" @click="
                EditTicket(newTicket.id)">Edit Ticket</button>
            </div>


        </form>

        <div class="alert alert-success" transition="success" v-if="success">Add new ticket successful.</div>

        <hr>

        <table class="table">
            <thead>
            <th>ID</th>
            <th>NAME</th>
            <th>TEXT</th>
            <th>DESCRIPTION</th>
            <th>TYPES</th>
            <th>CREATED_AT</th>
            <th>UPDATED_AT</th>
            <th>CONTROLLER</th>
            </thead>

            <tbody>
            <tr v-for="ticket in tickets">
                <td>@{{ ticket.id }}</td>
                <td>@{{ ticket.name }}</td>
                <td>@{{ ticket.text }}</td>
                <td>@{{ ticket.description }}</td>

                <td>@{{ ticket.created_at }}</td>
                <td>@{{ ticket.updated_at }}</td>
                <td>
                    <button class="btn btn-default btn-sm" @click="ShowUser(ticket.id)">Edit</button>
                    <button class="btn btn-danger btn-sm" @click="RemoveUser(ticket.id)">Remove</button>
                </td>
            </tr>
            </tbody>
        </table>

    </div>

@endsection

@push('scripts')
<script src="/js/script.js"></script>

<style>
    .success-transition {
        transition: all .5s ease-in-out;
    }

    .success-enter, .success-leave {
        opatype: 0;
    }
</style>
@endpush