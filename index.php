<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- latest one datepicker-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- ui picker-->
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<style>
  body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
  .tabcontent, .notification{
      display: none;
  }
.show{
  display: block;
}
.hidden{
  display: none;
}

#alert{
  display: none;
  padding: 6px 12px;
  /*border:*/
  color: red;
  font-weight: bold;
  border-left: 1px solid #ccc;
  border-right: 1px solid #ccc;
}

  </style>
</head>
<body>
<div class="container">
        
        <?php include('ns3form.php'); ?>
        <div class="ns3tab" id="ns3tab">
        <?php 
          if(isset($_POST['btnsubmit'])){
            include('ns3tab.php'); 
          }
        ?>
        </div>

  </div>

<script>
  function hidens3tab(){
    document.getElementById('ns3tab').style.display='none';
    document.getElementsByClassName('tabcontent').style.display='none';
    document.getElementById('idate').value="";
  }
  function showns3tab(){
    document.getElementById('ns3tab').style.display = 'block';
  }
  jQuery(function($){
      $('#idate').datepicker({
            dateFormat: "dd-mm-yy",
            autoclose: true,
            todayHighlight: true,
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            orientation: "button",
            maxDate: 0
          });
});
</script>
<script>

  var ic = document.getElementsByName('category');
  var ida2 = document.getElementById('idate').value;
  var ida = ida2.split("-").reverse().join("-");
  // alert(ida);
  function openState(evt, stateName) {
    var i, tabcontent, tablinks;
    var flag=0;
    for(var i=0; i< ic.length; i++){
      var cid = ic[i].value;
          var sn = document.getElementById(stateName);
          var c = sn.querySelector('#'+cid);
          var no = c.querySelectorAll('.notification');
          // var td = [];
          for(var n=0; n<no.length; n++){
            // alert(no[n].id);
            var ih = no[n].querySelector('input[type="hidden"]');
            var ihid = ih.id;
            var ihvalue = ih.value;
            if(ihvalue == ""){
              var from = ihid.split("-").reverse().join("-");
              var ihvalue = Date();
              var to = ihvalue;
            }
            else{
              var from = ihid.split("-").reverse().join("-");
              var to = ihvalue.split("-").reverse().join("-");  
            }
            var inputDate = Date.parse(ida);
            var fromDate = Date.parse(from);
            var toDate = Date.parse(to);
            if(inputDate >= fromDate && inputDate <= toDate){
              document.getElementById(no[n].id).style.display="block";
              document.getElementById('alert').style.display="none";
              flag=1;
            }
            
          }

    }
    if(flag != 1){
      for(var i=0; i< ic.length; i++){
      var cid = ic[i].value;
          var sn = document.getElementById(stateName);

              
          var c = sn.querySelector('#'+cid);
          
          var no = c.querySelectorAll('.notification');
          // var td = [];
          for(var n=0; n<no.length; n++){
            // alert(no[n].id);
            var ih = no[n].querySelector('input[type="hidden"]');
            var ihid = ih.id;
            var ihvalue = ih.value;
            if(ihvalue == ""){
              var from = ihid.split("-").reverse().join("-");
              var ihvalue = Date();
              var to = ihvalue;
            }
            else{
              var from = ihid.split("-").reverse().join("-");
              var to = ihvalue.split("-").reverse().join("-");  
            }
            var inputDate = Date.parse(ida);
            var fromDate = Date.parse(from);
            var toDate = Date.parse(to);
            if((inputDate < fromDate || inputDate > toDate)){
              var fd = [];
              var td = [];
              for(var n=0; n<no.length; n++){
                var ih = no[n].querySelector('input[type="hidden"]');
                var ihid = ih.id;
                var ihvalue = ih.value;
                var from = ihid.split("-").reverse().join("-");
                var to = ihvalue.split("-").reverse().join("-");
                fd.push(from);
                td.push(to);
              }
              var dates = fd, d = ida, a = -1, res = null;
              var temp;
              var min = Math.abs(Date.parse(dates[a+1])-Date.parse(ida));
              var count=0;
              while (++a < dates.length){
              var diff = Math.abs(Date.parse(dates[a])-Date.parse(ida));
              if(diff <  min ){
                min = diff;
                count = a;
              }


              }
              document.getElementById('alert').style.display = "block";
              document.getElementById('alert').innerHTML= '<div class="alert alert-dismissible alert-warning"><button type="button" class="close" data-dismiss="alert">&times;</button><h4 class="alert-heading">Warning!</h4><p class="mb-0">Notification is not found, so the below notification is the closest notification to the selected date.</p></div>';
              document.getElementById(no[count].id).style.display="block";
            }
            
          }
    }
    }
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(stateName).style.display = "block";
    evt.currentTarget.className += " active"; 
}
// Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click(); 
</script>

</body>
</html>