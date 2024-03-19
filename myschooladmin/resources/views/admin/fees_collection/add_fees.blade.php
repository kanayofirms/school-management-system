@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Collect Fees</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right;">
                        <button type="button" class="btn btn-primary" id="AddFees">Add Fees</button>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Payment Details</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Student ID</th>
                                            <th>Student Name</th>
                                            <th>Class Name</th>
                                            <th>Total Amount</th>
                                            <th>Paid Amount</th>
                                            <th>Created Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>
                                <div style="padding: 10px; float:right;">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="modal fade" id="AddFeesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Fees</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="post">
                {{ csrf_field() }}
            <div class="modal-body">
              
                <div class="form-group">
                    <label class="col-form-label">Total Amount : N{{ number_format($getStudent->amount, 2) }}</label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Paid Amount : </label>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Remaining Amount : </label>
                </div>
                <div class="form-group">
                  <label class="col-form-label">Amount <span color: red;>*</span></label>
                  <input type="number" class="form-control" name="amount">
                </div>
                <div class="form-group">
                    <label class="col-form-label">Payment Type <span color: red;>*</span></label>
                    <select name="payment_type" id="" class="form-control" required>
                        <option value="">Select</option>
                        <option value="Cash">Cash</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Transfer">Transfer</option>
                    </select>
                  </div>
                <div class="form-group">
                  <label class="col-form-label">Remark</label>
                  <textarea class="form-control" name="remark"></textarea>
                </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
          </div>
        </div>
      </div>
@endsection

@section('script')
<script type="text/javascript">
    $('#AddFees').click(function() {
        $('#AddFeesModal').modal('show');
    });
</script>

@endsection
