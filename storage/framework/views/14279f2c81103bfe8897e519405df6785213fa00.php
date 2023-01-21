
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
                    <th>Cnic</th>
                    <th>Gender</th>
                    <th>Marital Status</th>
                    <th>Address</th>
                    <th>Phone Number </th>
                    <th>Interested in</th>
                    <th>Interested Area</th>
                    <th>Budget</th>



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
                url: "<?php echo e(route('application.house')); ?>",
                data: function(d) {
                    //   d.approved = $('#approved').val(),
                    //  d.search = $('input[type="search"]').val()
                }
            },
            columns: [
                {
                    data: 'full_name',
                    name: 'full_name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'cnic',
                    name: 'cnic'
                },

                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'status',
                    name: 'status'
                },

                {
                    data: 'address',
                    name: 'address'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'intrested_in',
                    name: 'intrested_in'
                },
                {
                    data: 'interested_in_details',
                    name: 'interested_in_details'
                },
                {
                    data: 'budget',
                    name: 'budget'
                },



            ]
        });

        //   $('#approved').change(function(){
        //       table.draw();
        //   });

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shinnyview_pk\resources\views/admin/application_form_house.blade.php ENDPATH**/ ?>