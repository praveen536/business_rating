<!DOCTYPE html>
<html>

<head>
    <title>Business Rating</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="../assets/bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/raty/jquery.raty.min.js" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h3>Business Listing</h3>

        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Business</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                    <th>Rating</th>
                </tr>
            </thead>
            <tbody id="tableBody"></tbody>
        </table>
    </div>

    <!-- ADD MODAL -->
    <div class="modal fade" id="addModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add Business</h5>
                </div>
                <div class="modal-body">
                    <form id="addBusinessForm">
                        <input type="text" id="name" class="form-control mb-2" placeholder="Name" required>
                        <input type="text" id="address" class="form-control mb-2" placeholder="Address">
                        <input type="text" id="phone" class="form-control mb-2" placeholder="Phone">
                        <input type="email" id="email" class="form-control mb-2" placeholder="Email">
                        <button class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Edit Business</h5>
                </div>
                <div class="modal-body">
                    <form id="editBusinessForm">
                        <input type="hidden" id="edit_id">
                        <input type="text" id="edit_name" class="form-control mb-2">
                        <input type="text" id="edit_address" class="form-control mb-2">
                        <input type="text" id="edit_phone" class="form-control mb-2">
                        <input type="email" id="edit_email" class="form-control mb-2">
                        <button class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- RATING MODAL -->
    <div class="modal fade" id="ratingModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Submit Rating</h5>
                </div>
                <div class="modal-body">
                    <form id="ratingForm">
                        <input type="hidden" id="business_id">
                        <input type="text" id="r_name" class="form-control mb-2" placeholder="Name" required>
                        <input type="email" id="r_email" class="form-control mb-2" placeholder="Email" required>
                        <input type="text" id="r_phone" class="form-control mb-2" placeholder="Phone">
                        <div id="ratingInput"></div>
                        <button class="btn btn-success mt-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/raty/2.7.1/jquery.raty.min.js"></script> -->
    <script src="../assets/jquery-3.7.1.min.js"></script>
    <script src="../assets/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="../assets/plugins/raty/jquery.raty.min.js"></script>
</body>

</html>