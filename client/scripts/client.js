$(function () {
	//TODO: Create Login Popup, and verify userID

	//TODO: replace with AJAX calls to the database
	var rooms = ["Gates Auditorium", "Steve Basement"];
	var timeSlots = ["10:00 AM", "12:30 PM"];
	
	var headCountSlots = ["Beginning", "Middle", "End"];
	
	for (i in rooms) {
		var option = "<option value="+rooms[i]+">"+rooms[i]+"</option>";
		$("#room_ID").append(option);
	}
	for (i in timeSlots) {
		var option = "<option value="+timeSlots[i]+">"+timeSlots[i]+"</option>";
		$("#time_slot").append(option);
	}
	for (i in headCountSlots) {
		var option = "<option value="+headCountSlots[i]+">"+headCountSlots[i]+"</option>";
		$("#head_count_slot").append(option);
	}

	function showBanner(text) {
		//TODO: Show ACK banner along top of screen
		//$("#ackContainer").text = text;
		//$("#ackContainer").show();
	}
	
	function hideBanner() {
		//TODO: add delay
		//$("#ackContainer").hide();
	}
});