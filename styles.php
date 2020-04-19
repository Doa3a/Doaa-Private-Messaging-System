html, body{
  height: 500px;
  overflow:hidden;
  padding:6px;
  margin:10px; 
  font-family: Arial, Helvetica, sans-serif;;
  text-align: left;
}

a,p {
	font-size: 20px;
	font-family:Arial, Helvetica, sans-serif;
	color:blue;
	margin:left;
	width: 10%;
}

input {
    width: 500px;
    padding: 10px 22px;
    margin: 5px 5px;
    box-sizing: border-box;  
	align:left;
}

input[type=submit] {
  width: 150px;
  background-color: darkblue;
  color: white;
  padding: 16px 32px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 200px;
}
input[type=submit]:hover {
  background-color: #45a049;
}
#message {
	vertical-align:text-top ;
	text-align: left;
    order: 2;
    margin:0 auto;
}

#container{
	box-shadow: 10px 10px 80px 20px #888888;
	width:800px;
	height: 90%;
	margin:2% auto;
	border-radius: 10%;
	overflow:auto;
	}
	
#menu{
	background:#233070;
	color:white;
	padding:3%;
	font-size: 30px;
	align=center;
	}
	
.section1{
    background-color:white;
    width:110px;
    float:left;
    border-right: 1px solid black; 
	height: 80%;
}
.section2{
    background-color:white;
    width:685px;
    float:right;
    border-left: 1px solid black; 
	height: 80%;
}

label 
{
  display: inline-block;
  width: 300px;
  text-align: left;
  font-weight:bold
}​

#error {color: red;}

table.fixed { 
table-layout: fixed; width: 200px:
overflow: auto;  
width:790px;
}

table.fixed td { overflow: auto; border: 1px solid black;}

.in-button {
  background-color: darkblue;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 390px;
  width: 100px;
}

.out-button {
  background-color: darkblue;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom:210px;
  width: 100px;
}

.cancel-button {
  background-color: darkblue;
  color: white;
   padding: 16px 32px;
  border: none;
  cursor: pointer;
  width: 150px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  margin-left: 200px;
}

/* Add styles to the form container */
.form-container {
  max-width: 600px;
  max-height: 100px;
  padding:20px;
  background-color: white;
}

/* Full-width textarea */
.form-container textarea {
  width: 600px;
  padding: 15px;
  margin: px 0 0px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 70px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: darkblue;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  position: fixed;
  bottom: 40px;
  right: 400px;
  margin-bottom:100px;
  opacity: 0.8;
  width:100px;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
  width:100px;
  position: fixed;
  bottom: 40px;
  right: 320px; 
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
.alert {
  padding: 20px;
  background-color: #233070; /*  */
  color: white;
  text-align:center;
  margin-bottom: 0px;
}

/* The close button */
.closebtn {
  margin-left: 15px;
  color: blue;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

/* When moving the mouse over the close button */
.closebtn:hover {
  color: black;
}