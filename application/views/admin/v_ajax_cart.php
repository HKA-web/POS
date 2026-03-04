<?php
$subtotal = 0;

if ($cart->num_rows() > 0) {

    foreach ($cart->result() as $item) {

        $row_subtotal = $item->harga_jual * $item->qty;
        $subtotal += $row_subtotal;
?>
<tr>
    <td><?= $item->nm_barang ?></td>

    <td width="80"><?= $item->qty ?></td>

    <td>Rp <?= number_format($row_subtotal) ?></td>

    <td width="30">
        <button class="btn btn-xs btn-danger"
                onclick="removeItem('<?= $item->kd_barang ?>')">
            <i class="fa fa-trash"></i>
        </button>
    </td>
</tr>
<?php
    }

} else {
?>
<tr>
    <td colspan="4" class="text-center text-muted"></td>
</tr>
<?php
}

$total = $subtotal;
?>

<script>
$('#subtotal').html('Rp <?= number_format($subtotal) ?>');

$('#total').html('Rp <?= number_format($total) ?>');

<?php if ($cart->num_rows() > 0) { ?>
    $('#empty-cart-msg').hide();
<?php } else { ?>
    $('#empty-cart-msg').show();
<?php } ?>
</script>