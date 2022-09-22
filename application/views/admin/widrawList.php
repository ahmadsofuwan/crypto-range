<div class="row">
    <div class="col-sm-2">
        <a href="<?php echo base_url($form) ?>"><i class="fa fa-plus fa-2x"></i></a>
    </div>
</div>
<table class="table table-responsive-sm" id="dataTable">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Username</th>
            <th scope="col">BUSD</th>
            <th scope="col">Wallet</th>
            <th scope="col">Waktu</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dataList as $value) {
            $status = '';
            switch ($value['status']) {
                case 1:
                    $status = 'success';
                    break;
                case 2:
                    $status = 'faild';
                    break;
                case 0:
                    $status = 'Pending';
                    break;
            }

        ?>
            <tr>
                <td><?php echo $value['username'] ?></td>
                <td><?php echo $value['crypto'] ?></td>
                <td>
                    <span><?php echo $value['walletaddress'] ?></span>
                    <button data="<?php echo $value['walletaddress'] ?>" class="ml-2 btn btn-link text-success cpy">Copy</button>
                </td>
                <td><?php echo date('d M Y H:i', $value['time'])  ?></td>
                <td class="status"><?php echo $status ?></td>
                <td style="width: 180px;">
                    <button <?php echo $value['status'] <> 0 ? 'disabled' : '' ?> class="btn btn-success" name="accept" value="<?php echo $value['pkey'] ?>">Accept</button>
                    <button <?php echo $value['status'] <> 0 ? 'disabled' : '' ?> class="btn btn-danger" name="rijeck" value="<?php echo $value['pkey'] ?>">Rijeck</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('tbody').find('[name=accept]').click(function() {
        var obj = $(this);
        var pkey = $(this).val();
        Swal.fire({
            title: 'yakin?',
            text: "Data Akan Di Update Permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Accept!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                        url: '<?= base_url('Admin/ajax') ?>',
                        type: 'POST',
                        dataType: "json",
                        data: {
                            action: 'accept',
                            pkey: pkey,
                        },
                    })
                    .done(function(a) {
                        console.log(a)
                        if (a.status == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Berhasil Accept',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $(obj).closest('tr').find('.status').text('success');
                            $(obj).closest('tr').find('button').prop('disabled', true);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: a.status,
                            })
                        }
                    })
                    .fail(function(a) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    })



            }
        })
    })
    $('tbody').find('[name=rijeck]').click(function() {
        var obj = $(this);
        var pkey = $(this).val();
        Swal.fire({
            title: 'yakin?',
            text: "Data Akan Di Update Permanen",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Rijeck!'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                        url: '<?= base_url('Admin/ajax') ?>',
                        type: 'POST',
                        dataType: "json",
                        data: {
                            action: 'rijeck',
                            pkey: pkey,
                        },
                    })
                    .done(function(a) {
                        console.log(a)
                        if (a.status == 'success') {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Berhasil Rijeck',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $(obj).closest('tr').find('.status').text('fail');
                            $(obj).closest('tr').find('button').prop('disabled', true);
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: a.status,
                            })
                        }
                    })
                    .fail(function(a) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    })



            }
        })
    })
    $('.cpy').click(function() {
        var copyText = $(this).closest('td').find('span').text();
        console.log(copyText);
        navigator.clipboard.writeText(copyText).then(() => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'copyed',
                showConfirmButton: false,
                timer: 1500
            })
        });
    })
</script>