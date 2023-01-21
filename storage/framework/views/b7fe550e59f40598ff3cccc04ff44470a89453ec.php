
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
                    <th>Email</th>
                    <th>Picture</th>
                    <th>Company Name</th>
                    <th>Phone</th>
                    <th>Package</th>
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
                url: "<?php echo e(route('user.agent')); ?>",
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
                    data: 'company',
                    name: 'company'
                },
                {
                    data: 'number',
                    name: 'number'
                },
                {
                    data: 'package',
                    name: 'package'
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
                url: "<?php echo e(route('update.status')); ?>",
                type: "POST",
                data: {
                    id: id
                      },

                success: function(res) {
                    console.info(res);
                    swal({
                        title: `Your User has been updated`,
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
        function deleteUser(id) {
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

            $.ajax({
                url: "<?php echo e(route('user.destory')); ?>",
                type: "POST",
                data: {
                    id: id
                      },

                success: function(res) {
                    console.info(res);
                    swal({
                        title: `Your User has been delted Successfully`,
                        icon: "success",
                        buttons: true,
                        dangerMode: false,
                    })

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

</script>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/agent.blade.php ENDPATH**/ ?>