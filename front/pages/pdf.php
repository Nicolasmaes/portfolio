<?php 
include "../includes/header.php";
session_start();
if ($_SESSION['username']) {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        require_once('../../back/db_connect.php');
        $id = strip_tags($_GET['id']);
        $sql = 'SELECT * FROM `projects` WHERE `project_id`=:id';
        $query = $db->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch();
    } else {
        echo 'Missing id';
    }
} else {
    echo 'Please log in.';
}
?>

<div class="container_design_files">
    <embed src="../../assets/files/<?php $result['project_design_file']?>" width=800 height=500 type='application/pdf'/>
</div>

<?php include "../includes/footer.php"; ?>