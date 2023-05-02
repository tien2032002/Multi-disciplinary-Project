<?php
    foreach($revenueList as $date => $hire) {
        if ($hire['sum'] == 0) continue;
        echo '
        <tr>
            <th scope="row">'.$date.'/'.$month.'</th>
            <td>'.number_format($hire['sum'], 0).'đ</td>
            <td>'.number_format($hire['number'], 0).'</td>
        </tr>
        ';
    }
?>