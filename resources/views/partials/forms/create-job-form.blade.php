<form method="POST" action="{{ route('store-job') }}">

    {{ csrf_field() }}

    <fieldset class="fieldset">
        <legend>Job Description</legend>
        <div class="row">

            <div class="small-12 columns">
                <label>* Title
                    <input
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        placeholder="Title"
                        class="{{ $errors->has('title') ? ' hasError' : ''}}"
                        autofocus
                        required
                    >
                </label>
                @if ($errors->has('title'))
                    <span class="help-block">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>

            <div class="small-12 columns">
                <label>* Description
                    <textarea
                        name="description"
                        placeholder="Description"
                        cols="30"
                        rows="10"
                        class="{{ $errors->has('description') ? ' hasError' : ''}}"
                        required
                    >{{ old('description') }}</textarea>
                </label>
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="small-12 columns">
                <label>* How to apply
                    <textarea
                        name="how_to_apply"
                        placeholder="How to apply"
                        cols="30"
                        rows="10"
                        class="{{ $errors->has('how_to_apply') ? ' hasError' : ''}}"
                        required
                    >{{ old('how_to_apply') }}</textarea>
                </label>
                @if ($errors->has('how_to_apply'))
                    <span class="help-block">
                        <strong>{{ $errors->first('how_to_apply') }}</strong>
                    </span>
                @endif
            </div>

            <div class="small-12 columns">
                <fieldset>
                    <legend>Categories</legend>
                    <!-- Listing all categories -->
                    @foreach( $categories as $category_id => $category_name )
                        <input
                            id="cat{{ $category_id }}"
                            type="checkbox"
                            name="categories[]"
                            value="{{ $category_id }}"
                            class="{{ $errors->has('categories') ? ' hasError' : ''}}"
                            @if(!empty(old('categories')))
                                {{ in_array($category_id, old('categories')) ? ' checked' : '' }}
                            @endif
                        >
                        <label for="cat{{ $category_id }}">{{ $category_name }}</label>
                    @endforeach

                </fieldset>
                @if ($errors->has('categories'))
                    <span class="help-block">
                            <strong>{{ $errors->first('categories') }}</strong>
                        </span>
                @endif
            </div>

        </div>
    </fieldset>

    <fieldset class="fieldset">
        <legend>Job Type</legend>
        <div class="row">
            <!-- Listing all job types -->
            @foreach( $types as $type_id => $type_name )
                <div class="small-12 columns">
                    <input
                        id="type{{ $type_id }}"
                        type="radio"
                        name="type"
                        value="{{ $type_id }}"
                        {{ old('type') == $type_id ? ' checked' : '' }}
                        class="{{ $errors->has('type') ? ' hasError' : ''}}"
                        required
                    >
                    <label for="type{{ $type_id }}">{{ ucwords($type_name) }}</label>
                </div>
            @endforeach
            @if ($errors->has('type'))
                <span class="help-block">
                    <strong>{{ $errors->first('type') }}</strong>
                </span>
            @endif
        </div>
    </fieldset>

    <fieldset class="fieldset">
        <label>* Location
            <textarea
                name="location"
                placeholder="Location"
                cols="20"
                rows="10"
                class="{{ $errors->has('location') ? ' hasError' : ''}}"
                required
            >{{ old('location') }}</textarea>
        </label>
        @if ($errors->has('location'))
            <span class="help-block">
                <strong>{{ $errors->first('location') }}</strong>
            </span>
        @endif
    </fieldset>

    <div class="row">
        <div class="small-12 columns">
            <button type="submit" class="button dark">Post Job</button>
        </div>
    </div>

</form>