<div class="mx-5 my-y p-5 bg-blue-900 rounded-3xl gradient-border mt-5 opacity-95">
    <div class=" text-center">
        <h2 class="text-3xl font-extrabold flex justify-content-center text-slate-300">
            <svg style="width:24px;height:24px" class="animate-spin" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,2.6L9,12.4L2,19.9L12,17.6L22,20L15,12.5L12,2.6Z" />
            </svg>
            <span class="mx-5">GLOBAL POOLS</span>
            <svg style="width:24px;height:24px" class="animate-spin" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,2.6L9,12.4L2,19.9L12,17.6L22,20L15,12.5L12,2.6Z" />
            </svg>
        </h2>
        <h2 class="text-xl text-yellow-500 font-extrabold flex justify-content-center"> <span class="mx-5">VIP POOLS</span></h2>
    </div>
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 gap-2 mt-5">
        <?php foreach ($item as $key => $value) { ?>


            <div class="border-rb rounded-3xl p-0.5">
                <div class="rounded-3xl bg-indigo-900 pr-5 pb-4 grid grid-cols-1 divide-y">
                    <div class="text-slate-300">

                        <div class="flex justify-start opacity-0">
                            <div class="z-0 w-fit bg-gradient-to-b from-orange-600 to-amber-800 p-1 flex rounded-br-xl rounded-tl-3xl mb-2 font-extrabold">
                                <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17.66 11.2C17.43 10.9 17.15 10.64 16.89 10.38C16.22 9.78 15.46 9.35 14.82 8.72C13.33 7.26 13 4.85 13.95 3C13 3.23 12.17 3.75 11.46 4.32C8.87 6.4 7.85 10.07 9.07 13.22C9.11 13.32 9.15 13.42 9.15 13.55C9.15 13.77 9 13.97 8.8 14.05C8.57 14.15 8.33 14.09 8.14 13.93C8.08 13.88 8.04 13.83 8 13.76C6.87 12.33 6.69 10.28 7.45 8.64C5.78 10 4.87 12.3 5 14.47C5.06 14.97 5.12 15.47 5.29 15.97C5.43 16.57 5.7 17.17 6 17.7C7.08 19.43 8.95 20.67 10.96 20.92C13.1 21.19 15.39 20.8 17.03 19.32C18.86 17.66 19.5 15 18.56 12.72L18.43 12.46C18.22 12 17.66 11.2 17.66 11.2M14.5 17.5C14.22 17.74 13.76 18 13.4 18.1C12.28 18.5 11.16 17.94 10.5 17.28C11.69 17 12.4 16.12 12.61 15.23C12.78 14.43 12.46 13.77 12.33 13C12.21 12.26 12.23 11.63 12.5 10.94C12.69 11.32 12.89 11.7 13.13 12C13.9 13 15.11 13.44 15.37 14.8C15.41 14.94 15.43 15.08 15.43 15.23C15.46 16.05 15.1 16.95 14.5 17.5H14.5Z" />
                                </svg>
                                HOT
                            </div>
                        </div>

                        <div class="flex justify-center"><img src="<?= base_url('asset/public/img/usdt.png') ?>" alt="Usdt" class="w-20 lg:w-14"></div>
                        <div class="text-center font-extrabold"><?= $value['percentage'] ?>%</div>
                        <div class="text-center mb-4 mt-2 font-extrabold text-yellow-500"><?= number_format($value['fee'], 2) ?> Matic</div>
                        <?php
                        $limited = 0;
                        foreach ($limit as $Lkey => $Lvalue) {
                            if ($Lvalue['globalkey'] == $value['pkey']) {
                                $limited = $Lvalue['limited'];
                            }
                        }
                        ?>

                        <div class="text-center mb-4 mt-2 font-extrabold text-green-500">Your Slot <?= $value['limit'] ?>/<?= $limited ?></div>
                    </div>
                    <div>
                        <div class="uppercase font-extrabold text-slate-500 mt-2 text-center">Limit</div>
                        <div class="text-center text-slate-300 font-black text-2xl mt-4"><?= number_format($value['limit_count']) ?>/<?= number_format($value['count']) ?></div>
                        <button class="capitalize text-slate-300 mt-4 bg-indigo-500 w-full py-1 rounded-lg bg-gradient-to-r from-violet-900 to-fuchsia-700 btn-stake" value="<?= $value['pkey'] ?>">Burn <span class="text-yellow-500"> <?= number_format($value['price']) ?> Matic</span></button>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</div>
<script>
    $('.btn-stake').click(function() {
        var val = $(this).val()
        $.ajax({
                url: '<?= base_url('Game/ajax') ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'gpool',
                    data: val,
                },
            })
            .done(function(a) {
                switch (a.status) {
                    case 'success':
                        Swal.fire({
                            position: 'mid',
                            icon: 'success',
                            title: 'Success Burn Slot',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 1800);
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