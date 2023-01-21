@extends('admin.layout')
@section('content')

<div class="py-4">
    <div class="bg-white card-body-content p-4">
        <div class="filter-property">
            <h5 class="mb-3 f-medium">Filters</h5>
        </div>
        <table class="table table-striped data-table-container data-table" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Picture</th>
                    <th>Min Price</th>
                    <th>Max Price</th>
                    <th>Views</th>
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
                // url: "{{ route('user.agent') }}",
                url: "{{ route('admin.projects.details') }}",
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
                    data: 'picture',
                    name: 'picture'
                },
                {
                    data: 'min_price',
                    name: 'min_price'
                },
                {
                    data: 'max_price',
                    name: 'max_price'
                },
                {
                    data: 'views',
                    name: 'views'
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

    function updateStatus(id) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $.ajax({
                url: "{{ route('update.project.status') }}",
                type: "POST",
                data: {
                    id: id
                      },

                success: function(res) {
                    console.info(res);
                    swal({
                        title: `Project Successfully updated`,
                        icon: "success",
                        buttons: true,
                        dangerMode: false,
                    })

                   // var table = $('.data-table').DataTable();
                 //   table.ajax.reload();

                },
                error: function(e) {
                    console.log(e.responseJSON);

                }
            }).always(function() {
                //deleteCategoryJC.hideLoading();
            })

        }

        // deleteProject
        function deleteProject(id){
        postData = {
            "_token": "{{ csrf_token() }}",
            'id': id,
        }
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: window.livewire_app_url + '/admin/delete-entire-project',
                    data: postData,
                    type: 'POST',
                    success: function(res) {
                        swal({title: "Your Data is Deleted!"}).then(function() {
                            location.reload(); 
                        });
                    },
                    error: function (jqXHR, exception) {
                        displayErrors(jqXHR, exception);
                    }
                });
            } else {
                swal({title: "Your Data is Not Deleted!"});
            }
        });
    }

</script>
@endsection
@push('js')

@endpush