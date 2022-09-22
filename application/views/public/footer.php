    <script>
        $('#refral').click(function() {
            $('#refralLink').show()
            var data = $('#refralLink');
            data.select();
            document.execCommand("copy");
            $('#refralLink').hide()
            Swal.fire({
                position: 'mid',
                icon: 'success',
                title: 'Referral Copied',
                showConfirmButton: false,
                timer: 1500
            })
        })
    </script>
    </body>

    </html>