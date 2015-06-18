 $(document).ready(function(){
	$("#submit-course-Instructor").click(function(){
		var course_categories = $("#course_categories").val();
		var course_name = $("#course_name").val();
		var course_description = $("#course_description").val();
		var course_number = $("#course_number").val();
		
		if(course_categories != "0" && course_name != "" && course_description != "" && course_number != "" && course_number != "0"){
			return true;	
		}else{
			if (course_name == "")  $("#course_name").addClass("requireBox"); 		else $("#course_name").removeClass("requireBox");
			if (course_description == "")  $("#course_description").addClass("requireBox");		else $("#course_description").removeClass("requireBox");
			if (course_number != "" || course_number != "0")  $("#course_number").addClass("requireBox");		else $("#course_number").removeClass("requireBox");
			alert("Please input required box");
			return false;	
		}
	});
	
	$("#submit-profile").click(function(){
		var firstname = $("#firstname").val();
		var lastname = $("#lastname").val();
		var nickname = $("#nickname").val();
		
		if(firstname != "" && lastname != "" && nickname != ""){
			return true;	
		}else{
			if (firstname == "")  $("#firstname").addClass("requireBox"); 		else $("#firstname").removeClass("requireBox");
			if (lastname == "")  $("#lastname").addClass("requireBox");		else $("#lastname").removeClass("requireBox");
			if (nickname == "")  $("#nickname").addClass("requireBox"); 		else $("#nickname").removeClass("requireBox");
			alert("Please input required box");
			return false;	
		}
	});
	
	$("#searchButton").click(function(){
		var course_name = $("#search_course_name").val();
		var start_day = $("#start_day").val();
		var start_month = $("#start_month").val();
		var start_year = $("#start_year").val();
		var end_day = $("#end_day").val();
		var end_month = $("#end_month").val();
		var end_year = $("#end_year").val();
		
		var url = "../controller/search_course.php";
		var dataSet = "course_name="+ course_name +"&start_day="+ start_day +"&start_month="+ start_month +"&start_year="+ start_year +"&end_day="+ end_day +"&end_month="+ end_month +"&end_year="+ end_year;
		
		$.get(url,dataSet,function(data){
			$("#course_name").html(data).hide().fadeIn("normal");
		});
	});
	
	$("#create_course").click(function(){
		window.location = "course.php?mode=create";
	});
	$(".delete-course").click(function(){
		var ID = $(this).attr("ID").split("-")[1];
		var name = $("#course-"+ ID).text();		
		
		var confirmation = confirm("Do you sure remove to \n\r"+ name +"?");
		if(confirmation){
			
			var url = "../controller/func_course.php?mode=delete";
			var dataSet = "courseID="+ ID
			
			$.get(url,dataSet,function(data){
				window.location.reload();
			});
			
		}else{
			return false;
		}
	});
	
	$("#loginButton").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		
		var url = "controller/func_login.php?mode=check";
		var dataSet = "username="+ username +"&password="+ password;
		
		$.post(url,dataSet,function(data){
			
			if(data == false){
				$("#feedback").html("<div class='alert alert-danger' role='alert'><span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span><span class='sr-only'>Error:</span> ชื่อผู้ใช้งาน หรือรหัสผ่านไม่ถูกต้อง</div>");
				
			}else{
				$("#form_login").submit();
			}
		});
		return false;
	});
	$("#logoutButton").click(function(){
		var url = "../controller/func_logout.php";
		var dataSet = "";
		$.post(url,dataSet,function(data){
			window.location.reload();
		});
	});
	$("#logoutMainButton").click(function(){
		var url = "controller/func_logout.php";
		var dataSet = "";
		$.post(url,dataSet,function(data){
			window.location.reload();
		});
	});
});