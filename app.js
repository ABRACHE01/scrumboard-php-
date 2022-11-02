       
	   // getting the inputs from the modal to put values in them

	    var task_id = document.getElementById("task-id");
        var title_inp = document.getElementById("task-title");
		var description_inp = document.getElementById("task-description");
		var date_inp = document.getElementById("task-date");
		var type_feature = document.getElementById("task-type-feature");
		var type_bug = document.getElementById("task-type-bug");

		var priority_inp = document.getElementById("task-priority");
		var status_inp=document.getElementById("task-status");
		

function gitElementToModal(id){ 

     // hiding the save button in the modal modification

	f=document.querySelector('.modal-footer');

    f.innerHTML=`
		<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a>
		<button type="submit" name="update" class="btn btn-warning task-action-btn" id="task-update-btn">Update</a>
		 `
	// (1) getting the curent values frome the button task 
     
	let title = document.getElementById(id).querySelector('.taskTitle').innerHTML;
	let date = document.getElementById(id).querySelector('.taskDate').innerHTML;
	let description = document.getElementById(id).querySelector('.taskDescription').innerHTML;
	let priority = document.getElementById(id).querySelector('.taskPriority').getAttribute('data-id-priority');
	let status = document.getElementById(id).querySelector('.taskStatus').getAttribute('data-id-status');
	let type = document.getElementById(id).querySelector('.taskType').getAttribute('data-id-type'); 
    
    //(2) putting the values in the modal
    task_id.value=id;
    title_inp.value=title;
	description_inp.value=description ;
	date_inp.value= date ;
	priority_inp.value = priority ;
	status_inp.value = status ;
    
	if(type==1){
		type_feature.checked=true;
	}else{
		type_bug.checked=true;
	}

	
	
	
}

    //hiding the uptade button from the add task modal

function hidebuttons(){
	f=document.querySelector('.modal-footer');

 f.innerHTML=`
	<button type="submit" name="save" class="btn btn-primary task-action-btn" id="task-save-btn">Save</button>
	<a href="#" class="btn btn-white" data-bs-dismiss="modal">Cancel</a> 
	`
}	
