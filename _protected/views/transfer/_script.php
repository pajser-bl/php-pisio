<<<<<<< HEAD
<?php
use yii\helpers\Url;

?>
<script>
    function addRow<?= $class ?>() {
        var data = $('#add-<?= $relID?> :input').serializeArray();
        data.push({name: '_action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-'.$relID]); ?>',
            data: data,
            success: function (data) {
                $('#add-<?= $relID?>').html(data);
            }
        });
    }
    function delRow<?= $class ?>(id) {
        $('#add-<?= $relID?> tr[data-key=' + id + ']').remove();
    }
</script>
=======
<?php
use yii\helpers\Url;

?>
<script>
    function addRow<?= $class ?>() {
        var data = $('#add-<?= $relID?> :input').serializeArray();
        data.push({name: '_action', value : 'add'});
        $.ajax({
            type: 'POST',
            url: '<?php echo Url::to(['add-'.$relID]); ?>',
            data: data,
            success: function (data) {
                $('#add-<?= $relID?>').html(data);
            }
        });
    }
    function delRow<?= $class ?>(id) {
        $('#add-<?= $relID?> tr[data-key=' + id + ']').remove();
    }
</script>
>>>>>>> d544a114781609b84ad2cd2b8a06b4be215bdec5
