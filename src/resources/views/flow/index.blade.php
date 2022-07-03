@extends('InterfaceCommon::containers.workarea')

@section('title', trans('InterfaceHub::flow.list.title'))

@section('content')
    @if(count($items)===0)
        <div class="alert alert-info"
             role="alert">@lang('InterfaceCommon::common.list.no-items-create-link', ['link'=>route('InterfaceHub::flow.add')])</div>
    @else
        <a href="{{ route('InterfaceHub::flow.edit') }}"
           class="btn btn-primary">@lang('InterfaceCommon::common.add')</a>
        <br>
        <br>
        <table id="usersTable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>@lang('InterfaceHub::flow.list.name')</th>
                <th>@lang('InterfaceHub::flow.list.is_active')</th>
                <th>@lang('InterfaceHub::flow.list.is_default')</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $item)
                <tr role="row">
                    <td>{{ $item->name }}</td>
                    <td>
                        @if($item->is_active)
                            @lang('InterfaceCommon::common.yes')
                        @else
                            @lang('InterfaceCommon::common.no')
                        @endif
                    </td>
                    <td>
                        @if($item->is_default)
                            @lang('InterfaceCommon::common.yes')
                        @else
                            @lang('InterfaceCommon::common.no')
                        @endif
                    </td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a href="#" data-toggle="dropdown" class="btn btn-floating" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="ti-more-alt"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item"
                                   href="{{ route('InterfaceHub::flow.edit', ['id'=>$item->id]) }}"
                                   type="button">@lang('InterfaceCommon::common.list.edit-button')</a>
                                <a class="dropdown-item text-danger"
                                   href="{{ route('InterfaceHub::flow.delete', ['id'=>$item->id]) }}"
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
