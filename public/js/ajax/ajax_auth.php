
<?php  




include 'conexion.php';


        if (is_ajax()) {
                if (isset($_POST["emailLogin"]) && !empty($_POST["passwordLogin"])) { //Checks if action value exists
                        

                        $user_email=htmlspecialchars($_POST['emailLogin'],ENT_QUOTES);
                        $pass=$_POST['passwordLogin'];

                                                //now validating the username and password
                        $sql="SELECT emp_nombre, emp_apellido, email, password, estatus FROM empleado WHERE email='".$user_email."' AND password= '".$pass."'";
                        $result=mysqli_query($con, $sql) or die(mysql_error());
                        $row=mysqli_fetch_assoc($result); 

                        //if username exists
                        //if(mysql_num_rows($result)>0)
                        //{
                                //compare the password
                                if(strcmp($row['password'], $pass)==0)

                                {   session_start();

                                        $_SESSION['email']= $row['email'];
                                        $_SESSION['emp_nombre']= $row['emp_nombre'];
                                        $_SESSION['emp_apellido'] = $row['emp_apellido'];
                                        $_SESSION['estatus'] = $row['estatus'];

                                        echo "yes";               
                                }
                                else{
                                       echo "no";
                        }
                        //else
                                //echo "no"; //Invalid Login

                                        //}
                        }
                }
                

//Function to check if the request is an AJAX request
function is_ajax() {
return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
} 


?>
