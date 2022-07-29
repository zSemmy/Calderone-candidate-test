<div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control" value="{{ old('title', $order->title) }}">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Cost</label>
          <input type="num" name="cost" class="form-control" value="{{ old('cost', $order->cost) }}">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label>Customer ID</label>
          <select name="customer_id" class="form-control">
              <option value=""></option>
              @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ old('customer_id', $order->customer_id) == strval($customer->id) ? 'selected' : '' }}>{{ $customer->company }}</option>
              @endforeach
          </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Tag</label>
          <select name="tag_id" class="form-control">
            <option value=""></option>
            @foreach ($tags as $tag)
              <option value="{{ $tag->id }}" {{ old('tag_id', $order->tag_id) == strval($tag->id) ? 'selected' : '' }}>{{ $tag->name }}</option>            
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label>Description</label>
          <textarea rows="10" name="description" class="form-control">{{ old('description', $order->description) }}</textarea>
        </div>
      </div>
    </div>
