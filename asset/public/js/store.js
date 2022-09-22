$(document).ready(function () {
    $('.buy').click(function (e) { 
        var data = $(this).attr('data');
        var baseurl = $(this).attr('data-baseurl');
        var name = $(this).attr('data-name');
        var price = $(this).attr('data-price');
        var level = $(this).attr('data-level');
        var img = $(this).attr('data-img');
        Swal.fire({
            imageUrl: baseurl+'/uploads/'+img,
            imageHeight: 100,
            title: 'Apakah Yakin Membeli',
            text: name+'(lv'+level+') : '+price,
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseurl+'/Game/ajax',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        data: data,
                        action:'buy',
                    },
                })
                .done(function(data) {
                    if(data.status =='success'){
                        $('#saldo').text(data.saldo)
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Pembelian berhasil',
                            showConfirmButton: false,
                            timer: 1500
                          })
                    }else if(data.status =='not enough'){
                        Swal.fire({
                            icon: 'error',
                            title: 'Saldo Anda Tidak Mencukupi',
                            text: 'Silahkan Isi Terlebih dahulu!',
                          })
                    }
                    

        
                })
                .fail(function(a) {
                    console.log(a);
                    console.log('error');
                })
              

            }
          })
        
    });
});