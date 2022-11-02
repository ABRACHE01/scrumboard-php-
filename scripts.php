
<?php
//INCLUDE DATABASE FILE
 include('database.php');
//SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
session_start();

//ROUTING
if(isset($_POST['save']))        saveTask();
if(isset($_POST['update']))      updateTask();
if(isset($_GET['del']))     deleteTask();

?>


<?php 

function getTasks($id){ ?>
    <!-- //CODE HERE -->
 <?php

    global $con ;
    require 'database.php';
    $requete= "SELECT * from tasks WHERE status_id = $id ";
    $query=mysqli_query($con , $requete);
    
    
    while($rows=mysqli_fetch_assoc($query)){ 

         
        // i used this to know how much  

        $status_name = "";
        if($rows['priority_id'] == 1){
            $status_name = "To Do";
            
        }else if($rows['priority_id'] == 2){
            $status_name = "in progress";
        
        }else if($rows['priority_id'] == 3){
            $status_name = "Done";
    
        }


        $priority_name = "";
        if($rows['priority_id'] == 1){
            $priority_name = "Low";
            
        }else if($rows['priority_id'] == 2){
                $priority_name = "medium";
        
        }else if($rows['priority_id'] == 3){
                $priority_name = "Hight";
    
        }else if($rows['priority_id'] == 4){
                $priority_name = "Critical";
        }


        $type_name = "";
        if($rows['type_id'] == 1){
            $type_name = "Feature";
            
        }else if($rows['type_id'] == 2){
                $type_name = "Bug";
        
        }


        
        ?>

        <button id="<?php echo $rows['id']; ?>" onclick='gitElementToModal(id);' class="container-fluid border  btn-light text-black  text-start " href="#modal-task" data-bs-toggle="modal">
        <div class="row mt-2">
            <div class="col-1 ">
                <i class="">
                <?php 
                if($id==1){  
                    ?>  <img width="22px" src="https://img.icons8.com/external-bearicons-outline-color-bearicons/64/000000/external-lamp-frequently-asked-questions-faq-bearicons-outline-color-bearicons.png"/>
                <?php }else if($id==2){
                    ?>  <img width="22px" src="https://img.icons8.com/color/48/000000/in-progress--v1.png"/>
                    <?php }else if($id==3){
                    ?>  <img width="22px" src="https://img.icons8.com/color/48/1A1A1A/checked--v1.png"/>
                <?php }?>
                </i>
    </div>
    <div class="col-11 ">
                <div class="fw-bold taskTitle " > <?php echo $rows['title']; ?></div>
                <div class="">
                <div   > #<?php echo $rows['id']; ?> created in <span class="taskDate"><?php echo $rows['task_datetime'] ;?></span></div>
                <div class="taskDescription" title=""><?php echo $rows['description']?> </div>
        </div>
        <div  class="mb-3 mt-2">

             <span class="btn  taskStatus" style="visibility: hidden" data-id-status="<?php echo $rows['status_id']; ?>" > <?php echo $status_name; ?> </span>

                <span class="btn btn-primary taskPriority " data-id-priority="<?php echo $rows['priority_id']; ?>" > <?php echo $priority_name; ?> </span>

                <span class="btn btn-secondary taskType " data-id-type = "<?php echo $rows['type_id']; ?>" > <?php echo $type_name ; ?> </span>
              
                <span class="btn btn-outline-danger float-end text-decoration-none " > <a class="text-decoration-none " href="index.php?del=' <?php echo $rows['id'] ?>'" >Delete</a> </span>
        </div>
    </div>
</div>

</button>
      
    <!-- SQL SELECT
   echo "Fetch all tasks"; -->

<?php }
}?>

<?php

function saveTask() {   
    global $con;
    //CODE HERE
    $title=$_POST['title'];
    $type=$_POST['type'];
    $priority=$_POST['priority'];
    $status=$_POST['status'];
    $date=$_POST['date'];
    $description=$_POST['description'];
    //require'database.php'; 
    //print_r($_POST);
    $req="INSERT INTO `tasks`(`title`,`type_id`,`priority_id`,`status_id`,`task_datetime`,`description`) 
    VALUES ('$title','$type','$priority','$status','$date','$description')";
    $query=mysqli_query($con,$req);
    // if($query){
    //    echo"<h1>sucsesss</h1>" ;
    // }else{
    //     echo"<h1>error </h1>" ;
    // }

    //SQL INSERT
    $_SESSION['message'] = "Task has been added successfully !";
     header('location: index.php');
    
}

function updateTask(){
    global $con;
    //CODE HERE
    $id=$_POST['task-iid'];
    $title=$_POST['title'];
    $priority=$_POST['priority'];
    $type=$_POST['type'];
    $status=$_POST['status'];
    $date=$_POST['date'];
    $description=$_POST['description']; 
    

    $req="UPDATE `tasks` SET `title`='$title',`type_id`=$type,`priority_id`=$priority,`status_id`=$status,`task_datetime`='$date',`description`='$description' WHERE id = $id";
    $retval = mysqli_query($con,$req);
   

    
    //SQL UPDATE
    
    
    $_SESSION['message'] = "Task has been updated successfully !";
    header('location: index.php');
}


function deleteTask(){
    global $con ;
   
    //CODE HERE
    $id = $_GET['del'];
    mysqli_query($con, "DELETE FROM tasks WHERE id=$id");
   
    //SQL DELETE
    $_SESSION['message'] = "Task has been deleted successfully !";
    header('location: index.php');
}

// couter of 
function countT($id)
{
    global $con ;
    $sql = "SELECT count(*) FROM tasks where status_id=$id";
    $result = mysqli_query($con, $sql);
    $row =mysqli_fetch_array($result);
    echo  $row[0];

    }
?>