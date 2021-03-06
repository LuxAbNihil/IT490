<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


    <script type="text/javascript" src="../js/restaurant.js"></script>
</head>

<body>
    <?php include("./header.php"); ?>
    <div class="jumbotron" style="padding: 1rem 1rem; background-color: #fff; margin: 0;">
        <div id="restaurant" class="results-wrapper" style="display: flex; justify-content: center; flex-direction: column">
            <div class="img-wrapper" style="width: 100%; height: 25rem;">
                <img src="http://s3-media2.fl.yelpcdn.com/bphoto/MmgtASP3l_t4tPCL1iAsCg/o.jpg" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%; border-radius: 4px">
            </div>
            <div class="card-body" style="text-align: center; margin: 5rem auto;">
                <button  id="favorite" class="btn btn-primary" style="font-size: 1.5rem">Favorite</button>

            </div>
        </div>
    </div>
    <div class="container" style="display: flex; justify-content: center;">
        <div class="col-md-5">
            <div class="form-area">
                <form id="forum" role="form">
                    <br style="clear:both">
                    <h2 style="margin-bottom: 25px; text-align: center;">Leave a comment for this restaurant</h3>
                      <!-- <div class="form-group">
                          <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                        </div> -->
                        <div class="form-group">
                        <textarea class="form-control" type="textarea" id="message" placeholder="Message" maxlength="140" rows="7"></textarea>                    
                        </div>
                <div style="display: flex; justify-content: center;">
                  <input type="submit" id="submit" value="Submit" name="submit" class="btn btn-primary">
                </div>
                </form>
              </div>
              </div>
           </div>
           <div class="comment-list" style="margin-top: 4rem ">
                <ul id="comment-list" class="comments" style="margin: 0; padding: 0; padding: 0; margin: 2rem 10rem;" >
                    <!-- <li class="comment card" style="list-style: none; margin-top: 2rem; padding: 2rem;">
                        <div class="clearfix">
                            <h4 class="pull-left">John</h4>
                            <p class="pull-right">9:41 PM on August 24, 2013</p>
                        </div>
                        <p>
                            <em>Loved it!</em>
                        </p>
                    </li>

                    <li class="comment card clearfix" style="list-style: none; margin-top: 2rem; padding: 2rem;">
                        <div class="clearfix">
                            <h4 class="pull-left">John</h4>
                            <p class="pull-right">9:41 PM on August 24, 2013</p>
                        </div>
                        <p>
                            <em>Great Restaurant!</em>
                        </p>
                    </li> -->
                </ul>
              </div>

              </body>
</html>