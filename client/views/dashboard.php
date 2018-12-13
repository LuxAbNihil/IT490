<?php include("./header.php"); ?>
<div class="jumbotron">
		<form id="search" class="form-group" action="./dashboard.php" method="post" style="display: flex;justify-content: center;align-content: center;">
  		<div style="width: 50rem; display: flex; height: 2.8rem; justify-content: center;">
        
  		 <div class="form-group">
          <input type="email" id="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="email" placeholder="Enter email" style="width: 25rem;">
       </div>
  		<input type="hidden" name="action" value="search">
      	<input type="submit" value="Search" class="btn btn-primary" style="width: 12rem; font-weight: bold; font-size: 1.1rem;" >
    	</div>
    </form>
    	<div id="search-results" class="results-wrapper"> 
    		<h5 style="font-size: 2rem; display: flex;justify-content: center;margin: 3rem 0 0 0;">
    			Your search results
    		</h5>
    		<div id="search-list" style="display: grid; justify-content: center;grid-template-columns: 1fr 1fr 1fr;">
    		</div>        
        </div>
        <div id="initial-results" class="results-wrapper" style="display: grid; justify-content: center;">  
        	 <h5 style="font-size: 2rem; display: flex;justify-content: center;margin: 3rem 0 0 0;">
        	 	Suggestions for you
        	 </h5>  
        	<div id="initial-search-list" style="display: grid; justify-content: center;grid-template-columns: 1fr 1fr 1fr;">
    		</div>    	     
        </div>

      </div>
  	</body>
</html>