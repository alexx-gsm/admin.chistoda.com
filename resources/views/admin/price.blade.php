@extends('layouts.admin')

@section('content')

    <div id="main-content">

        <div class="card">
            <div class="card-block">
                <div class="title active-title">Активные прайсы</div>
                <form id="active-prices__form" method="POST" action="{{ url('/admin/price/disable') }}">
                    {{ csrf_field() }}
                    <table id="active-prices__table" class="table">
                        <tbody>
                        @foreach($activePrices as $price)
                            <tr>
                                <td class="remove-row">
                                    <a href="#" id={{ $price->id }}><i class="material-icons">remove_circle</i></a>
                                </td>
                                <td>{{ $price->title }}</td>
                                <td width="40%" class="price-name">{{ $price->name }}</td>
                                <td width="20%" class="price-info">
                                    <small>{{ $price->user->name }}</small>
                                    |
                                    <small class="price__create_at">{{ $price->created_at }}</small>
                                </td>
                                <td width="10%" class="tool-cell"></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <input id="id_price_to_disable" type="hidden" name="id" value="">
                </form>

                <div class="title inactive-title">Неактивные прайсы</div>

                    <table id="inactive-prices__table" class="table">
                        <tbody>
                        @foreach($inActivePrices as $price)
                            <tr id="row-show-{{ $price->id }}">
                                <td class="action-icon">
                                    <a href="#" id={{ $price->id }}><i class="material-icons">add_circle</i></a>
                                </td>
                                <td>{{ $price->title }}</td>
                                <td width="40%" class="price-name">{{ $price->name }}</td>
                                <td width="20%" class="price-info">
                                    <small>{{ $price->user->name }}</small>
                                    |
                                    <small class="price__create_at">{{ $price->created_at }}</small>
                                </td>
                                <td width="10%" class="tool-cell">
                                    <a class="action-edit" name="{{ $price->id }}" href="#" title="изменить прайс">
                                        <i class="material-icons">mode_edit</i>
                                    </a>
                                    <a class="action-delete" name="{{ $price->id }}" href="#" title="удалить прайс">
                                        <i class="material-icons">delete_forever</i>
                                    </a>
                                </td>
                            </tr>
                            {{----}}
                            <tr id="row-edit-{{ $price->id }}" class="hide">
                                <form id="edit-price_id-{{ $price->id }}" method="POST" action="{{ url('/admin/price/save') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <td class="action-icon"></td>
                                    <td class="input-title"><input type="text" name="title" value="{{ $price->title }}" /></td>
                                    <td width="30%" class="input-name">
                                        <span>{{ $price->name }}</span>
                                        <input id="file-{{ $price->id }}" class="inputfile" type="file" name="price" value="" />
                                        <label for="file-{{ $price->id }}">
                                            <i class="material-icons">attach_file</i>
                                        </label>
                                    </td>
                                    <td width="20%" class="price-info">
                                        <small>{{ $price->user->name }}</small>
                                        |
                                        <small class="price__create_at">{{ $price->created_at }}</small>
                                    </td>
                                    <td width="10%" class="tool-cell">
                                        <a class="action-save" name={{ $price->id }} href="#"><i class="material-icons">save</i></a>
                                        <a class="action-cancel" name={{ $price->id }} href="#"><i class="material-icons">undo</i></a>
                                    </td>

                                    <input type="hidden" name="price_id" value="{{ $price->id }}">
                                </form>
                            </tr>
                        @endforeach
                            {{-- NEW PRICE --}}
                            <tr id="row-new" class="hidden">
                                <form id="new-price" method="POST" action="{{ url('/admin/price/save') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <td class="action-icon"></td>
                                    <td class="input-title"><input type="text" name="title" required/></td>
                                    <td width="30%" class="input-name">
                                        <span></span>
                                        <input id="new-file" class="inputfile" type="file" name="price" value="" required/>
                                        <label for="new-file">
                                            <i class="material-icons">attach_file</i>
                                        </label>
                                    </td>
                                    <td width="20%" class="price-info">

                                    </td>
                                    <td width="10%" class="tool-cell">
                                        <a id="action-save-new" href="#"><i class="material-icons">save</i></a>
                                        <a id="action-cancel-new" href="#"><i class="material-icons">undo</i></a>
                                    </td>

                                    {{--<input type="hidden" name="price_id" value="{{ $price->id }}">--}}
                                </form>
                            </tr>
                        </tbody>
                    </table>
            </div>

            <div id="add-new-price">
                <a href="#"><i class="material-icons">add_circle</i></a>
            </div>

        </div>



        <form id="inactive-prices__form" method="POST" action="{{ url('/admin/price/enable') }}">
            {{ csrf_field() }}
            <input id="id_price_to_activate" type="hidden" name="id" value="">
        </form>

        <form id="form__hide-price" method="POST" action="{{ url('/admin/price/hide') }}">
            {{ csrf_field() }}
            <input id="price_to_hide" type="hidden" name="id" value="">
        </form>

</div>



@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.action-icon a').on('click', function (e) {
                e.preventDefault();
                const id = e.currentTarget.id;

                $('#id_price_to_activate').val(id);
                $('#inactive-prices__form').submit();
            });

            $('.remove-row a').on('click', function (e) {
                e.preventDefault();

                const id = e.currentTarget.id;

                $('#id_price_to_disable').val(id);
                $('#active-prices__form').submit();
            });

            $('.action-delete').on('click', function (e) {
                e.preventDefault();

                const id = $(this).attr('name');

                $('#price_to_hide').val(id);
                $('#form__hide-price').submit();
            });

            $('.action-edit').on('click', function (e) {
                e.preventDefault();

                const id = $(this).attr('name');

                $('#row-show-' + id).toggleClass('hide');
                $('#row-edit-' + id).toggleClass('hide');
                $('#add-new-price').toggleClass('hidden');
            });

            $('.action-cancel').on('click', function (e) {
                e.preventDefault();

                const id = $(this).attr('name');

                $('#row-show-' + id).toggleClass('hide');
                $('#row-edit-' + id).toggleClass('hide');
                $('#add-new-price').toggleClass('hidden');
            });

            $('.action-save').on('click', function (e) {
                e.preventDefault();

                const id = $(this).attr('name');
                const form_id = 'edit-price_id-' + id;

                $('#' + form_id).submit();
            });

            $('#action-save-new').on('click', function (e) {
                e.preventDefault();

                $('#new-price').submit();
            });

            $('#action-cancel-new').on('click', function (e) {
                e.preventDefault();

                $('#row-new').toggleClass('hidden');
                $('#add-new-price').toggleClass('hidden');
            });

            $('#add-new-price a').on('click', function (e) {
                e.preventDefault();

                $('#row-new').toggleClass('hidden');
                $('#add-new-price').toggleClass('hidden');
            });




            let inputs = document.querySelectorAll('.inputfile');
            Array.prototype.forEach.call( inputs, function( input )
            {
                input.addEventListener( 'change', function( e ) {
                    let fileName = '';
                    let label = input.nextElementSibling;

                    if( this.files && this.files.length === 1 ) {
                        fileName = e.target.value.split( '\\' ).pop();
                    }

                    if( fileName ) {
                        label.innerHTML += fileName;
                    }
                });
            });


        })
    </script>
@endsection