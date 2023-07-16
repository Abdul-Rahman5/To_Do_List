<?php
require_once "../App.php";
if ($request->hasPost($request->get('id'))):
    $id = $request->get("id");
    $stm =  $conn->prepare("select `title` from todo where id=:id");
    $stm->bindparam(":id", $id);
    $stm->execute();
    if ($stm->rowCount() > 0):
        $stm =  $conn->prepare("delete from  todo where id=:id");
        $stm->bindparam(":id", $id);
      $out =  $stm->execute();
      if ($out) {
            $session->set("success", "data delete successfly");
            $request->redirect("../index.php");

      }else{
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
