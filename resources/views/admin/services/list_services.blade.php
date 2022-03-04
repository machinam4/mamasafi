@extends('admin.layouts.base')
@section('page_css')
    <link href="{{ asset('assets/admin/plugins/datatables/css/jquery.datatables.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/css/jquery.datatables_themeroller.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/plugins/nestable/nestable.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page_contents')
    <div class="page-title">
        <h3 class="breadcrumb-header">Services</h3>
    </div>
    <div class="panel panel-white">
        <div class="panel-heading">
            <h4 class="panel-title">Services</h4>
        </div>
        <div class="panel-body">
            <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#add_service_all_modal">Add
                New
                Service</button>
            <!---add service all modal  -->
            <div class="modal fade" id="add_service_all_modal" tabindex="-1" role="dialog"
                aria-labelledby="addserviceall" aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="addserviceall">Add Services</h4>
                        </div>
                        <form id="add_service_all_form" action="javascript:void(0);">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="service_name" id="service_name" class="form-control"
                                        placeholder="Service Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="name-input" name="sub_service" class="form-control"
                                        placeholder="Sub_service Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="name-input" name="variation_name" class="form-control"
                                        placeholder="Variation Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" id="name-input" name="variation_option" class="form-control"
                                        placeholder="Variation Option" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="unit_measure" class="form-control" placeholder="Unit Measure"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="price" min="1" step=".01" class="form-control"
                                        placeholder="Price per Unit" required>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="status">Active Status
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" id="service_all_save" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!---add service all modal  -->

            <!-- Modal -->

            <div class="modal fade" id="add_service_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">

                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Services</h4>
                        </div>
                        <form id="add_service_form" action="javascript:void(0);">
                            <div class="modal-body">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" id="service_name" class="form-control"
                                        placeholder="Service Name" required>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="status">Active Status
                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" id="service_continue" class="btn btn-success">Save & Continue</button>
                                <button type="submit" id="add-service" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            {{-- add subservice modal --}}
            <div class="modal fade" id="add_subservice_modal" tabindex="-1" role="dialog"
                aria-labelledby="SubserviceModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="SubserviceModal">Add Sub Services</h4>
                        </div>
                        <form id="add_subservice_form" action="javascript:void(0);">
                            @csrf
                            <input type="hidden" id="service_id" name="service_id">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" id="name-input" name="name" class="form-control"
                                        placeholder="Sub_service Name" required>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="status">Active Status
                                    </label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" id="subservice_continue" class="btn btn-success">Save &
                                    Continue</button>
                                <button type="submit" id="add-service" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- add subservice modal --}}
            {{-- add variation modal --}}
            <div class="modal fade" id="add_variation_modal" tabindex="-1" role="dialog"
                aria-labelledby="variationModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="variationModal">Add Variation</h4>
                        </div>
                        <form id="add_variation_form">
                            @csrf
                            <input type="hidden" id="sub_service_id" name="sub_service_id">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" id="name-input" name="name" class="form-control"
                                        placeholder="Variation Name" required>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="status">Active Status
                                    </label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" id="variaton_continue" class="btn btn-success">Save &
                                    Continue</button>
                                <button type="submit" id="add-service" class="btn btn-success">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- add variation modal --}}
            {{-- add variationOption modal --}}
            <div class="modal fade" id="add_variationOption_modal" tabindex="-1" role="dialog"
                aria-labelledby="variationOptionModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="variationOptionModal">Set a Variation option</h4>
                        </div>
                        <form id="add_variation_option_form">
                            @csrf
                            <input type="hidden" id="variation_id" name="variation_id">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" id="name-input" name="name" class="form-control"
                                        placeholder="Variation Option" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="unit_measure" class="form-control"
                                        placeholder="Variation Option" required>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="price" min="1" step=".01" class="form-control"
                                        placeholder="Variation Option" required>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="status">Active Status
                                    </label>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button type="button" id="variatonOption_save" class="btn btn-success">Save &
                                    Finish</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- add variationOption modal --}}
            {{-- <div class="table-responsive">
                <table id="example3" class="display table table-data-width">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Added date</th>
                            <th>Sub Services</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Added date</th>
                            <th>Sub Services</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div> --}}
            {{-- nestable view services --}}<div>
                <div class="dd" id="nestable">
                    <ol class="dd-list">
                        @foreach ($services as $service)
                            <li class="dd-item" data-id="{{ $service->id }}">
                                <div class="dd-handle">{{ $service->name }}</div>
                                <ol class="dd-list">
                                    @foreach ($service->sub_services as $sub_service)
                                        <li class="dd-item" data-id="{{ $sub_service->id }}">
                                            <div class="dd-handle">{{ $sub_service->name }}</div>
                                            <ol class="dd-list">
                                                @foreach ($sub_service->variations as $variation)
                                                    <li class="dd-item" data-id="{{ $variation->id }}">
                                                        <div class="dd-handle">{{ $variation->name }}</div>
                                                        <ol class="dd-list">
                                                            <div class="table-responsive">
                                                                <table id="example3"
                                                                    class="display table table-data-width">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Unit Measure</th>
                                                                            <th>Price per Unit</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($variation->variation_options as $variation_option)
                                                                            <tr>
                                                                                <td>{{ $variation_option->name }}</td>
                                                                                <td>{{ $variation_option->unit_measure }}
                                                                                </td>
                                                                                <td>{{ $variation_option->price }}</td>
                                                                                <td>Action</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th>Name</th>
                                                                            <th>Unit Measure</th>
                                                                            <th>Price per Unit</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>
                                                        </ol>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </li>
                                    @endforeach
                                </ol>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{ asset('assets/admin/plugins/datatables/js/jquery.datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/nestable/jquery.nestable.js') }}"></script>
@endsection
@section('page_last_js')
    <script src="{{ asset('assets/admin/js/pages/ui-nestable.js') }}"></script>

    <script src="{{ asset('assets/admin/js/pages/table-data.js') }}"></script>
    <script>
        $('#service_all_save').click(function() {
            // e.preventDefault();
            $('#add_service_all_modal').modal('hide');
            $.blockUI({
                message: null
            });
            $.ajax({
                type: "POST",
                url: "{{ Route('add_service_all') }}",
                data: $('#add_service_all_form').serialize(),
                // dataType: "json",
                // encode: true,
            }).done(function(data) {
                console.log(data);
                $.unblockUI({
                    fadeOut: 200
                });
            });
        })
        $('#service_continue').click(function() {
            // e.preventDefault();
            $('#add_service_modal').modal('hide');
            $.blockUI({
                message: null
            });
            $.ajax({
                type: "POST",
                url: "{{ Route('add_service') }}",
                data: $('#add_service_form').serialize(),
                // dataType: "json",
                // encode: true,
            }).done(function(data) {
                console.log(data);
                $('#service_id').val(data)
                $.unblockUI({
                    fadeOut: 200
                });
                $('#add_subservice_modal').modal('show');
            });
            // $('#add_subservice_modal').modal('show');
        })
        $('#subservice_continue').click(function() {
            $('#add_subservice_modal').modal('hide');
            $.blockUI({
                message: null
            });
            $.ajax({
                type: "POST",
                url: "{{ Route('add_subservice') }}",
                data: $('#add_subservice_form').serialize(),
                // dataType: "json",
                // encode: true,
            }).done(function(data) {
                console.log(data);
                $('#sub_service_id').val(data)
                $.unblockUI({
                    fadeOut: 200
                });
                $('#add_variation_modal').modal('show');
            });
        })
        $('#variaton_continue').click(function() {
            $('#add_variation_modal').modal('hide');
            $.blockUI({
                message: null
            });
            $.ajax({
                type: "POST",
                url: "{{ Route('add_variation') }}",
                data: $('#add_variation_form').serialize(),
                // dataType: "json",
                // encode: true,
            }).done(function(data) {
                console.log(data);
                $('#variation_id').val(data)
                $.unblockUI({
                    fadeOut: 200
                });
                $('#add_variationOption_modal').modal('show');
            });

        })
        $('#variatonOption_save').click(function() {
            $('#add_variationOption_modal').modal('hide');
            $.blockUI({
                message: null
            });
            $.ajax({
                type: "POST",
                url: "{{ Route('add_variation_option') }}",
                data: $('#add_variation_option_form').serialize(),
                // dataType: "json",
                // encode: true,
            }).done(function(data) {
                console.log(data);
                $.unblockUI({
                    fadeOut: 200
                });
                // $('#add_variationOption_modal').modal('show');
            });
        })
    </script>
@endsection
