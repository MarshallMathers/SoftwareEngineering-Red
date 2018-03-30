/* Team: Red
 * Group: Client
 * Contributors: Jacob Hayes, Ian Marshall
 */

$(function () {
	//TODO: Create Login Popup, and verify userID

	//TODO: replace with AJAX calls to the database
	var rooms = [];
	var timeSlots = [];
	
	var headCountSlots = ["Beginning", "Middle", "End"];
	
	getFormData();
	
	for (i in headCountSlots) {
		var option = "<option value="+headCountSlots[i]+">"+headCountSlots[i]+"</option>";
		$("#head_count_slot").append(option);
	}
	
	$("#redirect").each(function(i, e) {
		$("body").load($(e).attr("name"));
	});

	function getFormData() {
    	$.post("php/headCountApp.php", { type: "data" }, function(data, status) {
     		var rooms = data.room_IDs;
     		var timeSlots = data.time_slots;
     		for (i = 0; i < rooms.length; i++) {
     			$("#room_ID").append("<option value="+rooms[i]["RoomID"]+">"+rooms[i]["Room"]+"</option>");
     		}
			for (i = 0; i < timeSlots.length; i++) {
				$("#time_slot").append("<option value="+timeSlots[i]["TimeslotID"]+">"+timeSlots[i]["Timeslot"]+"</option>");
			}
    	}, "json");
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