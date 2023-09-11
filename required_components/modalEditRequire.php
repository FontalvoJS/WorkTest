<div class="modal fade" id="modalEdit" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form id="require-form">
                    <h5 class=" mb-3 loginTitle animate__headShake animate__animated">Please, enter the new data</h5>
                    <div class="mb-2">
                        <input type="text" class="form-control" name="title" placeholder="New title">
                    </div>
                    <div class="mb-2 d-none">
                        <input name="post-id" class="post_id">                    </div>
                    <div class="mb-2">
                        <textarea style="width:100%" class="form-control" name="description" placeholder="New description"></textarea>
                    </div>
                    <label style="color:gray">Finish date</label>
                    <div class="mb-2">
                        <input type="datetime-local" class="form-control" name="dateToFinishEdit">
                    </div>
                    <div class="mt-3 mb-3">
                        <span class="alertsAuth  animate__headShake animate__animated"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="formEditRequest('require')" class="btn btn-dark">Save</button>
            </div>
        </div>
    </div>
</div>