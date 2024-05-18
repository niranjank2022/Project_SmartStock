<style>
    p{
        font-family:serif;
        font-weight: bolder;
        font-size: x-large;
        margin: 0 auto;
        text-align: center;
    }
    .main{
        padding:auto ;
        height: 500px;
        width: 100vw;
        margin-top: 30px;
        margin-left: 25px;
    } 
   .new,.labu{
      height: 250px;
      text-align: center;
      width: 300px;
      display: flex;
      float: left;
      box-shadow: 1px 1px 1px 1px gainsboro;
     
   }
   .labu{
      width: 600px;
      display: block;
   }
   .innner{
    margin-top: 34px;
    display: flex;  
    float: left;
    padding: 30px 0px 30px 0px;
   }
   .lab{
      width: 150px;
      box-shadow: 1px 1px 1px 1px gainsboro;
      height: 150px;     
   }
    .new:hover{
        transform: scale(1.1);
	}
    .lab:hover{
        transform: scale(1.1);
    }
	.new,.lab{
		transition: transform .2s;
	} 
</style>
<body>
   
<div class="main">
    <div class="Chair new">
         <p>Chair</p>
    </div>
    <div class="Table new">
        <p>Table</p>
    </div>
    <div class="labu">
        <p>System</p>
        <div class="innner">
            <div class="lab 0">
            <p>Gnd floor lab</p>
            </div>
            <div class="lab 1">
            <p>1st floor lab</p>
            </div>
            <div class="lab 2">
            <p>2nd floor lab</p>
            </div>
            <div class="lab 3">
            <p>3rd floor lab</p>
            </div>
        </div>
    </div>
    <div class="lights new">
        <p>Lights</p>
    </div>
    <div class="noticeboard new">
        <p>Notice Board</p>
    </div>
    <div class="Complaints new">
        <p>Complaints</p>
    </div>
    <div class="amt new">
        <p>&#8377;Amount spent</p>
    </div>
    <div class="labu">
        <p>Stocks in staff room</p>
        <div class="innner">
            <div class="lab 0">
            <p>Gnd floor</p>
            </div>
            <div class="lab 1">
            <p>1st floor</p>
            </div>
            <div class="lab 2">
            <p>2nd floor</p>
            </div>
            <div class="lab 3">
            <p>3rd floor</p>
            </div>
        </div>
    </div>
</div>
</body> 
