<div class="mx-5 my-y p-5 bg-blue-900 rounded-3xl gradient-border mt-5 opacity-95 text-slate-300">
    <div class="text-center">
        <h2 class="text-2xl font-extrabold">Balance</h2>
    </div>
    <div class="text-center my-3">
        <h2 class="text-3xl font-extrabold text-yellow-400">$ 0,743793</h2>
    </div>

</div>
<div class="mx-5 my-y p-5 bg-blue-900 rounded-3xl gradient-border mt-5 opacity-95 text-slate-300">
    <div class="text-center">
        <h2 class="text-2xl font-extrabold">Total Network</h2>
        <a class="text-green-500 font-extrabold text-3xl" id="refral">
            Copy Refferal
            <input type="text" id="refralLink" style="display: none;" value="<?= base_url('Refral/shere/' . $this->username) ?>">
        </a>

    </div>
    <div class="grid sm:grid-cols-1 gap-4 lg:grid-cols-4 md:grid-cols-2 gap-2 mt-5">
        <?php foreach ($reff as $key => $value) { ?>
            <div class="border-rb rounded-3xl p-0.5">
                <div class="rounded-3xl bg-indigo-900 pr-5 pb-4 p-3 flex">
                    <span class=""> UserName : <?= $value['username'] ?></span>
                    <span class="ml-auto mr-3"> Lv <?= $value['level'] ?></span>
                </div>
            </div>
        <?php } ?>

    </div>
</div>



<script>
    <?php
    if (!empty($this->session->flashdata('active')) && $this->session->flashdata('active')) { ?>
        Swal.fire({
            icon: 'warning',
            title: '<span class="text-green-500">Thank You<span>',
            allowOutsideClick: false,
            showConfirmButton: true,
            text: '<?= $this->session->flashdata('msg') ?>',
        })
    <?php } ?>


    <?php if (!empty($this->session->flashdata('nonActive')) && $this->session->flashdata('nonActive')) { ?>
        Swal.fire({
            icon: 'warning',
            title: '<span class="text-red-500">Warning<span>',
            allowOutsideClick: false,
            showConfirmButton: false,
            text: '<?= $this->session->flashdata('msg') ?>',
            footer: '<a class="font-bold text-sky-400" href="<?= base_url('Game/crypto') ?>">P2P Matic</a> <span class="ml-auto font-bold text-sky-400"><?= $this->session->flashdata('reff') ?></span>',
        })
    <?php } ?>

    $('.btn-stake').click(function() {
        var val = $(this).val()
        $.ajax({
                url: '<?php echo base_url('Game/ajax') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'buy',
                    data: val,
                },
            })
            .done(function(a) {
                switch (a.status) {
                    case 'success':
                        Swal.fire({
                            position: 'mid',
                            icon: 'success',
                            title: 'Success Add Your Item',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#crypto').text(a.crypto);
                        break;
                    default:
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: a.status,
                        })
                        break;
                }
            })
            .fail(function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            })

    })
</script>