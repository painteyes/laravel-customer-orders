<div class="row">

  <div class="col-md-3">
    <div class="form-group">
      <label>Customer ID</label>
      <input type="text" name="customer_id" class="form-control" value="{{ old('customer_id', $order->customer_id) }}">
    </div>
  </div>

  <div class="col-md-9">
    <div class="form-group">
      <label>Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title', $order->title) }}">
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label>Description</label>
      <input type="text" name="description" class="form-control" value="{{ old('description', $order->description) }}">
    </div>
  </div>
</div>
 
<div class="row">
  <div class="col-md-3">
    <div class="form-group">
      <label>Cost</label>
      <input type="text" name="cost" class="form-control" value="{{ old('cost', $order->cost) }}">

    </div>
  </div>
</div>
