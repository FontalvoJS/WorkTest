<div class="modal fade" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class=" mb-3 loginTitle animate__headShake animate__animated">Set a new task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="request-form">
                    <div class="mb-2">
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="mb-2 d-none">
                        <input name="user" value="<?php echo $user_id; ?>">
                    </div>
                    <div class="mb-2">
                        <textarea style="width:100%" class="form-control" name="description" placeholder="Description"></textarea>
                    </div>
                    <label style="color:gray">Finish date</label>
                    <div class="mb-2">
                        <input type="datetime-local" class="form-control" id="fechaHora" name="dateToFinish">
                    </div>
                    <div class="mt-3 mb-3">
                        <span class="alertsAuth  animate__headShake animate__animated"></span>
                    </div>
                    <div class="checkbox mb-3">
                        <label style="color:#b3b3b3">
                            <input type="checkbox" id="inProgress" name="autoProgress"> In Progress?
                        </label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="formRequest()" class="btn btn-dark">Save</button>
            </div>
        </div>
    </div>
</div>