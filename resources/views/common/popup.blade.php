
<!-- for Date Change Project -->
<div class="modal fade" id="dateChange-popup" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5">Due Date Change</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="myForm">
        @csrf
        <div class="modal-body">           
                <input type="hidden" id="tid" name="taskid">
                <div class="mb-3">
                    <label class="form-label">Due Date :</label>
                    <input type="date" class="form-control" name="review_due_date"/>
                </div>
                <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Hours :</label>
                    <select name="hours" class="form-select">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        @for($i=10;$i <= 24;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Minutes :</label>
                    <select name="minutes" class="form-select">
                    <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        @for($i=10;$i <= 59;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Seconds :</label>
                    <select name="seconds" class="form-select">
                        <option value="00">00</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        @for($i=10;$i <= 59;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
        </div>
    </div>
</div>

<!-- Word Count Update-->
<div class="modal fade" id="wcuChange-popup" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5">Update Word Count</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="myFormWCU">
        @csrf
        <div class="modal-body">           
                <input type="hidden" id="uwctid" name="uctaskid">
                <div class="mb-3">
                    <label class="form-label">Word Count<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="worldcount" required/>
                </div>
            </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </form>
        </div>
    </div>
</div>