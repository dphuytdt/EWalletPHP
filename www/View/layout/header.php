<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="sr-only">E-wallet</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="./" class="navbar-brand">FastPay</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
    <?php
            require_once '../Controller/CheckLogin.php';
            if(isset($_SESSION['username'])){
                        //select role
                $username = $_SESSION['username'];
                $sql = "SELECT role FROM __account WHERE username = '$username'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $role = $row['role'];
                   
                    if($role == 1){
        ?>  
      <ul class="nav navbar-nav navbar-right">
       
       
       
       
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transfer<b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li>
                <li><a href="../View/recharge.php">Recharge</a></li>
            </li>
            <li class="active">
                <li><a href="../View/withDraw.php">Withdraw</a></li>
            </li>
            <li>
                <li><a href="../View/transfer.php">Transfer Money</a></li>
            </li> 
            <li>
                <li><a href="../View/buyPhoneCard.php">Buy Phone Card</a></li>
            </li>                
            </ul>
        </li>
        
       
        <li class="active">
                <li><a href="../View/transactionHistory.php">Transaction History</a></li>
        </li>
        
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage<b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li>                
                <a href="../View/manageAccount.php">Manage Account</a>
            </li>
            <li>
                <a href="../View/acceptWithDraw.php">Manage Withdraw List</a> 
            </li>  
            <li>
                <a href="../View/acceptTransfer.php">Manage Transfer List</a> 
            </li>     
            <li class="active">
                <li><a href="../View/additionalInformation.php">Request Additional Information</a></li>
            </li>              
            </ul>
        </li>
        
         
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account<b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li>
            <li><a href="../View/account_detail.php">My Profile</a> </li>
        </li>
        <li>
            <li><a href="../View/changePWD.php">Change Password</a></li>
        </li>            
            </ul>
        </li>
        <li>
            <li><a a href="../Controller/Logout.php">Log out </a> </li>
        </li>
      </ul>
      <?php
                                }
                            }
                        }
        ?>

        <?php
            require_once '../Controller/CheckLogin.php';
            if(isset($_SESSION['username'])){
                        //select role
                $username = $_SESSION['username'];
                $sql = "SELECT * FROM __account WHERE username = '$username'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_assoc($result);
                    $role = $row['role'];
                    $isActived = $row['isActived'];
                    if($role == 0 && $isActived == 1){
                ?> 
                <ul class="nav navbar-nav navbar-right">
        

            <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaction<b class="caret"></b></a>
            <ul class="dropdown-menu">
            <li>
                    <li><a href="../View/transfer.php">Transfer Money</a></li>
                </li>
                <li class="active">
                    <li><a href="../View/withDraw.php">Withdraw Money</a></li>
                </li>
                <li>
                    <li><a href="../View/recharge.php">Recharge Money</a></li>
                </li>  
                <li>
                    <li><a href="../View/buyPhoneCard.php">Buy Phone Card</a></li>
                </li>                   
            </ul>
            </li>
            <li>
                <li><a href="../View/account_detail.php">Buy card history</a> </li>
            </li>
            <li>
                <li><a href="../View/account_detail.php">My Profile</a> </li>
            </li>
            <li>
                <li><a href="../View/changePWD.php">Change Password</a></li>
            </li>
            <li>
                <li><a a href="../Controller/Logout.php">Log out </a> </li>
            </li>
            </ul> 
            <?php
                                } if($role == 0 && $isActived == 0 || $role == 0 && $isActived == 2){ 
            ?>                 <ul class="nav navbar-nav navbar-right">
                            <li>
                                <li><a href="../View/changePWD.php">Change Password</a></li>
                            </li>
                            
                        
                            <li>
                                <li><a href="../View/account_detail.php">My Profile</a> </li>
                            </li>
                            <li>
                                <li><a a href="../Controller/Logout.php">Log out </a> </li>
                            </li>
                            </ul> 

            <?php
                                }
                            }
                        }
        ?>
    </nav>
  </div>

  
</header>