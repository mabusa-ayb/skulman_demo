<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Register Student</h4>
            </div>
            <div class="modal-body">
            <form role="form" method="POST" action="{{ route('registrations.new_registration') }}">
            @csrf

                    <div class="form-group">
                        <label>First Name</label>
                        <input class="form-control" name="student_number" placeholder="Enter Student Number..." required>
                    </div>

                    <div class="form-group">
                        <label>Term</label>
                        <select class="form-control" name="term">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="2">Three</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <?php
                            $activeYear = App\ActiveSession::all()->first();
                        ?>
                        <label>Year</label>
                        <input class="form-control" name="year" value="{{ $activeYear->year }}" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
