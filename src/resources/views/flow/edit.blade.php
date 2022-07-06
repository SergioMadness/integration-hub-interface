@extends('InterfaceCommon::containers.workarea')

@section('title', trans('InterfaceHub::flow.list.edit-title'))

@push('head')
    <link href='/professionalweb/integration-hub-interface/flowy/flowy.min.css' rel='stylesheet' type='text/css'>
    <link href='/professionalweb/integration-hub-interface/flowy/styles.css' rel='stylesheet' type='text/css'>
@endpush

@addAsset('/professionalweb/lms-interface-common/js/knockout-3.5.1.js', 'js', 'system')

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
                <p id="header">@lang('InterfaceHub::flow.form.blocks')</p>
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
                    @foreach($availableModules as $module)
                        <div class="blockelem create-flowy noselect">
                            <input type="hidden" name='blockelemtype' class="blockelemtype" value="1">
                            <div class="grabme">
                                <img src="/professionalweb/integration-hub-interface/flowy/images/grabme.svg">
                            </div>
                            <div class="blockin">
                                <div class="blockico">
                                    <span></span>
                                    <img src="{{ $module['icon']??'/professionalweb/integration-hub-interface/flowy/images/action.svg' }}">
                                </div>
                                <div class="blocktext">
                                    <p class="blocktitle">{{ $module['name'] }}</p>
                                    <p class="blockdesc">{{ $module['description']??'' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="propwrap">
                <div id="properties">
                    <div id="close">
                        <img src="/professionalweb/integration-hub-interface/flowy/images/close.svg"/>
                    </div>
                    <p id="header2">@lang('InterfaceHub::flow.form.properties')</p>
                    <div id="propswitch">
                        <div id="dataprop"
                             data-bind="click: showConditions, css: {active: conditionsVisible}">@lang('InterfaceHub::flow.form.conditions')</div>
                        <div id="alertprop"
                             data-bind="click: showProperties, css: {active: propertiesVisible}">@lang('InterfaceHub::flow.form.settings')</div>
                        {{--                        <div id="logsprop">Logs</div>--}}
                    </div>
                    <div id="proplist">
                        <script type="text/html" id="condition-template">
                            <!-- ko foreach: conditions -->
                            <div class="row">
                                <div class="col-3">
                                    @lang('InterfaceHub::flow.form.select-module')<br>
                                    <select class="form-control"
                                            data-bind="options: $root.availableModules, optionsText: 'name', value: selectedModule, optionsCaption: '...'"></select>
                                    <div data-bind="text: console.log(selectedModule());"></div>
                                    <!-- ko if: selectedModule() -->
                                    @lang('InterfaceHub::flow.form.select-field')<br>
                                    <select class="form-control"
                                            data-bind="options: selectedModule().availableOutput, optionsText: 'key', value: selectedField, optionsCaption: '...'"></select>
                                    <!-- /ko -->
                                    @lang('InterfaceHub::flow.form.set-param')<br>
                                    <input type="text" data-bind="value: freeInput" class="form-control"/>
                                </div>
                                <div class="col-3 form-inline">
                                    <label><input type="checkbox"
                                                  data-bind="checked: isNot"/>&nbsp;&nbsp;@lang('InterfaceHub::flow.form.not')
                                    </label>
                                    <select class="form-control"
                                            data-bind="options: $root.availableConditions, value: condition, optionsCaption: '...'"></select>
                                </div>
                                <div class="col-3">
                                    <label>@lang('InterfaceHub::flow.form.value')</label>
                                    <input type="text" class="form-control"/>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col">
                                    <button class="btn btn-sm btn-warning"
                                            data-bind="click: $parent.removeCondition">@lang('InterfaceHub::flow.form.delete-condition')</button>
                                </div>
                            </div>
                            <hr>
                            <!-- /ko -->
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group ">
                                        <label for="first_name" class="control-label">
                                            @lang('InterfaceHub::flow.form.target')
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control"
                                                data-bind="options: $root.availableModules, optionsText: 'name', value: target, optionsValue: 'alias', optionsCaption: '...'"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col">
                                    <button class="btn btn-sm btn-danger"
                                            data-bind="click: $parent.deleteTargetBlock">@lang('InterfaceHub::flow.form.delete-path')</button>
                                </div>
                            </div>
                            <hr>
                        </script>
                        <div data-bind="visible: conditionsVisible" class="conditionsBlock">
                            <div>
                                <button class="btn btn-sm btn-primary"
                                        data-bind="click: addTargetBlock">@lang('InterfaceHub::flow.form.addConditionBlock')</button>
                                <br><br>
                                <!-- ko foreach: targetBlocks -->
                                <div data-bind="template: { name: 'condition-template', data: $data }"></div>
                                <!-- /ko -->
                            </div>
                        </div>
                        <div data-bind="visible: propertiesVisible"></div>
                    </div>
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
    <script src="/professionalweb/integration-hub-interface/editor.js"></script>
    <script>
        $(document).ready(function () {
            @foreach($availableModules as $module)
            propertiesModelInstance.pushModule('{{ $module['subsystemId'] }}', '{{ $module['name'] }}', {!! json_encode($module['options']->getAvailableFields()) !!}, {!! json_encode($module['options']->getAvailableOutFields()) !!});
            @endforeach
        });
    </script>
@endpush