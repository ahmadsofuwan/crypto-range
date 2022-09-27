<div class="border-rb rounded-3xl p-2 mx-32 mt-40">
    <div class="rounded-3xl bg-indigo-900 p-5 pb-4 grid grid-cols-1 divide-y">
        <div class="text-slate-300">
            <div class="flex">
                <img src="<?php echo base_url('asset/public/img/usdt.png') ?>" alt="Usdt" class="w-fit h-fit">
                <span class="mt-2 ml-2 font-extrabold text-lg" id="subCrypto"><?php echo number_format($account['crypto'], 3)  ?> Matic</span>

            </div>
            <a href="https://wa.me/<?= $upline['phone'] ?>" class="flex mt-3 w-fit">
                <svg class="h-fit w-11 fill-green-500 stroke-1 stroke-green-500" viewBox="0 0 24 24">
                    <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7 8.5 7 9.71C7 10.93 7.89 12.1 8 12.27C8.14 12.44 9.76 14.94 12.25 16C12.84 16.27 13.3 16.42 13.66 16.53C14.25 16.72 14.79 16.69 15.22 16.63C15.7 16.56 16.68 16.03 16.89 15.45C17.1 14.87 17.1 14.38 17.04 14.27C16.97 14.17 16.81 14.11 16.56 14C16.31 13.86 15.09 13.26 14.87 13.18C14.64 13.1 14.5 13.06 14.31 13.3C14.15 13.55 13.67 14.11 13.53 14.27C13.38 14.44 13.24 14.46 13 14.34C12.74 14.21 11.94 13.95 11 13.11C10.26 12.45 9.77 11.64 9.62 11.39C9.5 11.15 9.61 11 9.73 10.89C9.84 10.78 10 10.6 10.1 10.45C10.23 10.31 10.27 10.2 10.35 10.04C10.43 9.87 10.39 9.73 10.33 9.61C10.27 9.5 9.77 8.26 9.56 7.77C9.36 7.29 9.16 7.35 9 7.34C8.86 7.34 8.7 7.33 8.53 7.33Z" />
                </svg>
                <span class="uppercase my-auto">Reference</span>
            </a>

            <div class="font-extrabold mb-5 hidden">
                <div class="mt-2 mb-2">Address Wallet (Polygon)</div>
                <span id="copy" class="mb-5"><?php echo $commpany['walletAddress'] ?></span>
                <button onclick="copyToClipboard()" class="ml-2">
                    <svg class="w-6 h-6" fill="#9ca3af" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"></path>
                        <path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z"></path>
                    </svg>
                </button>
            </div>
            <div class="flex justify-center mb-2">
                <div class="hover:text-sm mx-2" id="cryptoSend">
                    <svg class="mx-auto w-7 hover:w-9 rounded-lg" fill="none" stroke="#94a3b8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span class="text-xs">Transfer</span>
                </div>

                <div class="hover:text-sm mx-2" id="criptoWidraw">

                    <svg class="mx-auto w-7 hover:w-9 rounded-lg" fill="none" stroke="#94a3b8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <span class="text-xs text-center">Withdraw</span>
                </div>
                <div class="hover:text-sm mx-2" id="cryptoClaim">
                    <svg class="mx-auto w-7 hover:w-9 rounded-lg" fill="none" stroke="#94a3b8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                    </svg>
                    <span class="text-xs text-center">Deposit</span>
                </div>

            </div>
        </div>

        <div>
            <div class="uppercase font-extrabold text-slate-500 mt-2 text-center">Transaction History</div>
            <div class="text-center overflow-y-auto text-slate-500 font-extrabold text-slate-500 h-80 mt-5" id="logs">

                <?php foreach ($logs as $key => $item) { ?>
                    <div class="flex justify-between border-b-2 mb-4 text-slate-300">
                        <div>
                            <div class="text-left"><?php echo $item['username'] ?></div>
                            <div class="text-slate-500"><?php echo $item['note'] ?></div>
                        </div>
                        <div class="text-right">
                            <div><?php echo $item['value'] ?></div>
                            <div class="text-slate-500"><?php echo date('d/m/Y H:i', $item['time'])  ?></div>
                        </div>
                    </div>
                <?php } ?>


            </div>
        </div>
    </div>
</div>
<script>
    var baseCrypto = "<?php echo number_format($account['crypto']) ?>";

    function copyToClipboard() {
        var copyText = $('#copy').text();
        navigator.clipboard.writeText(copyText).then(() => {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'copyed',
                showConfirmButton: false,
                timer: 1500
            })
        });
    }
    $('#cryptoSend').click(function() {
        var elemnt = '<div><input type="text" id="userTarget" class="swal2-input" placeholder="Username"></div>';
        elemnt += '<div><input type="number" id="cryptoPopUp" class="swal2-input" placeholder="Amount Matic"></div>';
        Swal.fire({
            title: '<div>Matic Balance <br> ' + baseCrypto + '<div>',
            html: elemnt,
            showCancelButton: true,
            confirmButtonText: 'Send',
            showLoaderOnConfirm: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var username = $('#userTarget').val()
                var crypto = $('#cryptoPopUp').val()
                $.ajax({
                        url: '<?php echo base_url('Game/ajax') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'sendCrypto',
                            crypto: crypto,
                            username: username,
                        },
                    })
                    .done(function(data) {
                        switch (data.status) {
                            case 'success':
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Your work has been Tarnfer',
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
                                    text: data.status,
                                })
                                break;
                        }
                    })
                    .fail(function(a) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    })
            }
        })
    })
    $('#cryptoClaim').click(function() {
        Swal.fire('Comming Soon')
        return
        var elemnt = '<div>Polygon Network</div><div><?= $commpany['walletAddress'] ?><button onclick="copyToClipboard()" class="ml-2"><svg class="w-6 h-6" fill="#9ca3af" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 9a2 2 0 012-2h6a2 2 0 012 2v6a2 2 0 01-2 2H9a2 2 0 01-2-2V9z"></path><path d="M5 3a2 2 0 00-2 2v6a2 2 0 002 2V5h8a2 2 0 00-2-2H5z"></path></svg></button></div><div><input type="text" id="tx" class="swal2-input" placeholder="Tx ID"></div>';
        Swal.fire({
            title: 'Transaction Detail',
            html: elemnt,
            showCancelButton: true,
            confirmButtonText: 'Send',
            showLoaderOnConfirm: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var tx = $('#tx').val()
                Swal.fire({
                    title: 'Loading!',
                    timer: 30000,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading()

                    },
                })
                $.ajax({
                        url: '<?php echo base_url('Game/ajax') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'cryptoClaim',
                            tx: tx,
                        },
                    })
                    .done(function(data) {
                        switch (data.status) {
                            case 'success':
                                Swal.fire({
                                    position: 'mid',
                                    icon: 'success',
                                    title: 'Success Top Up',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $('#cryptoWallet').text(data.crypto)
                                $('#crypto').text(data.crypto)
                                baseCrypto = data.crypto;
                                var logs = data.logs
                                var elemtLogs = ' <div class="flex justify-between border-b-4 mb-2 text-slate-300">';
                                elemtLogs += ' <div>';
                                elemtLogs += ' <div class="text-left">' + logs.username + '</div>';
                                elemtLogs += ' <div class="text-slate-500" >' + logs.note + '</div>';
                                elemtLogs += '</div>';
                                elemtLogs += ' <div class="text-right">';
                                elemtLogs += ' <div>' + logs.value + '</div>';
                                elemtLogs += ' <div class="text-slate-500">' + logs.date + '</div>';
                                elemtLogs += ' </div>';
                                elemtLogs += ' </div>';
                                var logs = elemtLogs + $('#logs').html();
                                $('#logs').html(logs);
                                break;
                            default:
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.status,
                                })
                                break;
                        }
                    })
                    .fail(function(a) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    })
            }
        })
    })
    $('#criptoWidraw').click(function() {
        var elemnt = '<div><input type="number" id="widrawVal" class="swal2-input" placeholder="Amount Matic" value="" min=""></div>';
        elemnt += '<div><input type="text" id="wallet" class="swal2-input" placeholder="Address Wallet (Polygon)"></div>';
        elemnt += '<span class="text-red-500">Ensure the network matches the withdrawal address and the deposit platform support it, or assets may be lost</span>';
        Swal.fire({
            title: '<div>Withdraw <div>',
            html: elemnt,
            showCancelButton: true,
            confirmButtonText: 'Withdraw',
            showLoaderOnConfirm: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                var widrawVal = $('#widrawVal').val()
                var wallet = $('#wallet').val()
                console.log(wallet)
                $.ajax({
                        url: '<?php echo base_url('Game/ajax') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'widraw',
                            widraw: widrawVal,
                            wallet: wallet,
                        },
                    })
                    .done(function(data) {
                        switch (data.status) {
                            case 'success':
                                Swal.fire({
                                    position: 'mid',
                                    icon: 'success',
                                    title: 'Success Reques',
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
                                    text: data.status,
                                })
                                break;
                        }
                    })
                    .fail(function(a) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    })
            }
        })
    })
</script>