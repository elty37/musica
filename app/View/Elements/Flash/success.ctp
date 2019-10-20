<div id="<?php echo $key; ?>Message" class="<?php echo !empty($params['class']) ? $params['class'] : 'message'; ?>">
    <?php echo $message; ?>
</div>

<style>
#<?php echo $key; ?>Message{
    background-color:#00A0E9;
    color:white;
    font-size: 20px;
    display: block;
    width: 30%;
    height: 5%;
    position: fixed;
    top: 50%;
    left: 35%;
    overflow: hidden;
    white-space: nowrap;
    z-index: 997;
    display: -webkit-flex;
    display: flex;
    -webkit-align-items: center; /* 縦方向中央揃え（Safari用） */
    align-items: center; /* 縦方向中央揃え */
    -webkit-justify-content: center; /* 横方向中央揃え（Safari用） */
    justify-content: center; /* 横方向中央揃え */
    border-radius: 10px;
}
</style>

<script>
    $(function(){
        var id = "#<?php echo $key; ?>Message";
        $(id).click(function() {
            $(id).hide();
        });
    });
</script>