@extends('layout.app')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fee Collection</h1>
          </div>
          
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
                      <th>Class Name</th>
                      <th>Total Fee Amount (LKR)</th>
                      <th>Paid Amount (LKR)</th>
                      <th>Due Amount (LKR)</th>
                      <th>Payment Type</th>
                      <th>Remark</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                    </tr>
                  </thead>
                  <tbody>
                     @forelse($getFees as $value)
                     <tr>
                        <td>{{$value->class_name}}</td>
                        <td>{{number_format($value->total_amount, 2)}}</td>
                        <td>{{number_format($value->paid_amount, 2)}}</td>
                        <td>{{number_format($value->remaining_amount, 2)}}</td>
                        <td>{{$value->payment_type}}</td>
                        <td>{{$value->remark}}</td>
                        <td>{{$value->created_name}}</td>
                        <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                     </tr>
                     @empty
                     <tr>
                        <td colspan="100%">Record not found</td>
                     </tr>
                     @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <div class="modal fade" id="AddFeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Make Payment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        {{ csrf_field() }}
      <div class="modal-body">
        <div class="form-group">
            <label class="col-form-label">Class : {{ $getStudent->class_name}} </label>
            
          </div>
        <div class="form-group">
            <label class="col-form-label">Total Amount : LKR {{number_format($getStudent->amount,2)}} </label>
            
          </div>
          <div class="form-group">
            <label class="col-form-label">Paid Amount : LKR {{number_format($paid_amount,2)}}</label>
            
          </div>
          <div class="form-group">
            @php
                $RemainingAmount = $getStudent->amount - $paid_amount;
            @endphp
            <label class="col-form-label">Due Amount : LKR {{number_format($RemainingAmount,2)}}</label>
            
          </div>
          <div class="form-group">
            <label class="col-form-label">Amount (LKR)<span style="color:red;">*</span></label>
            <input type="number" class="form-control" name="amount" required>
          </div>
          <div class="form-group">
            <label class="col-form-label">Payment Type <span style="color:red;">*</span></label>
            <select name="payment_type" class="form-control" required>
                <option value="">- Select -</option>
                <option value="Card Payment">Card payment</option>
                <option value="Paypal">Paypal</option>
            </select>
          </div>
          <div class="form-group">
            <label class="col-form-label">Remark :</label>
            <textarea class="form-control" name="remark" ></textarea>
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
        $('#AddFee').click(function(){
            $('#AddFeeModal').modal('show');
        });
    </script>
@endsection