
{{--<!--begin::input {{$name}} -->--}}
<div class="{{ $className ?? 'col-md-6'}} fv-row">
    @if($label)
    <!--begin::Label-->
    <label class="required fs-5 fw-bold mb-2 text-truncate">{{ __($label) }}</label>
    <!--end::Label-->
    @endif
    <!--begin::Input-->
    <select class="form-select form-select-solid"
            name="{{trim($name)}}"
            @if($required) required @endif
            @if($multiple === true) multiple="multiple" @endif
            data-control="select2"
            data-placeholder="{{ __(key:'Select a :resource name',replace:[ 'resource' => Str::lower(__($placeholder))]) }}"
            data-allow-clear="true"
    >
        @foreach ($options as $key =>  $option)
            <option value="{{$key}}" @if($isSelected($key) === true)  @selected(true) @endif>
                <span class="text-capitalize text-mutted"> {{$option}}</span>
            </option>
        @endforeach
    </select>
    <!--end::Input-->
    @error($name)
    <!--begin::Error {{$name}} -->
    <span class="fv-plugins-message-container fw-bolder invalid-feedback">{{$message}}</span>
    <!--end::Error {{$name}}-->
    @enderror
</div>
<!--end::input {{$name}}  -->
