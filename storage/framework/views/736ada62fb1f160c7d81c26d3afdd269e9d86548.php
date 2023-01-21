
<?php $__env->startSection('content'); ?>

<div class="py-4">
    <div class="bg-white card-body-content p-4">
        <div class="filter-property">
            <h5 class="mb-3 f-medium">Filters</h5>
        </div>
        <table class="table table-striped data-table-container data-table" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
					<th>Banner</th>
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
                // url: "<?php echo e(route('user.agent')); ?>",
                url: "<?php echo e(route('admin.advs.details')); ?>",
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
                    data: 'logo',
                    name: 'Banner'
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
                url: "<?php echo e(route('update.advs.status')); ?>",
                type: "POST",
                data: {
                    id: id
                      },

                success: function(res) {
                    console.info(res);
                    swal({
                        title: `Status Successfully updated`,
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

        // deleteAdvertisment
        function deleteAdvertisment(id){
        postData = {
            "_token": "<?php echo e(csrf_token()); ?>",
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
                    url: window.livewire_app_url + '/admin/delete-advertisment',
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/advertisment/advertisment-list.blade.php ENDPATH**/ ?>