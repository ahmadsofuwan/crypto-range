<div class="mx-5 my-y p-5 bg-blue-900 rounded-3xl gradient-border mt-5 opacity-95 text-slate-300">
    <div class=" text-center">
        <h2 class="text-3xl font-extrabold flex justify-content-center">
            <svg style="width:24px;height:24px" class="animate-spin" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,2.6L9,12.4L2,19.9L12,17.6L22,20L15,12.5L12,2.6Z" />
            </svg>
            <span class="mx-5">NETWORK POOL</span>
            <svg style="width:24px;height:24px" class="animate-spin" viewBox="0 0 24 24">
                <path fill="currentColor" d="M12,2.6L9,12.4L2,19.9L12,17.6L22,20L15,12.5L12,2.6Z" />
            </svg>
        </h2>
        <h2 class="text-xl text-yellow-500 font-extrabold flex justify-content-center"> <span class="mx-5">TOP RANK 1-10</span></h2>
    </div>
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-3 xl:grid-cols-3 gap-2 mt-5">

        <div class="grid grid-cols-1 gap-2 mt-5 h-fit">
            <div class="text-center font-bold text-xl capitalize text-yellow-300">POOL</div>
            <div class="text-center font-bold text-xl capitalize text-yellow-300 ">
                <div class="flex justify-content-center">
                    <img src="<?php echo base_url('asset/public/img/') ?>bsud.png" alt="Logo" class="w-8">
                    <?= number_format($feeOne, 2)  ?>
                    Matic
                </div>
                <div class="text-green-500"><?= $npoolFee[0] ?>%</div>
            </div>
            <?php foreach ($rangeOne as $key => $value) { ?>

                <div class="border-rb rounded-3xl p-0.5">
                    <div class="rounded-3xl bg-indigo-900 p-3 grid grid-cols-3 ">
                        <span><?= $key + 1 ?> : <?= $value['username'] ?></span>
                        <span><?= $claimFee[$key] ?>%</span>
                        <?php if ($value['userkey'] == $this->id && $key == 0) { ?> <button class="bg-yellow-500  rounded-xl font-bold w-1/2 ml-auto hover:bg-yellow-700 btn-claim   " target="1">Claim</button><?php } ?>
                    </div>
                </div>

            <?php } ?>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btn-claim').click(function() {

            $.ajax({
                    url: '<?= base_url('Game/ajax') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'claim',
                        target: $(this).attr('target'),
                    },
                })
                .done(function(response) {
                    if (response.status == 'success') {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been claim',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout(function() {
                            location.reload();
                        }, 1800);
                    }
                })
                .fail(function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                })
        })

    });
</script>