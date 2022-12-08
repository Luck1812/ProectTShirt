<?php
$func3 = $_POST['func_user'];
$maxCatalogID;
if ($func3 === 'createCatalog') {
    $nameCatalog = $_POST['nameCatalog'];
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $sql = "INSERT INTO `category_image` (`ID`, `Name`) VALUES (NULL,'$nameCatalog');";
    $massive = mysqli_query($connection, $sql);
    mysqli_close($connection);
}
if (!empty($_FILES['file'])) {
    $file = $_FILES['file'];
    $tmpN = $file['tmp_name'];
    $p = addslashes(file_get_contents($tmpN));
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $result = $connection->query("SELECT MAX(`ID`) as `ID` FROM `category_image`;");
    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $sql = "INSERT INTO `sketch_image` (`ID`, `Image`, `CategoryImageID`) VALUES (NULL,'$p', '$row[ID]');";
    }
    $massive = mysqli_query($connection, $sql);
    mysqli_close($connection);
}

if (!empty($_FILES['file-sketch'])) {
    $file = $_FILES['file-sketch'];
    $tmpN = $file['tmp_name'];
    $p = addslashes(file_get_contents($tmpN));
    $catalogID = $_POST['sketch'];
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $sql = "INSERT INTO `sketch_image` (`ID`, `Image`, `CategoryImageID`) VALUES (NULL,'$p', '$catalogID');";
    $massive = mysqli_query($connection, $sql);
    mysqli_close($connection);
}

$func = $_GET['func_user'];
$func2 = $_POST['func_user'];
if ($func === 'func_add_user') {
    $arr['email'] = $_GET['email'];
    $arr['pass'] = $_GET['pass'];
    echo json_encode($arr);
    $text = $_GET['txt'];
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $sql = "INSERT INTO `registration_user` (`ID`, `E-mail`, `Password`) VALUES (NULL, '$arr[email]', '$arr[pass]')";
    $massive = mysqli_query($connection, $sql);
    $sql_id = "SELECT MAX(ID) FROM `registration_user`";
    $massive = mysqli_query($connection, $sql_id);
    $row = mysqli_fetch_array($massive, MYSQLI_NUM);
    foreach ($row as $value) {
        $sql = "INSERT INTO `user` (`ID`, `SeriesPassport`, `NumberPassport`, `RegistrationUserID`, `Name`, `Family`, `Patronymic`, `PhoneNumber`, `PostalCode`, `RoleID`) VALUES (NULL, NULL, NULL, '$value', NULL, NULL, NULL, NULL, NULL, '2')";
    }
    $massive = mysqli_query($connection, $sql);
    mysqli_close($connection);
} else if ($func === 'func_login_user') {
    $arr['email'] = $_GET['email'];
    $arr['pass'] = $_GET['pass'];
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $sql = "SELECT * FROM `registration_user` WHERE `E-mail` = '$arr[email]' and `Password` = '$arr[pass]';";
    $massive = mysqli_query($connection, $sql);
    $row = mysqli_fetch_array($massive, MYSQLI_NUM);
    foreach ($massive as $value) {
        if (is_array($value)) {
            setcookie("email", $arr['email']);
            setcookie("password", $arr['pass']);
            setcookie("userID", $row[0]);
        }
        echo is_array($value);
    }
    mysqli_close($connection);
} else if ($func === 'clear_cookie') {
    setcookie("email", "");
    setcookie("password", "");
    setcookie("userID", "");
} else if ($func === 'change_data') {
    $arr['name'] = $_GET['name'];
    $arr['surname'] = $_GET['surname'];
    $arr['patronymic'] = $_GET['patronymic'];
    $arr['seriesPassport'] = $_GET['seriesPassport'];
    $arr['numberPassport'] = $_GET['numberPassport'];
    $arr['numberPhone'] = $_GET['numberPhone'];
    $arr['postalCode'] = $_GET['postalCode'];
    $arr['userID'] = $_GET['userID'];
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $result = $connection->query("SELECT `ID` FROM `user` WHERE `user`.`RegistrationUserID` = '$arr[userID]';");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $sql = "UPDATE `user` SET `Name` = '$arr[name]', `Family` = '$arr[surname]', `Patronymic` = '$arr[patronymic]', `PhoneNumber` = '$arr[numberPhone]', `SeriesPassport` = '$arr[seriesPassport]', `NumberPassport` = '$arr[numberPassport]', `PostalCode` = '$arr[postalCode]' WHERE `user`.`ID` = " . $row['ID'] . "";
    $massive = mysqli_query($connection, $sql);
    mysqli_close($connection);
} else if ($func === 'create_catalog') {
    $arr['catalogID'] = $_GET['catalogID'];
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $result = $connection->query("SELECT * FROM `sketch_image` WHERE `CategoryImageID` = '$arr[catalogID]';"); // запрос на выборку
    $array3 = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $array_test['ID'] = $row['ID'];
        $array_test['Image'] = base64_encode($row['Image']);
        array_push($array3, $array_test);
    }
    mysqli_close($connection);
    echo json_encode($array3);
} else if ($func === 'create_mainTShirt') {
    $arr['TShirtID'] = $_GET['TShirtID'];
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $result = $connection->query("SELECT `Image`, `Cost` FROM `top_clothes`, `top_clothes_image` WHERE `top_clothes`.`ImageID` = `top_clothes_image`.`ID` AND `top_clothes`.`ID` =  $arr[TShirtID];"); // запрос на выборку
    $array3 = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $array_test['Image'] = base64_encode($row['Image']);
        $array_test['Cost'] = $row['Cost'];
        array_push($array3, $array_test);
    }
    mysqli_close($connection);
    echo json_encode($array3);
} else if ($func === 'create_order') {
    $arr['userID'] = $_GET['userID'];
    $arr['currentDesignation'] = $_GET['currentDesignation'];
    $arr['TShirtID'] = $_GET['TShirtID'];
    $arr['sketchID'] = $_GET['sketchID'];
    $isTrue = "false";
    $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
    $result = $connection->query("SELECT * FROM `user` WHERE `RegistrationUserID` =  $arr[userID];"); // запрос на выборку
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        if (($row['Name'] === "" || null) || ($row['Family'] === "" || null) || ($row['Patronymic'] === "" || null) || ($row['PhoneNumber'] === "" || null) || ($row['SeriesPasport'] === "" || null) || ($row['NumberPassport'] === "" || null) || ($row['PostalCode'] === "" || null)) {
            $isTrue = "false";
        } else {
            $result = $connection->query("SELECT `ID` FROM `size` WHERE `Designation` = '$arr[currentDesignation]'"); // запрос на выборку
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $designationID = $row['ID'];
            $result = $connection->query("SELECT `ID` FROM `user` WHERE `RegistrationUserID` = '$arr[userID]'"); // запрос на выборку
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $userID = $row['ID'];
            $result = $connection->query("SELECT `Cost` FROM `top_clothes` WHERE `ID` = '$arr[TShirtID]'"); // запрос на выборку
            $row = $result->fetch_array(MYSQLI_ASSOC);
            $costClothes = $row['Cost'] + 500;
            $date = date(" Y-m-d");
            $sql = "INSERT INTO `electronic_receipt`(`NumberElectronicReceipt`,`Date`, `UserID`, `TopClothesID`, `SizeID`, `SketchImageID`, `Cost`,`StatusID`) VALUES (NULL,'$date','$userID','$arr[TShirtID]','$designationID','$arr[sketchID]','$costClothes', 2);";
            $connection = mysqli_connect('localhost', 'root', '', 'tshirt');
            $massive = mysqli_query($connection, $sql);
            $isTrue = "true";
        }
    }
    mysqli_close($connection);
    echo $isTrue;
} else if ($func === 'create_word') {
    require_once './vendor/autoload.php';

    $document = new \PhpOffice\PhpWord\TemplateProcessor('./cheque.docx');

    $uploadDir = __DIR__;
    $outputFile = 'chequeOrder.docx';
    $NumberElectronicReceipt =  $_GET['NumberElectronicReceipt'];
    $DateOrder =  $_GET['DateOrder'];
    $PostalCode =  $_GET['PostalCode'];
    $ArticleTShirt =  $_GET['ArticleTShirt'];
    $NameProduct =  $_GET['NameProduct'];
    $CostProduct =  $_GET['CostProduct'];
    $CountProduct =  $_GET['CountProduct'];
    $ArticleSketch =  $_GET['ArticleSketch'];
    $NameSketch =  $_GET['NameSketch'];
    $TotalCost =  $_GET['TotalCost'];

    $document->setValue('NumberElectronicReceipt', $NumberElectronicReceipt);
    $document->setValue('DateOrder', $DateOrder);
    $document->setValue('PostalCode', $PostalCode);
    $document->setValue('ArticleTShirt', $ArticleTShirt);
    $document->setValue('NameProduct', $NameProduct);
    $document->setValue('CostProduct', $CostProduct);
    $document->setValue('CountProduct', $CountProduct);
    $document->setValue('ArticleSketch', $ArticleSketch);
    $document->setValue('NameSketch', $NameSketch);
    $document->setValue('TotalCost', $TotalCost);

    $document->saveAs($outputFile);
}
