<div class="form-group">
        <label for="title">List Title</label>
        @if($btnact=="create")
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">
        @else
            <input type="text" name="title" class="form-control" id="title" value="{{ $list->name }}">
        @endif
        <span class="text-danger">{{ $errors->first('title') }}</span>
</div>