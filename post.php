<?php require 'connect.php';?>

<!DOCTYPE html>
<html lang="en">
<?php include "layouts/head.php";?>

<body>
<?php include "layouts/header.php" ;?>

    <div class="container-fluid">
        <main class="tm-main">
            <!-- Search form -->
            <div class="row tm-row">
                <div class="col-12">
                    <form method="GET" class="form-inline tm-mb-80 tm-search-form">                
                        <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                        <button class="tm-search-button" type="submit">
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div>            
            <div class="row tm-row">
                
            </div>
            <div class="row tm-row">
                <div class="col-lg-8 tm-post-col">
                    <div class="tm-post-full">                    
              
                    
                    <!-- Comments -->
                    

                   
                            <?php
                     if(isset($_GET['id'])){
                     $id=$_GET['id'];
                    $q=$con->prepare("SELECT content FROM post WHERE  article_id= $id");
                    $q->execute();
                    $results = $q->fetchAll();

                   foreach ($results as $row) {
                    echo
                   "<h2 class='tm-color-primary tm-post-title'>Comments</h2>
                   <hr class='tm-hr-primary tm-mb-45'> 
                   <div class='tm-comment-reply tm-mb-45'>
                    <hr>
                    <div class='tm-comment'>
                        <figure class='tm-comment-figure'>
                            <img src='img/comment-2.jpg' alt='Image' class='mb-2 rounded-circle img-thumbnail'>
                            <figcaption class='tm-color-primary text-center'>Jewel Soft</figcaption>    
                        </figure>
                        <p>
                           sadasdasds {$row['content']}
                        </p>
                    </div>                                
                    <span class='d-block text-right tm-color-primary'>June 21, 2020</span>
                </div>
                
                <form action='' class='mb-5 tm-comment-form' method='post'>
                                <h2 class='tm-color-primary tm-post-title mb-4'>Your comment</h2>
                                
                                <div class='mb-4'>
                                    <input class='form-control' name='content' type='text' >
                                </div>
                                <div class='mb-4'>
                                    <textarea class='form-control' rows='6'></textarea>
                                </div>
                                <div class='text-right'>
                                    <button class='tm-btn tm-btn-primary tm-btn-small'>Submit</button>                        
                                </div>                                
                            </form>                          
                        </div>
                    </div>
                </div>
                <aside class='col-lg-4 tm-aside-col'>
                    <div class='tm-post-sidebar'>
                        <hr class='mb-3 tm-hr-primary'>
                        <h2 class='mb-4 tm-post-title tm-color-primary'>Categories</h2>
                        <ul class='tm-mb-75 pl-5 tm-category-list'>
                            <li><a href='#' class='tm-color-primary'>Visual Designs</a></li>
                            <li><a href='#' class='tm-color-primary'>Travel Events</a></li>
                            <li><a href='#' class='tm-color-primary'>Web Development</a></li>
                            <li><a href='#' class='tm-color-primary'>Video and Audio</a></li>
                            <li><a href='#' class='tm-color-primary'>Etiam auctor ac arcu</a></li>
                            <li><a href='#' class='tm-color-primary'>Sed im justo diam</a></li>
                        </ul>
                        <hr class='mb-3 tm-hr-primary'>
                        <h2 class='tm-mb-40 tm-post-title tm-color-primary'>Related Posts</h2>
                        <a href='#' class='d-block tm-mb-40'>
                            <figure>
                                <img src='img/img-02.jpg' alt='Image' class='mb-3 img-fluid'>
                                <figcaption class='tm-color-primary'>Duis mollis diam nec ex viverra scelerisque a sit</figcaption>
                            </figure>
                        </a>
                        <a href='#' class='d-block tm-mb-40'>
                            <figure>
                                <img src='img/img-05.jpg' alt='Image' class='mb-3 img-fluid'>
                                <figcaption class='tm-color-primary'>Integer quis lectus eget justo ullamcorper ullamcorper</figcaption>
                            </figure>
                        </a>
                        <a href='#' class='d-block tm-mb-40'>
                            <figure>
                                <img src='img/img-06.jpg' alt='Image' class='mb-3 img-fluid'>
                                <figcaption class='tm-color-primary'>Nam lobortis nunc sed faucibus commodo</figcaption>
                            </figure>
                        </a>
                    </div>                    
                </aside>
            </div>
            <footer class='row tm-row'>
                <div class='col-md-6 col-12 tm-color-gray'>
                    Design: <a rel='nofollow' target='_parent' href='https://templatemo.com' class='tm-external-link'>TemplateMo</a>
                </div>
                <div class='col-md-6 col-12 tm-color-gray tm-copyright'>
                    Copyright 2020 Xtra Blog Company Co. Ltd.
                </div>
            </footer>
        </main>
    </div>
                
                
                "
                    
                   ;}}
                   else 


                   echo '<h1> no comments for you </h1>';

                    ?>
         <?php   
                  if($_SERVER['REQUEST_METHOD']=='POST'){
                    $content= $_POST['content'];

                    $stmt = $con->prepare('INSERT INTO post (article_id,content) VALUES (?, ?)');

                    // Bind the form data to the statement
                    $stmt->bindParam(1, $id);
                    $stmt->bindParam(2, $content);
                    
                    // Get the form data
                    $content = $_POST['content'];
                    
                    // Execute the statement
                    $stmt->execute();



                  }      
                    ?> 
                           
                            
    <script src="js/jquery.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>