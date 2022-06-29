@extends('InterfaceCommon::containers.workarea')

@section('title', trans('InterfaceHub::applications.list.title'))

@section('content')
    @if(count($items)===0)
        <div class="alert alert-info"
             role="alert">@lang('InterfaceCommon::common.list.no-items-create-link', ['link'=>route('InterfaceUsers::users.add')])</div>
    @else
        <table id="usersTable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('InterfaceHub::applications.list.name')</th>
                <th>@lang('InterfaceHub::applications.list.client_id')</th>
                <th>@lang('InterfaceHub::applications.list.client_secret')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr role="row">
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->client_id }}</td>
                    <td>{{ $item->client_secret }}</td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                   href="{{ route('InterfaceHub::applications.edit', ['id'=>$item->id]) }}"
                                   type="button">@lang('InterfaceCommon::common.list.edit-button')</a>
                                <a class="dropdown-item text-danger"
                                   href="{{ route('InterfaceHub::applications.delete', ['id'=>$item->id]) }}"
                                   type="button">@lang('InterfaceCommon::common.list.delete-button')</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                    @lang('InterfaceCommon::common.list.items-counter', ['limit'=>$items->count(), 'total'=>$items->total()])
                </div>
            </div>
            <div class="col-sm-12 col-md-7 text-right">
            <span class="justify-content-end">
            {!! $items->appends(request()->query())->links() !!}
            </span>
            </div>
        </div>
    @endif
@endsection
