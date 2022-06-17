<?php

require_once  $_SERVER['DOCUMENT_ROOT'] . '/DR/src/database/db.php';

$query = $DB->selectAll('tb_register_company')->orderby('companyname')->execute();
$rowHR = $DB->fetchQuery($query);

if (isset($_POST["searchCompany"])) {
    $searchCompany = $_POST['searchCompany'];
    $where = " WHERE CONCAT(companyname,companyid)  LIKE '%$searchCompany%' ";
    $search = $DB->selectAll('tb_register_company')->conc($where)->orderby('companyname')->execute();
    $rowHR = $DB->fetchQuery($search);

    if (!empty($rowHR)) {
        $output = " <tr>
        <th>Име на фирма</th>
        <th>БУЛСТАТ</th>
        <th></th>
        </tr>";
        for ($n = 0; $n < count($rowHR); $n++) {
            $output .= "<tr id=" . $rowHR[$n]['username'] . ">
            <td>" . $rowHR[$n]['companyname'] . "</td>
            <td>" . $rowHR[$n]['companyid'] . "</td>
            <td style='text-align: center;'>
                <a href='/DR/view/front/profileHR/detailsCompaniesHR.php?id=" . $rowHR[$n]['companyid'] . "' class='btn-small'>Преглед</a>
            </td>
            </tr>";
        }
    } else{
        $output = '<p class="no-data mt10" style="text-align: center;">Няма налични данни</p>';
    }
    echo $output;
} 

if (isset($_GET['id'])) {
    $companyid = $_GET['id'];
    $querydetails = $DB->selectAll('tb_register_company')->where(array('companyid' => $companyid))->execute();
    $row = $DB->fetchQuery($querydetails);
    $queryjobs = $DB->selectAll('tb_jobs')->where(array('company' => $companyid, 'approved' => 1))->execute();
    $rowjob = $DB->fetchQuery($queryjobs);
}
