@extends('layouts.master')

@section('head_extra')
        <!-- Select2 css  /opt/lampp/htdocs/l51esk/resources/themes/default/partials/_head_extra_select2_css.blade.php  -->
@include('partials._head_extra_select2_css')
@endsection


@section('content')
    {{ csrf_field() }}

    <div id="TicketController" style="padding-top: 2em">

        <div class="alert alert-danger" v-if="!isValid">
            <ul>
                <li v-show="!validation.name">Name field is required.</li>
                <li v-show="!validation.email">Input a valid email address.</li>
                <li v-show="!validation.address">Address field is required.</li>
            </ul>
        </div>


        <div class='col-md-3'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('ticket::general.page.method-name.box-title') }}</h3>
                    &nbsp;

                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>

                <div class="box-body">
                    {!! Form::open([ 'route' => 'ticket.store', 'method' => 'POST']) !!}
                        @include('ticket::fields')
                        <button type="submit" class="btn btn-success btn-block">Guardar</button>
                    {!! Form::close() !!}
                </div><!-- /.form-group -->

            </div><!-- /.box-body -->

        </div><!-- /.box -->
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