<?php
require_once "../App.php";

if ($request->hasPost($request->post("submit"))) {
    $title = $request->clean($request->post("title"));
    // echo $title;
    $validation->validate("title", $title, ['Required', 'str']);
    $errors = $validation->getErrors();
    // var_dump($errors);
    if (empty($errors)) {
       $stm= $conn->prepare("insert into todo(`title`)values(:title)");
       $stm->bindParam(":title",$title,PDO::PARAM_STR);
       $out= $stm->execute();
        var_dump($out);
        if ($out) {
            $session->set("success", "daten inserted successfly");
            $request->redirect("../index.php");
            }else{
            $session->set("errors", ['error']);
            $request->redirect("../index.php");
            }
    }else{
        $session->set("errors", $errors);
        $request->redirect("../index.php");
    }
}else{
    $request->redirect("../index.php");
}

