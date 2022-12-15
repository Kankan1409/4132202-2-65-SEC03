<?php
include "condb.php";
?>
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Lestname</th>
        </tr>
    </thead>
    <body>
        <?php
        $sql = "SELECT * FROM tb_user ORDER BY user_id ASC";
        $result = mysqli_query($link,$sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <th><?=$row['user_id']?></th>
            <th><?=$row['user_name']?></th>
            <th><?=$row['user_pass']?></th>
            <th><button class="btn_edit" data="<?=$row['user_id']?>">EDIT</button></th>
            <th><button class="btn_del" data="<?=$row['user_id']?>">DEL</button></th>
        </tr>
    <?php
        }
    ?>
    </body>
</table>

<script>
    $(".btn_del").click(function(){
        let id_val = $(this).attr("data");
        $.ajax({
            url:"/model/user_del.php",
            method:"GET",
            data: fm_data,
            success: function(res){
                $("#div_res").html(res);
                $("#div_action").load("/model/user_data.php");
            }
        })
    })
</script>