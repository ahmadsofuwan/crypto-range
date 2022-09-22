<div class="border-rb rounded-3xl p-2 mx-32 mt-40">
    <div class="rounded-3xl bg-indigo-900 p-5 pb-4 grid grid-cols-1 divide-y">
        <div class="text-slate-300">
            <div class="flex">
                <img src="<?php echo base_url('asset/public/img/usdt.png') ?>" alt="Usdt" class="w-fit h-fit">
                <span class="mt-2 ml-2 font-extrabold text-lg" id="subCrypto"><?php echo number_format($account['crypto'], 3)  ?> Matic</span>

            </div>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                    </svg>
                    <span class="text-xs">Transfer</span>
                </div>

                <div class="hover:text-sm mx-2" id="criptoWidraw">
                    <svg class="mx-auto w-7 hover:w-9 rounded-lg" fill="none" stroke="#94a3b8" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
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
        elemnt += '<div><input type="number" id="cryptoPopUp" class="swal2-input" placeholder="Total Matic"></div>';
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
                                    position: 'mid',
                                    icon: 'success',
                                    title: 'Success Tranfer',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                                $('#subCrypto').text(data.crypto)
                                $('#crypto').text(data.crypto)
                                baseCrypto = data.crypto;
                                var logs = data.logs
                                //admin fee
                                var elemtLogs = ' <div class="flex justify-between border-b-4 mb-2 text-slate-300">';
                                elemtLogs += ' <div>';
                                elemtLogs += ' <div class="text-left">' + logs.username + '</div>';
                                elemtLogs += ' <div class="text-slate-500" >Admin Fee</div>';
                                elemtLogs += '</div>';
                                elemtLogs += ' <div class="text-right">';
                                elemtLogs += ' <div>' + data.adminFee + '</div>';
                                elemtLogs += ' <div class="text-slate-500">' + logs.date + '</div>';
                                elemtLogs += ' </div>';
                                elemtLogs += ' </div>';

                                //tf
                                elemtLogs += ' <div class="flex justify-between border-b-4 mb-2 text-slate-300">';
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
    $('#cryptoClaim').click(function() {
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
        var elemnt = '<div><input type="number" id="widrawVal" class="swal2-input" placeholder="Withdraw" value="" min=""></div>';
        elemnt += '<div><input type="text" id="wallet" class="swal2-input" placeholder="Address Wallet"></div>';
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
                                var logs = data.logs


                                //windraw
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
                                $('#logs').html(logs)
                                $('#subCrypto').text(data.crypto)
                                $('#crypto').text(data.crypto)
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