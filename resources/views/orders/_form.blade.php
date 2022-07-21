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
  <div class="col-md-10 mb-3" >
    <h6>Tags</h6>
    <div>
      @foreach ($tags as $tag)
      <div  style="display:flex; align-items:center;" >
        <input 
          type="checkbox" 
          name="tags[]" 
          value="{{$tag->id}}" 
          id='tag-{{$tag->id}}'
          style="width: 20px; height: 20px; " 
          
          {{in_array($tag->id, old('tags', [])) ? 'checked' : ''}}
          
          @foreach ($order->tags as $order_tag)
            {{$order_tag->id == $tag->id ? 'checked' : ''}}
          @endforeach
        >
        <label 
          for="tag-{{$tag->id}}" 
          class="checkboxesSearch @error('tag') is-invalid @enderror" 
          name="tag" 
          value="{{old('tag')}}"
          style="margin-bottom:0; margin-left:0.4rem" 
        >
        {{$tag->name}}
      </label>
      </div>
      @endforeach 
    </div>
  </div>
</div>
 
<div class="row">
  <div class="col-md-2">
    <div class="form-group">
      <label>Cost</label>
      <input type="text" name="cost" class="form-control" value="{{ old('cost', $order->cost) }}">
    </div>
  </div>

  


</div>

  





                    







                
