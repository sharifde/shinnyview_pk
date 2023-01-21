
<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('libraries/datatable/datatable.min.css')); ?>" />
    <script type="text/javascript" src="<?php echo e(asset('libraries/datatable/datatable.min.js')); ?>"></script>
    <div class="py-4">
        <div class="bg-white card-body-content p-4">
            <div class="filter-property">
                <h5 class="mb-3 f-medium">Filters</h5>
                
            </div>
            <table class="table table-striped data-table-container data-table" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
						<th>Email</th>
						<th>Expired on</th>
                        <th>Property Name</th>
                        <th>Price</th>
                        <th>Main Image</th>
                        <th>Status</th>
                        <th>Featured</th>
                        <th>Boost</th>
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
                "order": [[ '0', "desc" ]],
                ajax: {
                    url: "<?php echo e(route('admin.properties')); ?>",
                    data: function(d) {

                        //   d.approved = $('#approved').val(),
                        //  d.search = $('input[type="search"]').val()
                    }
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
					{
                        data: 'email',
                        name: 'Email'
                    },
					{
                        data: 'expired_on',
                        name: 'Expired on'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'is_admin',
                        name: 'status'
                    },
                    {
                        data: 'featured',
                        name: 'featured'
                    },
                    {
                        data: 'boost',
                        name: 'boost'
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

        function deletePropertyConfirm(delete_form_id) {
            swal({
                title: `Are you sure you want to delete?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    deleteProperty(delete_form_id);
                }
            });
        }

        function deleteProperty(delete_form_id) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
            // deleteCategoryJC.showLoading();

            // form = $("#" + delete_form_id)[0];

            // console.log(delete_form_id);
            // console.log(form);

            $.ajax({
                url: "<?php echo e(route('admin.destory.property')); ?>",
                type: "POST",
                data: {
                    id: delete_form_id,
                },

                success: function(res) {
                    console.info(res);
                    var table = $('.data-table').DataTable();
                    table.ajax.reload();

                },
                error: function(e) {
                    console.log(e.responseJSON);

                }
            }).always(function() {
                //deleteCategoryJC.hideLoading();
            })

        }


        function updateFeaturedAndBoostStatus(proeprty_id,bit) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $.ajax({
                url: "<?php echo e(route('admin.chagne_featured_boost.property')); ?>",
                type: "POST",
                data: {
                    id: proeprty_id,
                    bit: bit
                },

                success: function(res) {
                    console.info(res);
                    swal({
                        title: `Your property has been updated`,
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
        function updateFeaturedAndBoostStatus(proeprty_id,bit) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $.ajax({
                url: "<?php echo e(route('admin.chagne_featured_boost.property')); ?>",
                type: "POST",
                data: {
                    id: proeprty_id,
                    bit: bit
                },

                success: function(res) {
                    console.info(res);
                    swal({
                        title: `Your property has been updated`,
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
        function updateStatus(id) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $.ajax({
                url: "<?php echo e(route('admin.status.property')); ?>",
                type: "POST",
                data: {
                    id: id
                      },

                success: function(res) {
                    console.info(res);
                    swal({
                        title: `Your property has been updated`,
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
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/properties.blade.php ENDPATH**/ ?>