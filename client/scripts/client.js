/* Team: Red
 * Group: Client
 * Contributors: Jacob Hayes, Ian Marshall
 */

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

$(function () {
	getFormData();
});