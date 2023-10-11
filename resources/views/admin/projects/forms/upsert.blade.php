<div class="container pt-3">
    <form action="{{ $action }}" class="row g-3" method="POST" enctype="multipart/form-data">
        @csrf()
        @method($method)

        <div class="col-md-6">
            <label for="inputTitle4" class="form-label">Title</label>
            <input type="title" class="form-control @error('title') is-invalid @enderror"
                value="{{ old('title', $project?->title) }}" id="inputTitle4" name="title">
            @error('title')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col-md-6">
            <label for="inputUrl4" class="form-label @error('url') is-invalid @enderror">Link URL</label>
            <input type="text" class="form-control" id="inputUrl4" name="url"
                value="{{ old('url', $project?->url) }}">
            @error('url')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="inputType" class="form-label @error('type') is-invalid @enderror">Type</label>
            <select name="type" id="inputType"></select>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $project->type_id === $type->id ? "selected" : "" }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            @error('type')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="inputThumb" class="form-label @error('thumb') is-invalid @enderror">Image URL</label>
            <input type="file" class="form-control" id="inputThumb" name="thumb"
                value="{{ old('thumb', $project?->thumb) }}" accept="image/*">
            @error('thumb')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <label for="inputDescription" class="form-label @error('description') is-invalid @enderror">Description</label>
            <input type="text" class="form-control" id="inputDescription" name="description"
                value="{{ old('description', $project?->description) }}" style="height:250px">
            @error('description')
                <div class="invalid_feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Conferma</button>
        </div>
    </form>
</div>
