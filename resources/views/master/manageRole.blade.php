@extends('stack.layouts.admin')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- SweetAlert2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<style>
.alert {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid transparent;
    border-radius: 4px;
}

.alert-danger {
    color: #721c24;
    background-color: #f8d7da;
    border-color: #f5c6cb;
}

.me-2 {
    margin-right: 0.5rem;
}

.mt-3 {
    margin-top: 1rem;
}

.mb-3 {
    margin-bottom: 1rem;
}
</style>

@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-sm-12">
        
       <form method="post" action="/userrole/store" name="add_name" id="">
       @csrf
        <div class="card">
          <div class="card-header">
            <strong>Create Role</strong>
            <!-- <a href="/growers/" class="btn btn-primary btn-sm pull-right"><i style="color:white;" class="fa fa-align-justify"></i> Users List</a> -->
          </div>

          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="grower_nam">Role Name</label>
                  <input class="form-control" id="grower_nam" name="roleName" type="text" placeholder="Enter Role Name" required>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="form-group">
                  <label for="province">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                </div>
              </div>
            </div>
            <!-- /.row-->

            <hr style="border-color: black;">
			<br>
            <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-1" role="tab" aria-controls="nav-1" aria-selected="true">Users</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-2" role="tab" aria-controls="nav-2" aria-selected="false">Vendor Management</a>
                <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">Approval Level</a> -->
                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-4" role="tab" aria-controls="nav-4" aria-selected="false ">Configuration</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-5" role="tab" aria-controls="nav-5" aria-selected="false">Reports</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-6" aria-selected="false">Procurement</a>
                {{-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-7" aria-selected="false">Vendor Management</a> --}}
            </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
            <!-- User Management -->
            <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-home-tab">
              <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                Add New User
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="addnewuser" value="Add New User"  id="flexSwitchCheckDefault" />          
                </div>  
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Manage Users
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="manageusers"  value="Manage Users"  id="flexSwitchCheckDefault" />
                </div>
                </li>
        
                </ul>
            </div>
            <!-- End of User Management -->
            
             <!-- Start of Vendor Management -->
            <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-profile-tab">
                <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                   Request a Vendor
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="requestnewvendor"  value="Request a Vendor" id="flexSwitchCheckDefault" />
                
                </div> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Pending Requests
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="pendingrequests" value="Pending Requests"  id="flexSwitchCheckDefault" />

                </div>
                </li>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                    All Vendors
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch"  name="managevendors" value="All Vendors" id="flexSwitchCheckDefault" />

                </div>
                </li>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                   My Requests
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch"  name="myrequests" value="My Requests"  id="flexSwitchCheckDefault" />

                </div>
                </li>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                    Vendor Type
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="vendorrequestapproval" value="Vendor Type"  id="flexSwitchCheckDefault" />

                </div>
                </li>
       
               </ul>
            </div>
             <!-- End of vendor Management -->

             <!-- start of approval Management -->
            <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-contact-tab">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                First Line Approval
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="firstlineapproval" value="First Line Approval"  id="flexSwitchCheckDefault" />
                
                </div> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Second Line Approval
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch"  name="secondlineapproval" value="Second Line Approval"  id="flexSwitchCheckDefault" />

                </div>
                </li>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                Third Line Approval
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="thirdlineapproval" value="Third Line Approval"  id="flexSwitchCheckDefault" />

                </div>
                </li>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Fourth Line Approval
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="fourthlineapproval" value="Fourth Line Approval"  id="flexSwitchCheckDefault" />

                </div>
                </li>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                Fiveth Line Approval
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="fivethlineapproval" value="Fiveth Line Approval"  id="flexSwitchCheckDefault" />

                </div>
                </li>
       
               </ul>
            </div>
             <!-- End of approval Management -->

             <!-- start of config Management -->
            <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav--tab">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                Master Pages
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="masterpages" value="Master Pages"  id="flexSwitchCheckDefault" />
                
                </div> 
                </li>
       
               </ul>
            </div>
             <!-- End of config Management -->

             <!-- start of procurement Management -->
            <div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-profile-tab">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                Reports
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="reports" value="Reports"  id="flexSwitchCheckDefault" />
                
                </div> 
                </li>               
               </ul>
            </div>
             <!-- End of procurement Management -->

             <!-- start of Reports Management -->
            <div class="tab-pane fade" id="nav-6" role="tabpanel" aria-labelledby="nav-contact-tab">
                <ul class="list-group">
                <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                Create Purchase Requistion
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="createpurchaserequistion" value="Create Purchase Requistion"  id="flexSwitchCheckDefault" />
                
                </div> 
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                View Requisitions
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" name="viewrequisitions" value="View Requisitions"  id="flexSwitchCheckDefault" />

                </div>
                </li>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center" style="background-color:#edf2f4;">
                View Purchase Orders
                    <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch"  name="viewpurchaseorders" value="View Purchase Orders"  id="flexSwitchCheckDefault" />
                </div>
                </li>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Manage Purchase Orders
                <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch"  name="managepurchaseorders" value="Manage Purchase Orders"  id="flexSwitchCheckDefault" />
                </div>
                </li>
                </li>                 
               </ul>
            </div>
             <!-- End of Reports Management -->
            </div>
          </div>
          <div class="card-footer">
            <div class="form-group pull-right">
    				<input type="submit" class="btn btn-success" value="Save"  style="padding: 10px 20px; font-size: 16px; min-width: 100px;"/>
    				<input type="reset" class="btn btn-danger" value="Cancel"  style="padding: 10px 20px; font-size: 16px; min-width: 100px;"/>
    			</div>
          </div>
       </div>
      </form>
     </div>
    </div>


    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <strong>Roles</strong>
            <small>List</small>
          </div>

          <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($users as $user)
                <tr>
                <td></td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->description}}</td>             
                  <td class="text-center">
                  <a href='/manageRole/{{$user->id}}/editrole' class='btn btn-info btn-sm' style='color: white;'>
                      <span class='fa fa-pencil'></span>
                      <span class='hidden-sm hidden-sm hidden-md'>Edit</span>
                    </a>
                  <a href='#' class='btn btn-danger btn-sm'   onclick="
                        event.preventDefault(); // Prevent the default link behavior
                        Swal.fire({
                            title: 'Delete Role?',
                            text: 'You won\'t be able to undo this!',
                            icon: 'info', // Updated property for SweetAlert2
                            showCancelButton: true,
                            confirmButtonText: 'Continue',
                            cancelButtonText: 'Cancel'
                          }).then((result) => {
                            if (result.isConfirmed) {
                              // Redirect to the URL or perform an action
                              window.location.href = '/manageRole/{{$user->id}}/delete'; // Replace with your actual URL
                            }
                          })
                      "
                    >
                      <span class='fa fa-trash'></span>
                      <span class='hidden-sm hidden-sm hidden-md'>Delete</span>
                    </a>&nbsp;
                  
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
   </div>
</div>
@endsection
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form[name="add_name"]');
    
    // Function to check if at least one checkbox is checked
    function hasCheckedCheckbox() {
        const checkboxes = form.querySelectorAll('input[type="checkbox"]');
        return Array.from(checkboxes).some(checkbox => checkbox.checked);
    }
    
    // Function to display error message
    function showErrorMessage() {
        // Remove existing error message if any
        const existingError = document.getElementById('checkbox-error');
        if (existingError) {
            existingError.remove();
        }
        
        // Create and display error message
        const errorDiv = document.createElement('div');
        errorDiv.id = 'checkbox-error';
        errorDiv.className = 'alert alert-danger mt-3';
        errorDiv.style.marginTop = '15px';
        errorDiv.innerHTML = '<strong>Error:</strong> Please select at least one permission to create a role.';
        
        // Insert error message before the card footer
        const cardFooter = document.querySelector('.card-footer');
        cardFooter.parentNode.insertBefore(errorDiv, cardFooter);
        
        // Scroll to error message
        errorDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
    
    // Function to hide error message
    function hideErrorMessage() {
        const errorDiv = document.getElementById('checkbox-error');
        if (errorDiv) {
            errorDiv.remove();
        }
    }
    
    // Add event listeners to all checkboxes for real-time validation
    const checkboxes = form.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (hasCheckedCheckbox()) {
                hideErrorMessage();
            }
        });
    });
    
    // Form submission validation
    form.addEventListener('submit', function(e) {
        // Check if role name is filled
        const roleNameInput = document.getElementById('grower_nam');
        if (!roleNameInput.value.trim()) {
            e.preventDefault();
            roleNameInput.focus();
            Swal.fire({
                title: 'Validation Error',
                text: 'Please enter a role name.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return false;
        }
        
        // Check if at least one checkbox is checked
        if (!hasCheckedCheckbox()) {
            e.preventDefault();
            showErrorMessage();
            Swal.fire({
                title: 'Validation Error',
                text: 'Please select at least one permission for this role.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return false;
        }
        
        // If validation passes, show success message and allow form submission
        hideErrorMessage();
        return true;
    });
    
    // Optional: Add "Select All" and "Clear All" functionality
    function addSelectAllButtons() {
        const tabContent = document.getElementById('nav-tabContent');
        if (tabContent) {
            const buttonContainer = document.createElement('div');
            buttonContainer.className = 'mt-3 mb-3';
            buttonContainer.innerHTML = `
                <button type="button" class="btn btn-sm btn-outline-primary me-2" onclick="selectAllCheckboxes()">
                    Select All
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="clearAllCheckboxes()">
                    Clear All
                </button>
            `;
            tabContent.insertBefore(buttonContainer, tabContent.firstChild);
        }
    }
    
    // Add the select all buttons
    addSelectAllButtons();
    
    // Global functions for select all/clear all
    window.selectAllCheckboxes = function() {
        const checkboxes = form.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = true;
        });
        hideErrorMessage();
    };
    
    window.clearAllCheckboxes = function() {
        const checkboxes = form.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    };
});
</script>

