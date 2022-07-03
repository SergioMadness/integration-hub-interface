@extends('InterfaceCommon::containers.workarea')

@section('title', trans('InterfaceHub::flow.list.edit-title'))

@push('head')
    <link href='/professionalweb/integration-hub-interface/flowy/flowy.min.css' rel='stylesheet' type='text/css'>
    <link href='/professionalweb/integration-hub-interface/flowy/styles.css' rel='stylesheet' type='text/css'>
@endpush

@section('content')
    <form class="panel panel-default" method="POST" action="">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group ">
                    <label for="first_name" class="control-label">
                        @lang('InterfaceHub::flow.form.name')
                        <span class="text-danger">*</span>
                    </label>
                    <input class="form-control" name="name" type="text" id="name"
                           value="{{ old('name', $model->name) }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group ">
                    <br><br>
                    <input type="hidden" name="is_default" value="0 /">
                    <input type="checkbox" name="is_default" value="1" {{ $model->is_default?'checked':'' }} />&nbsp;&nbsp;
                    <label for="is_default" class="control-label">
                        @lang('InterfaceHub::flow.form.is_default')
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group ">
                    <input type="hidden" name="is_active" value="0 /">
                    <input type="checkbox" name="is_active" value="1" {{ $model->is_active?'checked':'' }} />&nbsp;&nbsp;
                    <label for="is_active" class="control-label">
                        @lang('InterfaceHub::flow.form.is_active')
                    </label>
                </div>
            </div>
        </div>
        <div class="row" style="position: relative; height: 500px">
            <div id="leftcard">
{{--                <div id="closecard">--}}
{{--                    <img src="/professionalweb/integration-hub-interface/flowy/images/closeleft.svg">--}}
{{--                </div>--}}
                <p id="header">Blocks</p>
{{--                <div id="search">--}}
{{--                    <img src="/professionalweb/integration-hub-interface/flowy/images/search.svg">--}}
{{--                    <input type="text" placeholder="Search blocks">--}}
{{--                </div>--}}
{{--                <div id="subnav">--}}
{{--                    <div id="triggers" class="navactive side">Triggers</div>--}}
{{--                    <div id="actions" class="navdisabled side">Actions</div>--}}
{{--                    <div id="loggers" class="navdisabled side">Loggers</div>--}}
{{--                </div>--}}
                <div id="blocklist">
                    <div class="blockelem create-flowy noselect">
                        <input type="hidden" name='blockelemtype' class="blockelemtype" value="1">
                        <div class="grabme">
                            <img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg">
                        </div>
                        <div class="blockin">
                            <div class="blockico">
                                <span></span>
                                <img src="/professionalweb/integration-hub-interface/flowy/images/eye.svg">
                            </div>
                            <div class="blocktext">
                                <p class="blocktitle">New visitor</p>
                                <p class="blockdesc">Triggers when somebody visits a specified page</p>
                            </div>
                        </div>
                    </div>
                    <div class="blockelem create-flowy noselect">
                        <input type="hidden" name='blockelemtype' class="blockelemtype" value="2">
                        <div class="grabme">
                            <img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg">
                        </div>
                        <div class="blockin">
                            <div class="blockico">
                                <span></span>
                                <img src="/professionalweb/integration-hub-interface/flowy/images/action.svg">
                            </div>
                            <div class="blocktext">
                                <p class="blocktitle">Action is performed</p>
                                <p class="blockdesc">Triggers when somebody performs a specified action</p>
                            </div>
                        </div>
                    </div>
                    <div class="blockelem create-flowy noselect">
                        <input type="hidden" name='blockelemtype' class="blockelemtype" value="3">
                        <div class="grabme">
                            <img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg">
                        </div>
                        <div class="blockin">
                            <div class="blockico">
                                <span></span>
                                <img src="/professionalweb/integration-hub-interface/flowy/images/time.svg">
                            </div>
                            <div class="blocktext">
                                <p class="blocktitle">Time has passed</p>
                                <p class="blockdesc">Triggers after a specified amount of time</p>
                            </div>
                        </div>
                    </div>
                    <div class="blockelem create-flowy noselect">
                        <input type="hidden" name='blockelemtype' class="blockelemtype" value="4">
                        <div class="grabme">
                            <img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg">
                        </div>
                        <div class="blockin">
                            <div class="blockico">
                                <span></span>
                                <img src="/professionalweb/integration-hub-interface/flowy/images/error.svg">
                            </div>
                            <div class="blocktext">
                                <p class="blocktitle">Error prompt</p>
                                <p class="blockdesc">Triggers when a specified error happens</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="propwrap">
                <div id="properties">
                    <div id="close">
                        <img src="/professionalweb/integration-hub-interface/flowy/images/close.svg" />
                    </div>
                    <p id="header2">Properties</p>
{{--                    <div id="propswitch">--}}
{{--                        <div id="dataprop">Data</div>--}}
{{--                        <div id="alertprop">Alerts</div>--}}
{{--                        <div id="logsprop">Logs</div>--}}
{{--                    </div>--}}
                    <div id="proplist">
                        Items
{{--                        <p class="inputlabel">Select database</p>--}}
{{--                        <div class="dropme">Database 1 <img src="/professionalweb/integration-hub-interface/flowy/images/dropdown.svg"></div>--}}
{{--                        <p class="inputlabel">Check properties</p>--}}
{{--                        <div class="dropme">All<img src="/professionalweb/integration-hub-interface/flowy/images/dropdown.svg"></div>--}}
{{--                        <div class="checkus"><img src="/professionalweb/integration-hub-interface/flowy/images/checkon.svg">--}}
{{--                            <p>Log on successful performance</p></div>--}}
{{--                        <div class="checkus"><img src="/professionalweb/integration-hub-interface/flowy/images/checkoff.svg">--}}
{{--                            <p>Give priority to this block</p></div>--}}
                    </div>
                    <div id="divisionthing"></div>
                    <div id="removeblock">Delete blocks</div>
                </div>
            </div>
            <div id="canvas">
            </div>
        </div>

        <div class="form-buttons panel-footer">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-primary">
                    @lang('InterfaceCommon::common.form.save')
                </button>
                &nbsp;
                <a href="{{ route('InterfaceSaas::applications') }}" class="btn btn-warning">
                    @lang('InterfaceCommon::common.form.cancel')
                </a>
                @if($model->exists)
                    &nbsp;
                    <a href="{{ route('InterfaceSaas::applications.delete', ['id'=>$model->id])}}"
                       title="@lang('InterfaceCommon::common.form.delete')"
                       class="btn btn-secondary delete-button">
                        @lang('InterfaceCommon::common.form.delete')
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection

@push('footer')
    <script src="/professionalweb/integration-hub-interface/flowy/flowy.min.js"></script>
    <script src="/professionalweb/integration-hub-interface/flowy/main.js"></script>
@endpush