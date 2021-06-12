<!DOCTYPE html>
<html>
    <body>
        <table width="400px"  border="1px">
            <?php
                for($row=0;$row<8;$row++){
                    echo '<tr>';
                    for($col=0;$col<8;$col++){
                        $squers = $row+$col;
                        if($squers%2==0){
                            echo '<td width=50px height=50px bgcolor=ffffff></td>';
                        }else{
                            echo '<td width=50px height=50px bgcolor=000000></td>';
                        }
                    }
                    echo '</tr>';
                }
            ?>
        </table>
    </body>
</html>