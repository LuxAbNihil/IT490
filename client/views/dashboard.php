<?php include("./header.php"); ?>
<script type="text/javascript" src="../js/dashboard.js"></script>
<div class="jumbotron">
		<form id="search" class="form-group" action="./dashboard.php" method="post" style="display: flex;justify-content: center;align-content: center;">
  		<div style="width: 50rem; display: flex; height: 2.8rem; justify-content: center;">
        
  		 <div class="form-group">
          <input class="search-bar" name="search" id="search-bar" aria-describedby="email" placeholder="Enter email">
       </div>
  		<input type="hidden" name="action" value="search">
      	<input type="submit" value="Search" class="search-bar-button" >
    	</div>
    </form>
    	<div id="search-results" class="results-wrapper"> 
    		<h5 style="font-size: 2rem; display: flex;justify-content: center; margin: 4rem 0 0 0;color: #000">
    			Your search results
    		</h5>
    		<div id="search-list" style="display: grid; justify-content: center;grid-template-columns: 1fr 1fr;">
    		</div>        
        </div>
        <div id="initial-results" class="results-wrapper" style="display: grid; justify-content: center; color: #000">  
        	 <h5 style="font-size: 2rem; display: flex;justify-content: center;">
        	 	Suggestions for you
        	 </h5>  
        	<div id="initial-search-list" style="display: grid; justify-content: center;grid-template-columns: 1fr 1fr;">
    		</div>    	     
        </div>

      </div>
  	</body>
</html>