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
        display: flex;
        flex-direction: column;

	} 
    .das_img{
        background-position:center;
        margin-left: 20%;
        
        
    }
</style>
<body>
   
<div class="main">
    <div class="Chair new">
         <p>Chair</p>
         <img  class="das_img" src="./assets/chair1.jpeg" alt="" height=100 width=150>
         <p>count:250</p>
        </div>
        <div class="Table new">
            <p>Table</p>
            <img  class="das_img" src="./assets/table.jpeg" alt="" height=100 width=150>
            <p>count:60</p>
        </div>
    <div class="labu">
        <p>System</p>
        <!-- <img  class="das_img" src="system.webp" alt="" height=100 width=150>
            <p>count</p> -->
        <div class="innner">
            <div class="lab 0">
            <p>Gnd floor lab</p>
            <p>100</p>
            </div>
            <div class="lab 1">
            <p>1st floor lab</p>
            <p>95</p>
            </div>
            <div class="lab 2">
            <p>2nd floor lab</p>
            <p>110</p>
            </div>
            <div class="lab 3">
            <p>3rd floor lab</p>
            <p>100</p>
            </div>
            
        </div>
    </div>
    <div class="lights new"  >
        <p>Lights</p>
        <img  class="das_img" src="./assets/light.jpeg" alt="" height=100 width=150>
            <p>count:100</p>
        <!-- <img src="https://t3.ftcdn.net/jpg/00/61/61/48/360_F_61614823_QvthiFZ6WVDeSovaZCCsPig4spWu6qjM.jpg" alt="" height="100" width="150"> -->
    </div>
    <div class="noticeboard new">
        <p>Notice Board</p>
        <img  class="das_img" src="./assets/bulletin_board.jpg" alt="" height=100 width=150>
            <p>count:20</p>
    </div>
    <div class="Complaints new" >
        <p>Complaints</p>
        <img  class="das_img" src="./assets/cmpl.jpg" alt="" height=100 width=150>
            <p>count:4</p>
    </div>
    <div class="amt new">
        <p>&#8377;Amount spent</p>
        <img  class="das_img" src="./assets/amt1.jpg" alt="" height=100 width=150>
            <p>count:10L</p>
    </div>
    <div class="labu">
        <p>Stocks in staff room</p>
        <div class="innner">
            <div class="lab 0">
            <p>Gnd floor</p>
            <p>40</p>
            </div>
            <div class="lab 1">
            <p>1st floor</p>
            <p>50</p>
            </div>
            <div class="lab 2">
            <p>2nd floor</p>
            <p>80</p>
            </div>
            <div class="lab 3">
            <p>3rd floor</p>
            <p>60</p>
            </div>
        </div>
    </div>
</div>
</body> 
