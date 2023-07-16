<?php
require_once "../App.php";
if ($request->hasPost($request->post("submit")) && $id = $request->get("id")) {
    $id = $request->get("id");
    $title = $request->clean($request->post("title"));
    $validation->validate("title", $title, ['Required', 'str']);
    $errors = $validation->getErrors();
    if (empty($errors)) :
        $stm =  $conn->prepare("select `title` from todo where id=:id");
        $stm->bindparam(":id", $id);
        $stm->execute();
        if
        ($stm->rowCount() > 0):
            $stm =  $conn->prepare("update todo set `title`=:title where id=:id");
            $stm->bindparam(":title", $title);
            $stm->bindparam(":id", $id);
           $out= $stm->execute();
            if ($out) {
                $session->set("success", "data updated successfly");
                $request->redirect("../index.php");
            } else {
                $session->set("errors", ['error 404']);
                $request->redirect("../index.php");
            }

    else:
            $session->set("errors", ['Not found']);
            $request->redirect("../index.php");
        endif;
    else:
        $session->set("errors", $errors);
        $request->redirect("../edit.php?id=$id");

    endif;
    
} else {
    $request->redirect("../index.php");
}
