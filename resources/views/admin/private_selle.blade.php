@extends('admin.layout')
@section('content')

<div class="py-4">
    <div class="bg-white card-body-content p-4">
        <div class="filter-property">
            <h5 class="mb-3 f-medium">Filters</h5>
            {{-- <ul class="row list-unstyled">
                <li class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap position-relative">
                        <select>
                            <option selected disabled>
                                Select Type
                            </option>
                            <option value="">
                                Sale(2)
                            </option>
                            <option value="">
                                Rent(10)
                            </option>
                            <option value="">
                                Lease(12)
                            </option>
                        </select>
                        <div class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-building txb-color"></i>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap position-relative">
                        <select>
                            <option selected disabled>
                                Select Purpose
                            </option>
                            <option value="">
                                Home(2)
                            </option>
                            <option value="">
                                Commerical(10)
                            </option>
                            <option value="">
                                Land(12)
                            </option>
                        </select>
                        <div class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-bullseye txb-color"></i>
                        </div>
                    </div>
                </li>
                <li class="col-md-6 col-lg-4 mb-4">
                    <div class="form-elements-wrap position-relative">
                        <select>
                            <option selected disabled>
                                Select Price
                            </option>
                            <option value="">
                                Loweset Price 25
                            </option>
                            <option value="">
                               Heighest Price 25
                            </option>
                        </select>
                        <div class="position-absolute field-icon d-flex
                            align-items-center justify-content-center">
                            <i class="bi bi-cash-coin txb-color"></i>
                        </div>
                    </div>
                </li>
            </ul> --}}
        </div>
        <table class="table table-striped data-table-container data-table" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Picture</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript">
    $(function() {
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('user.private') }}",
                data: function(d) {
                    //   d.approved = $('#approved').val(),
                    //  d.search = $('input[type="search"]').val()
                }
            },
            columns: [
                {
                    data: 'name',
                    name: 'Name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'picture',
                    name: 'picture'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'action',
                    name: 'actions'
                },

            ]
        });

        //   $('#approved').change(function(){
        //       table.draw();
        //   });

    });
</script>
@endsection