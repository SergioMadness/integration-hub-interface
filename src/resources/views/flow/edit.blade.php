@extends('InterfaceCommon::containers.workarea')

@section('title', trans('InterfaceHub::flow.list.edit-title'))

@section('content')
    <form class="panel panel-default" method="POST" action="">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group ">
                    <label for="first_name" class="control-label">
                        @lang('InterfaceSaas::flow.form.name')
                        <span class="text-danger">*</span>
                    </label>
                    <input class="form-control" name="name" type="text" id="name"
                           value="{{ old('name', $model->name) }}">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group ">
                    <input type="hidden" name="is_default" value="0 /">
                    <input type="checkbox" name="is_default" value="1" {{ $model->is_default?'checked':'' }} />&nbsp;&nbsp;
                    <label for="is_default" class="control-label">
                        @lang('InterfaceSaas::flow.form.id_default')
                    </label>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group ">
                    <input type="hidden" name="is_active" value="0 /">
                    <input type="checkbox" name="is_active" value="1" {{ $model->is_active?'checked':'' }} />&nbsp;&nbsp;
                    <label for="is_active" class="control-label">
                        @lang('InterfaceSaas::flow.form.is_active')
                    </label>
                </div>
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