<h1 class="text-center mt-5">Input Referral</h1>
<form method="post">
    <div class="row" style="width: 50%;margin-left: 25%;margin-right: 25%;">
        <div class="col-sm-12" style="display: none;">
            <div class="row">
                <div class="col-sm-10">
                    <input type="hidden" name="pkey[]">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="ref[]" placeholder="Reward refferal" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2"><b class="text-danger btn btn-delete">X</b></div>
            </div>
        </div>

        <?php if (count($data) == 0) { ?>
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-10">
                        <input type="hidden" name="pkey[]">
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="ref[]" placeholder="Reward refferal" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2"><b class="text-danger btn">X</b></div>
                </div>
            </div>
        <?php } else { ?>

            <?php for ($i = 0; $i < count($data); $i++) { ?>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-10">
                            <input type="hidden" name="pkey[]" value="<?php echo $data[$i]['pkey'] ?>">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="ref[]" placeholder="Reward refferal" aria-describedby="basic-addon2" value="<?php echo $data[$i]['percentage'] ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2"><b class="text-danger btn btn-delete">X</b></div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>


        <div class="col-sm-12">
            <a class="btn btn-primary mt-2" id="add">Tambah</a>
            <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
        </div>
    </div>
</form>

<script>
    $('#add').click(function() {
        var baseRow = $('form').find('.row').find('.col-sm-12')
        baseRow = baseRow[0]
        $(baseRow).show()

        var obj = $('form').find('.row')
        var clone = $(obj).find('.col-sm-12')[0];
        var clone = $(clone).clone(true);
        var length = $(obj).find('.col-sm-12').length;
        $('form> .row').append(clone);
        var newObj = $('form').find('.col-sm-12')[length];
        var targetObj = $('form').find('.col-sm-12')[length - 1]
        $(targetObj).insertAfter(newObj);
        $(baseRow).hide()
    })
    $('.btn-delete').click(function() {
        $(this).closest('.col-sm-12').remove()
    })
</script>