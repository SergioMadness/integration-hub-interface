@extends('InterfaceCommon::containers.workarea')

@section('title', trans('InterfaceHub::applications.list.edit-title'))

@section('content')
    <form class="panel panel-default" method="POST" action="">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group ">
                    <label for="first_name" class="control-label">
                        @lang('InterfaceHub::applications.form.name')
                        <span class="text-danger">*</span>
                    </label>
                    <input class="form-control" name="name" type="text" id="name"
                           value="{{ old('name', $model->name) }}">
                </div>

                <div class="form-group ">
                    <label for="client_id" class="control-label">
                        @lang('InterfaceHub::applications.form.client_id')
                    </label>
                    <input class="form-control" name="client_id" type="text" disabled
                           value="{{ $model->client_id }}">
                </div>

                <div class="form-group ">
                    <label for="client_secret" class="control-label">
                        @lang('InterfaceHub::applications.form.client_secret')
                    </label>
                    <input class="form-control" name="client_secret" type="text" disabled
                           value="{{ $model->client_secret }}">
                </div>
            </div>
        </div>

        <div class="form-buttons panel-footer">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-primary">
                    @lang('InterfaceCommon::common.form.save')
                </button>
                &nbsp;
                <a href="{{ route('InterfaceHub::applications') }}" class="btn btn-warning">
                    @lang('InterfaceCommon::common.form.cancel')
                </a>
                @if($model->exists)
                    &nbsp;
                    <a href="{{ route('InterfaceHub::applications.delete', ['id'=>$model->id])}}"
                       title="@lang('InterfaceCommon::common.form.delete')"
                       class="btn btn-secondary delete-button">
                        @lang('InterfaceCommon::common.form.delete')
                    </a>
                @endif
            </div>
        </div>
    </form>
@endsection