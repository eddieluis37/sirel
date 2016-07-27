@extends('layouts.master')


@section('head_extra')
        <!-- Select2 css  /opt/lampp/htdocs/l51esk/resources/themes/default/partials/_head_extra_select2_css.blade.php  -->
@include('partials._head_extra_select2_css')
@endsection

@section('content')
    {{ csrf_field() }}
    <div class='row' id="TicketController" style="padding-top: 2em">
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Nuevo Tiquete</h3>
                    &nbsp;

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    {!! Form::open([ 'route' => 'ticket.store', 'method' => 'POST']) !!}
                    <validator name="validation1">

                        <form novalidate>

                            &nbsp;

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" id="name" pattern="[a-zA-Z]*" name="name" v-model="newTicket.name" placeholder="Ejemplo: Juan"
                                           v-validate:name="{ minlength: 3, maxlength: 16 }"
                                           class="form-control" >

                                    <ul>
                                        <li v-if="$validation1.name.minlength">
                                            <div class="text-primary">Mínimo debe contener 3 letras</div></li>
                                        <li v-if="$validation1.name.maxlength">
                                            <div class="text-danger">Máximo permitido son 16 letras</div></li>
                                    </ul>

                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Número</label><br>
                                    <input type="number" v-model="newTicket.numbers" placeholder="Ejemplo: 7898"
                                           v-validate:number="{ min: 99999, max: 9999999999 }" id="numbers" name="numbers"
                                           class="form-control">

                                    <ul>
                                        <li v-if="$validation1.number.min">
                                            <div class="text-primary">
                                                Datos númericos incompletos</div></li>
                                        <li v-if="$validation1.number.max">
                                            <div class="text-danger">Números excedidos, !Rectifique¡</div></li>
                                        </li>

                                    </ul>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Descripcion</label><br>
                                    <input type="text" v-model="newTicket.description" placeholder="Descripcion"
                                           v-validate:description="{ minlength: 3, maxlength: 16 }" id="description"
                                           name="description"
                                           class="form-control">
                                    <ul>
                                        <li v-if="$validation1.description.minlength">
                                            Minimos 3 letras</li>
                                        <li v-if="$validation1.description.maxlength">Maximo 16 letras</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name">Activo</label>
                                    <input type="text" v-model="newTicket.active"
                                           v-validate:active="{ minlength: 3, maxlength: 16 }" id="name" name="name"
                                           class="form-control">

                                    <ul>
                                        <li v-if="$validation1.name.minlength">
                                            <div class="text-primary">Mínimo debe contener 3 letras</div></li>
                                        <li v-if="$validation1.name.maxlength">
                                            <div class="text-danger">Máximo permitido son 16 letras</div></li>
                                    </ul>

                                </div>
                            </div>


                        </form>
                    </validator>

                    <div class="col-md-2" class="center-block">

                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.form-group -->

            </div><!-- /.box-body -->

        </div><!-- /.box auto-->
    </div><!-- /.col -->

    </div><!-- /.row -->
    @endsection

            <!-- Optional bottom section for modals etc... -->
@section('body_bottom')
@endsection

@push('scripts')
<script src="/js/script.js"></script>

<style>
    .success-transition {
        transition: all .5s ease-in-out;
    }

    .success-enter, .success-leave {
        opacity: 0;
    }
</style>
@endpush