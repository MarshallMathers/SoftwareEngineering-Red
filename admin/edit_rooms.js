	
	function handleSubmit(){
		edit = document.getElementById("room"); //represents the dropdown list
		var roomList = [["Room 1",100,true],["Room 2",150,true],["Room 3",25,true],["Room 4",80,false]] //replace this array with data from database
		editForm = document.getElementById("room-form"); //represents form to edit room variables
		
		var room = edit.options[edit.selectedIndex].value;
		if(room >= 1){
			var room_name = document.getElementById("room-name");
			var capacity =  document.getElementById("capacity");
			var enable =  document.getElementById("enable");
			del = document.getElementById("delete");
			add = document.getElementById("add");
			del.style.display = "block";
			add.style.display = "none";
			room_name.innerHTML = roomList[room-1][0];
			capacity.value = roomList[room-1][1];
			enable.checked = roomList[room-1][2];
			editForm.style.display = "block";
		}
		else{
			editForm.style.display = "none";
		}
	}

	function deleteRoom(){
		if(confirm("This action will delete the selected room from the list. Press OK to confirm")){
			//delete room
		}
		else{
			//do nothing
		}
	}
	
	function addRoom(){
		edit = document.getElementById("room"); //add the room to dropdown
		editForm = document.getElementById("room-form"); //edit room variables
		
		//replace delete room button with add room button
		del = document.getElementById("delete");
		add = document.getElementById("add");
		del.style.display = "none";
		add.style.display = "block";
		
		//clear data that might be there from another room
		var room_name = document.getElementById("room-name");
		var capacity =  document.getElementById("capacity");
		var enable =  document.getElementById("enable");
		room_name.innerHTML = "Room #";
		capacity.value = "###";
		enable.checked = false;
		
		editForm.style.display = "block";
	}
	
	function saveRoom(){
		if(confirm("This action will add this room to the list. Press OK to confirm")){
			//add room to database
		}
		else{
			//do nothing
		}
	}
	
	//makes room name editable
	function editName(){
		var room_name = document.getElementById("room-name");
		room_name.contentEditable = "true";
		var editBtn = document.getElementById("edit-room");
		editBtn.innerText = "Save Name";
		editBtn.setAttribute('onclick','saveName()');
	}
	
	//saves the name and makes it non-editable
	function saveName(){
		var room_name = document.getElementById("room-name");
		room_name.contentEditable = "false";
		var editBtn = document.getElementById("edit-room");
		editBtn.innerText = "Edit Name";
		editBtn.setAttribute('onclick','editName()');
	}