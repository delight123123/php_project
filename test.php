<?php

require('./DBconnect.php');
require_once('./pagingInfo.php');

while($row=tblregister(mysqli_query($link,$listsql))){
    if($row['delflag']=='N'){ ?>
<tr>
    <td><?=$row['reboard_no'] ?></td>
    <td><?=$row['reboard_title'] ?></td>
    <td><?=$row['userid'] ?></td>
    <td><?=$row['reboard_reg'] ?></td>
    <td><?=$row['readcount'] ?></td>
</tr>

<?php	}
}

?>