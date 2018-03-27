<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Edit Rooms</title>
    <script type="text/javascript" src="edit_rooms.js"></script>
</head>
<body>

<!-- header -->
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-light border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal">Boston Code Camp</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark">Bob</a> <!--this will be the name of the logged in admin -->
    </nav>
    <a class="btn btn-outline-primary" href="logout.php">Sign Out</a>
</div>

<!-- intro -->
<div class="container">
    <div class="py-5 text-center">
        <h2>Edit Room Requirements</h2>
        <p class="lead">Use the form below to create a room or edit an existing room in the system.</p>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4" id="room-form" style="display:none">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Edit Room</span>
                <!-- become change form, make invisible until user clicks edit button-->
            </h4>

            <!-- edit room form; disabled until a room is selected, or add room button is pressed -->
            <form class="card p-2">
                <div><strong><label style="width:25%;float:left" id="room-name">Room #</label></strong>
                    <button class="btn btn-primary btn-sm btn-block" style="width:25%;float:right" type="button"
                            onclick="editName()" id="edit-room">Edit name
                    </button>
                </div>
                <br/>
                <label>Room Capacity </label>
                <div class="input-group">
                    <input type="text" class="form-control" id="capacity" value="###">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary">Save</button>
                    </div>
                </div>
                <br/>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="enable" checked>
                    <label class="custom-control-label" for="enable">Enable Room</label>
                </div>
                <br/><br/><br/>
                <button class="btn btn-danger btn-sm" id="delete" type="button" onclick="deleteRoom()">Delete room
                </button>
                <button class="btn btn-success btn-sm" id="add" style="display: none;" type="button"
                        onclick="saveRoom()">Add room
                </button>
            </form>
        </div>

        <!--dropdown menu and buttons for selecting the room -->
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Select Room</h4>
            <form class="needs-validation" onsubmit="return false" novalidate="">

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <select class="custom-select d-block w-100" id="room" required>
                            <option value>Choose...</option>
                            <option value="1">Room 1</option>
                            <!-- these are placeholders for now, later replace them with rooms in database-->
                            <option value="2">Room 2</option>
                            <option value="3">Room 3</option>
                            <option value="4">Room 4</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid room.
                        </div>
                        <br/>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Edit room</button>
                    </div>
                </div>
            </form>

            <br/><br/>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="button" onclick="addRoom()">Add room</button>
        </div>
    </div>

    <!-- footer -->
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">©Boston Code Camp</p>
    </footer>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');

            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        handleSubmit();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>

</body>
</html>