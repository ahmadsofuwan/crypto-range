<div class="mx-5 my-y p-5 bg-blue-900 rounded-3xl gradient-border mt-5 opacity-95 text-slate-300">
    <div class="text-center">
        <h2 class="text-3xl font-extrabold">MATIC</h2>
        <img src="<?php echo base_url('asset/public/img/') ?>usdt.png" alt="Logo" class="w-14 mx-auto mt-2">
    </div>
    <div class="text-center my-3">
        <h2 class="text-3xl font-extrabold text-yellow-400">$<span id="matic"></span></h2>
        <h2 class="text-3xl font-extrabold text-green-400">$<span id="realmeetic"></span>/1 Matic</h2>
    </div>

</div>
<div class="mx-5 my-y p-5 bg-blue-900 rounded-3xl gradient-border mt-5 opacity-95 text-slate-300">
    <div class="text-center">
        <span class="text-2xl font-extrabold"><?= $data['username'] ?></span>
        <h2 class="text-2xl font-extrabold">Total Networks</h2>
        <a class="text-green-500 font-extrabold text-3xl" id="refral">
            Copy Refferal
            <input type="text" id="refralLink" style="display: none;" value="<?= base_url('Referral/share/' . $this->username) ?>">
        </a>

    </div>
    <div class="grid sm:grid-cols-1 gap-4 lg:grid-cols-3 md:grid-cols-1 gap-2 mt-5">
        <?php $status  = false ?>
        <?php foreach ($reff as $key => $value) { ?>

            <div class="border-rb rounded-3xl p-0.5">

                <div class="rounded-3xl bg-indigo-900 pr-5 pb-4 p-3">
                    <div class="text-center font-black text-green-500">Active</div>
                    <?php if ($value['count'] < 6 && $key == 0) {
                        $status = true;
                    }  ?>
                    <span class="flex justify-content-start">
                        <svg class="fill-red-500 h-fit w-8 animate-pulse" viewBox="0 0 24 24">
                            <path d="M17.66 11.2C17.43 10.9 17.15 10.64 16.89 10.38C16.22 9.78 15.46 9.35 14.82 8.72C13.33 7.26 13 4.85 13.95 3C13 3.23 12.17 3.75 11.46 4.32C8.87 6.4 7.85 10.07 9.07 13.22C9.11 13.32 9.15 13.42 9.15 13.55C9.15 13.77 9 13.97 8.8 14.05C8.57 14.15 8.33 14.09 8.14 13.93C8.08 13.88 8.04 13.83 8 13.76C6.87 12.33 6.69 10.28 7.45 8.64C5.78 10 4.87 12.3 5 14.47C5.06 14.97 5.12 15.47 5.29 15.97C5.43 16.57 5.7 17.17 6 17.7C7.08 19.43 8.95 20.67 10.96 20.92C13.1 21.19 15.39 20.8 17.03 19.32C18.86 17.66 19.5 15 18.56 12.72L18.43 12.46C18.22 12 17.66 11.2 17.66 11.2M14.5 17.5C14.22 17.74 13.76 18 13.4 18.1C12.28 18.5 11.16 17.94 10.5 17.28C11.69 17 12.4 16.12 12.61 15.23C12.78 14.43 12.46 13.77 12.33 13C12.21 12.26 12.23 11.63 12.5 10.94C12.69 11.32 12.89 11.7 13.13 12C13.9 13 15.11 13.44 15.37 14.8C15.41 14.94 15.43 15.08 15.43 15.23C15.46 16.05 15.1 16.95 14.5 17.5H14.5Z" />
                        </svg>
                        <span class="mr-2 text-xs text-red-500"><?= $reffFee[$key] ?>%</span>
                        <span class="font-black text-green-500">Lv<?= $value['level'] ?></span>
                        <?php if ($key == 0) { ?>
                            <span class="ml-auto font-black">
                                <?= $value['count'] ?>
                            </span>
                        <?php } else { ?>
                            <span class="ml-auto font-bold">
                                <?= $value['count'] ?>
                            </span>
                        <?php } ?>

                    </span>

                </div>
            </div>
            <?php if ($status) break; ?>
        <?php } ?>

    </div>
</div>



<script>
    <?php
    if (!empty($this->session->flashdata('active')) && $this->session->flashdata('active')) { ?>
        Swal.fire({
            icon: 'warning',
            title: '<span class="text-green-500">Success!<span>',
            allowOutsideClick: false,
            showConfirmButton: true,
            text: '<?= $this->session->flashdata('msg') ?>',
        })
    <?php } ?>


    <?php if (!empty($this->session->flashdata('nonActive')) && $this->session->flashdata('nonActive')) { ?>
        Swal.fire({
            icon: 'warning',
            title: '<span class="text-red-500">REMINDER!!!<span>',
            allowOutsideClick: false,
            showConfirmButton: false,
            text: '<?= $this->session->flashdata('msg') ?>',
            footer: '<a class="font-bold text-green-500" href="<?= base_url('Game/crypto') ?>">WALLET</a> <span class="ml-auto font-bold text-green-500"><?= $this->session->flashdata('reff') ?></span>',
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
    var matic = <?= $data['crypto'] ?>;
    maticInt()

    function maticInt() {
        $.ajax({
                url: 'https://api.coingecko.com/api/v3/simple/price',
                type: 'GET',
                dataType: 'json',
                data: {
                    ids: 'aave-polygon-wmatic',
                    vs_currencies: 'usd',
                },
            })
            .done(function(a) {
                $('#matic').text(matic * a['aave-polygon-wmatic']['usd'])
                $('#realmeetic').text(a['aave-polygon-wmatic']['usd'])

            })
    }
    setInterval(function() {
        maticInt()
    }, 5000);
</script>