<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('header.php');
    include('admin/db_connect.php');

	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>

    <style>
    	header.masthead {
		  background: url(assets/img/<?php echo $_SESSION['setting_cover_img'] ?>);
		  background-repeat: no-repeat;
		  background-size: cover;
		}

    /*--CSS FOR FOOD SEARCH--*/

    .btn{
    padding:1%;
    border:none;
    font-size: 1rem;
}
.btn-primary{
    background-color: palevioletred;
    color:white;
    cursor:pointer;
    border-radius: 5px;
}
.btn-primary:hover{
    background-color: plum;
    color:white;
}

.food-search{

/*background: url(pic/top-view-delicious-cake-arrangement.jpg);*/
background-color: lavenderblush;
background-size: cover;
background-repeat: no-repeat;
background-position: center;
padding : 7% 3%;

}
.food-search input[type="search"]{
width:50%;
padding:1%;
font-size: 1rem;
border-radius: 5px; 
}


    /*----------CSS FOR SOCIAL--------*/
.social ul{
    list-style-type: none;
    background-color: black;
  
}
.social ul li{
    display: inline;
    padding: 1%;
}
.contact{
    color: blanchedalmond;
    font-size: medium;
    font-weight: bold;
    font-family: Arial, Helvetica, sans-serif;
}
    </style>
    <body id="page-top">
      <!--food search start-->
    <section class ="food-search text-center">       
        <div class="container">
         <form action="food-search.html">
             <input type="search" name="search" placeholder="Search for food">
             <input type="submit" name="submit" value="search" class="btn btn-primary">
         </form>
           </div>     

    </section>
<!--food search ends-->
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['setting_name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=cart_list"><span> <span class="badge badge-danger item_count">0</span> <i class="fa fa-shopping-cart"></i>  </span>Cart</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=about">About</a></li>
                        <?php if(isset($_SESSION['login_user_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo "Welcome ". $_SESSION['login_first_name'].' '.$_SESSION['login_last_name'] ?> <i class="fa fa-power-off"></i></a></li>
                      <?php else: ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now">Login</a></li>
                      <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
       
        <?php 
        $page = isset($_GET['page']) ?$_GET['page'] : "home";
        include $page.'.php';
        ?>
       

<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
        <footer class="bg-light py-5">
            <div class="container"><div class="small text-center text-muted">

            <!--social start-->
<section class ="social">
    
    <div class="container text-center">
        <ul><br>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluent/45/00000/facebook-new.png"/> </a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluency/44/instagram-new.png"/> </a>
            </li>
            <li>
                <a href="#"><img src="https://img.icons8.com/fluency/45/twitter.png"/> </a>
            </li>
            <p class="contact">Contact us</p><br>
        </ul>
       </div>

</section>
<!--social ends-->

<!--footer start-->
<section class ="Footer">
    <div class="container text-center">
        <br>
       <p>All rights reverved to Sweet cake</p>
       <br>
       </div>
   

</section>
<!--footer ends-->

            </div></div>
        </footer>


        
       <?php include('footer.php') ?>
    </body>

    <?php $conn->close() ?>

</html>
