@extends('layouts.school_manager')

@section('title', 'Class')

@section('script_page')
<script type="text/javascript">
    $('form').find('img, button, a, input[type="button"], input[type="submit"]').click(function (e) {
        $(this).parents('form').submit();
    });
</script>
@endsection 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                id
                            </th>
                            <th>
                                Tên
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $class)
                        <tr>
                            <td>
                                {{ $class->id }}
                            </td>
                            <td>
                                {{ $class->name }}
                            </td>
                            <td>
                                <div class="row text-center">
                                    <div class="col-sm-3">
                                        <a href="{{ route('class.edit', ['primaryKeyValue' => $class->id]) }}">
                                            <img class="icon_manage" title="Edit" src="{{ URL::asset('images/icon/ico_edit.png') }}">
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <form action="{{ route('class.destroy', [$class->id])}}" method="post">
                                            <img class="icon_manage" title="Delete" src="{{ URL::asset('images/icon/delete-icon.png') }}">
                                            @csrf 
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach 
                    </tbody>

                </table>
            </div>

            </form>
            <div class="row">
                <div class="col-sm-5">&nbsp;</div>
                <div class="col-sm-6">
                    {{ $items->links() }}
                </div>
                <div class="col-sm-1">&nbsp;</div>
            </div>
        </div>
    </div>
</div>
@endsection