<?php
require_once "../App.php";
if ($request->hasPost($request->get('id')) && $request->hasPost($request->get('name'))):
    $id = $request->get("id");
    $name = $request->get("name");
    $stm =  $conn->prepare("select `title` from todo where id=:id");
    $stm->bindparam(":id", $id);
    $stm->execute();
    if ($stm->rowCount() > 0):
        $stm =  $conn->prepare("update todo set `status`=:name  where id=:id");
        $stm->bindparam(":id", $id);
        $stm->bindparam(":name", $name);
       $out= $stm->execute();
        if ($out) {
            $session->set("success", "status updated successfly");
            $request->redirect("../index.php");
        } else {
            $session->set("errors", ['error 404']);
            $request->redirect("../index.php");
        }
    else:
        $session->set("errors", ['error 404']);
        $request->redirect("../index.php");
    endif;

else:
    $request->redirect("../index.php");

endif;

